<?php

class AccountModel extends Model {

	public function getAllUsernames() {

		return $this->dbc->query( "SELECT Username, Privilege, Active FROM users" );

	}

	public function checkPassword( $password ) {

		// Get the username of the person who is logged in
		$username = $_SESSION['username'];

		// Get the password of the account that is logged in
		$result = $this->dbc->query("SELECT Password FROM users WHERE Username = '$username'");

		// Convert into an associative array
		$data = $result->fetch_assoc();

		// Need the password compat library
		require 'vendor/password.php';

		// Compare the current password against user existing password
		if( password_verify($password, $data['Password']) ) {
			return true;
		} else {
			return false;
		}

	}

	public function updatePassword() {

		// Get the username of the person logged in
		$username = $_SESSION['username'];

		// Require the password compat library
		require 'vendor/password.php';

		// Hash the new password
		$hashedPassword = password_hash($_POST['new-password'], PASSWORD_BCRYPT);

		// Prepare UPDATE SQL
		$sql = "UPDATE users SET Password = '$hashedPassword' WHERE Username = '$username'";

		// Run the SQL
		$this->dbc->query($sql);

		// Ensure the password update worked
		if( $this->dbc->affected_rows != 0 ) {
			return true;
		} else {
			return false;
		}
	}

	public function deleteAccount($username) {

		// Filter the username
		$username = $this->dbc->real_escape_string($username);

		//$this->dbc->query("DELETE FROM users WHERE Username = '$username'");
		$this->dbc->query("	UPDATE users 
							SET Active = 'disabled'
							WHERE Username = '$username'");
	}

	public function enableAccount( $username ) {
		// Filter the username
		$username = $this->dbc->real_escape_string($username);

		// Run the query
		$this->dbc->query(" UPDATE users
							SET Active = 'enabled'
							WHERE Username = '$username'");
	}

	public function addNewStaff( $imageName ) {

		// Extract the data from the form and filter too
		$firstName = $this->dbc->real_escape_string( $_POST['first-name'] );
		$lastName  = $this->dbc->real_escape_string( $_POST['last-name'] );
		$bio       = $this->dbc->real_escape_string( $_POST['bio'] );
		$jobTitle  = $this->dbc->real_escape_string( $_POST['job-title'] );
		$image     = $this->dbc->real_escape_string( $imageName );

		// Prepare SQL to insert the new staff member
		$sql = "INSERT INTO staff VALUES (  NULL,
											'$firstName',
											'$lastName',
											'$bio',
											'$image',
											'$jobTitle'
											) ";
		
		// Run the query
		$this->dbc->query($sql);

		// Make sure the insert actually worked
		if( $this->dbc->affected_rows == 0 ) {
			return false; // Failed
		} else {
			return true; // Success
		}

	}

	public function getAllBusinesses() {

		return $this->dbc->query("SELECT name AS BusinessName, id FROM businesses ORDER BY BusinessName");

	}

	public function addNewDeal() {

		// Filter the data
		$dealName   = $this->filter($_POST['deal-name']);
		$businessID = $this->dbc->real_escape_string($_POST['business']);
		$description= $this->dbc->real_escape_string($_POST['description']);

		$startDay 	= $this->dbc->real_escape_string($_POST['start-day']);
		$startHour 	= $this->dbc->real_escape_string($_POST['start-hour']);
		$startMinute= $this->dbc->real_escape_string($_POST['start-minute']);
		$startSecond= $this->dbc->real_escape_string($_POST['start-second']);

		$endDay 	= $this->dbc->real_escape_string($_POST['end-day']);
		$endMonth	= $this->dbc->real_escape_string($_POST['end-month']);
		$endYear 	= $this->dbc->real_escape_string($_POST['end-year']);
		$endHour 	= $this->dbc->real_escape_string($_POST['end-hour']);
		$endMinute  = $this->dbc->real_escape_string($_POST['end-minute']);
		$endSecond  = $this->dbc->real_escape_string($_POST['end-second']);

		$originalPrice   = $this->dbc->real_escape_string($_POST['original-price']);
		$discountedPrice = $this->dbc->real_escape_string($_POST['discounted-price']);
		$couponCode 	 = $this->dbc->real_escape_string($_POST['coupon-code']);
		$image 	 		 = $this->dbc->real_escape_string($_POST['newFileName']);
		
		// Prepare the dates and times
		$startDate 	= $this->filter($_POST['start-year'])
					  .'-'
					  .$this->filter($_POST['start-month'])
					  ."-$startDay $startHour:$startMinute:$startSecond";
		$endDate 	= "$endYear-$endMonth-$endDay $endHour:$endMinute:$endSecond";
		
		// Prepare the SQL
		$sql = "INSERT INTO deals
				VALUES (	NULL,
							'$dealName',
							$originalPrice,
							$discountedPrice,
							'$image',
							'$startDate',
							'$endDate',
							'$description',
							'$couponCode',
							$businessID
						)";

		$this->dbc->query($sql);

	}

	public function getAllCategories() {

		return $this->dbc->query("SELECT id, category FROM categories");

	}

	public function additionalInfo() {

		// Get the userID
		$userID = $_SESSION['userID'];

		// Query to see if there is existing info in the database
		$sql = "SELECT FirstName, LastName, ProfileImage, Bio
				FROM users_additional_info
				WHERE UserID = $userID";

		// Run the SQL
		$result = $this->dbc->query($sql);

		// Filter the user data
		$firstName 	= $this->filter($_POST['first-name']);
		$lastName 	= $this->filter($_POST['last-name']);
		$bio 		= $this->filter($_POST['bio']);

		// If there is a result then do an update
		if( $result->num_rows == 1 ) {
			
			// If the user has provided an image
			if( isset($_POST['newUserImage']) ) {
				$image = $this->filter($_POST['newUserImage']);

				// Convert the result into an associative array
				$data = $result->fetch_assoc();

				if($data['ProfileImage'] != 'default.jpg') {
					// Delete the old images
					unlink('img/profile-images/original/'.$data['ProfileImage']);
					unlink('img/profile-images/icon/'.$data['ProfileImage']);
					unlink('img/profile-images/avatar/'.$data['ProfileImage']);
				}
			} else {
				// Convert the result into an associative array
				$data = $result->fetch_assoc();

				// No new image
				$image = $data['ProfileImage'];
			}

			// UPDATE
			$sql = "UPDATE users_additional_info
					SET FirstName = '$firstName',
						LastName = '$lastName',
						Bio = '$bio',
						ProfileImage = '$image'
					WHERE UserID = $userID";

		} elseif( $result->num_rows == 0 ) {

			// If there is "newUserImage" in the post array then an image has been provided
			if( isset($_POST['newUserImage']) ) {
				$image = $this->filter($_POST['newUserImage']);
			} else {
				$image = 'default.jpg';
			}

			// INSERT
			$sql = "INSERT INTO users_additional_info
					VALUES (NULL, $userID, '$firstName', '$lastName', '$image', '$bio')";
		}

		// Run the SQL
		$this->dbc->query($sql);

		// If the query failed
		if( $this->dbc->affected_rows == 1 ) {
			return true;
		}

		return false;

	}

	public function getAdditionalInfo() {
		return $this->dbc->query("	SELECT FirstName, LastName, Bio
									FROM users_additional_info
									WHERE UserID = ".$_SESSION['userID']);
	}








}
