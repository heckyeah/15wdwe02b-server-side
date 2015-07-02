<div class="row">
	<div class="columns">
		<form novalidate action="index.php?page=register" method="post">
			<h1>Registration Form</h1>
			<label>Username: </label>
			<input type="text" name="username" placeholder="iambatman" value="<?php echo $this->username; ?>">
			<?php

				function errorMessage($message) {
					if( $message != '' ) {
						echo '<small class="error">';
						echo $message;
						echo '</small>';
					}
				}

				// If there is an error for the username
				// if( $this->usernameError != '' ) {
				// 	echo '<small class="error">';
				// 	echo $this->usernameError;
				// 	echo '</small>';
				// }
				errorMessage($this->usernameError);

			?>
			<label>E-Mail: </label>
			<input type="email" name="email" placeholder="bat@cave.com" value="<?php echo $this->email; ?>">
			<?php errorMessage($this->emailError); ?>
			<label>Password: </label>
			<input type="password" name="password1">
			<label>Confirm Password: </label>
			<input type="password" name="password2">
			<?php errorMessage($this->passwordError); ?>
			<input type="submit" class="button tiny" value="Register account!" name="register-account">
		</form>
	</div>
</div>
