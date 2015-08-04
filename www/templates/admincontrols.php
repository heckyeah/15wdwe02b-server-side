<div class="row">
	<div class="columns">
		<h2>Enable / Disable Accounts</h2>
	</div>
	<div class="medium-6 columns">
		<h3>Disable an account</h3>
		<form action="index.php?page=account" method="post">
			<label>Users: </label>
			<select name="username">
				<?php

					// Use the model to get all accounts
					$result = $this->model->getAllUsernames();

					// Loop through the result and display all the usernames
					while( $row = $result->fetch_assoc() ) {

						// Make sure the user is not an admin
						if( $row['Privilege'] == 'admin' || $row['Active'] == 'disabled' ) {
							continue;
						}

						echo '<option>'.$row['Username'].'</option>';

					}

				?>
			</select>
			<input type="submit" class="tiny button" value="Delete this account" name="delete-account">
			<?php if( $this->userDeleteError != '' ) : ?>
			<small class="error"><?php echo $this->userDeleteError; ?></small>
			<?php endif; ?>
			<?php if( $this->userDeleteSuccess != '' ) : ?>
			<small class="alert-box success"><?php echo $this->userDeleteSuccess; ?></small>
			<?php endif; ?>
		</form>
	</div>
	<div class="medium-6 columns">
		<h3>Enable an account</h3>
		<form action="index.php?page=account" method="post">
			<label>Users: </label>
			<select name="username">
				<?php

					// Use the model to get all accounts
					$result = $this->model->getAllUsernames();

					// Loop through the result and display all the usernames
					while( $row = $result->fetch_assoc() ) {

						// Make sure the user is not an admin
						if( $row['Active'] == 'enabled' ) {
							continue;
						}

						echo '<option>'.$row['Username'].'</option>';

					}

				?>
			</select>
			<input type="submit" class="tiny button" value="Enable this account" name="enable-account">
			<?php if( $this->userEnableError != '' ) : ?>
			<small class="error"><?php echo $this->userEnableError; ?></small>
			<?php endif; ?>
			<?php if( $this->userEnableSuccess != '' ) : ?>
			<small class="alert-box success"><?php echo $this->userEnableSuccess; ?></small>
			<?php endif; ?>
		</form>
	</div>
</div>


<div class="row">
	<div class="columns">
		<h2>Add new Staff Member</h2>
		<form action="index.php?page=account" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="medium-4 columns">
					<label for="first-name">First Name: </label>
					<input type="text" name="first-name" id="first-name" value="<?php echo $this->firstName; ?>" placeholder="Bruce">
					<?php errorMessage($this->firstNameError); ?>
				</div>
				<div class="medium-4 columns">
					<label for="last-name">Last Name: </label>
					<input type="text" name="last-name" id="last-name" value="<?php echo $this->lastName; ?>" placeholder="Wayne">
					<?php errorMessage($this->lastNameError); ?>
				</div>
				<div class="medium-4 columns">
					<label for="job-title">Job Title: </label>
					<input type="text" name="job-title" id="job-title" value="<?php echo $this->job; ?>" placeholder="Crimefighter">
				
				</div>
				<div class="medium-6 columns">
					<label for="bio">Bio: </label>
					<textarea name="bio" id="bio" rows="4" cols="20"><?php echo $this->bio; ?></textarea>
					<?php errorMessage($this->bioError); ?>
				</div>
				<div class="medium-6 columns">
					<label for="profile-image">Proile Image: </label>
					<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
					<input type="file" class="button tiny" name="profile-image" id="profile-image">
					<?php
						errorMessage($this->profileImageError);
					?>
				</div>
				<div class="columns">
					<input type="submit" class="button tiny" value="Add new staff member" name="add-staff">
					<?php
						errorMessage($this->staffErrorMessage);
					
						// If there is a message to display
						$this->foundationAlert($this->staffSuccessMessage, 'success');
						
						
					?>
				</div>
			</div>
		</form>
	</div>
</div>

<div class="row" id="add-deal">
	<div class="columns">
		<h2>Add a new Deal</h2>
		<form action="index.php?page=account#add-deal" method="post" enctype="multipart/form-data">
			<div class="row">
				<div class="large-6 columns">
					<div class="row">
						<div class="columns">
							<label for="deal-name">Deal Name: </label>
							<input type="text" name="deal-name" placeholder="Cheap pizza" id="deal-name">
						</div>
						<div class="columns">
							<label for="business">Business: </label>
							<select name="business">
								<?php
									// Get all the businesses
									$result = $this->model->getAllBusinesses();

									// Loop through the results
									while( $row = $result->fetch_assoc() ) {

										echo '<option value="'.$row['id'].'">';
										echo $row['BusinessName'];
										echo '</option>';

									}

								?>
							</select>
						</div>
					</div>
				</div>
				<div class="large-6 columns">
					<label for="description">Deal Description: </label>
					<textarea name="description" id="description" cols="30" rows="5"></textarea>
				</div>
			</div>
			
			
			<div class="row">
				<div class="large-6 columns">
					<h3>Deal Starts</h3>
					<div class="row">
						<div class="large-2 columns">
							<label for="start-day">Day: </label>

							<?php $today = date('j');  ?>

							<select name="start-day" id="start-day">
								<?php for($i=1; $i<=31; $i++) {

									if( $today == $i ) {
										$selected = 'selected';
									} else {
										$selected = '';
									}

									echo "<option $selected>".$i.'</option>';

								} ?>
							</select>
						</div>

						<div class="large-2 columns">
							<label for="start-month">Month</label>
							<?php 
								$today = date('n');
								$months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
							?>
							
							<select name="start-month" id="start-month" >
								<?php

									for( $i=1; $i<=12; $i++ ) {

										if( $today == $i ) {
											$selected = 'selected';
										} else {
											$selected = '';
										}

										echo "<option value='$i' $selected>";
										echo $months[$i-1];
										echo '</option>';

									}

								?>
							</select>
						</div>

						<div class="large-2 columns">
							<label for="start-year">Year</label>
							<?php $today = date('Y'); ?>
							<select name="start-year" id="start-year" required>
								<?php

									// Always be this year and 5 into the future
									for($i=date('Y'); $i<date('Y')+5; $i++) {
											// If $today is the same as $i
											$selected = $today == $i ? 'selected' : '';

											echo "<option $selected>$i</option>";
									}

								?>
							</select>
						</div>

						<div class="large-2 columns">
							<label for="start-hour">Hour</label>

							<input value="<?php echo date('G'); ?>" type="number" name="start-hour" id="start-hour" min="0" max="23">
						</div>
						<div class="large-2 columns">
							<label for="start-minute">Minute</label>
							<input value="<?php echo date('i'); ?>" type="number" name="start-minute" id="start-minute" min="0" max="59">
						</div>
						<div class="large-2 columns">
							<label for="start-second">Second</label>
							<input value="<?php echo date('s'); ?>" type="number" name="start-second" id="start-second" min="0" max="59">
						</div>
					</div>
				</div>
				<div class="large-6 columns">
					<h3>Deal Ends: </h3>
					<div class="row">
						<div class="large-2 columns">
							<label for="end-day">Day: </label>
							<select name="end-day" id="end-day">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>
								<option>13</option>
								<option>14</option>
								<option>15</option>
								<option>16</option>
								<option>17</option>
								<option>18</option>
								<option>19</option>
								<option>20</option>
								<option>21</option>
								<option>22</option>
								<option>23</option>
								<option>24</option>
								<option>25</option>
								<option>26</option>
								<option>27</option>
								<option>28</option>
								<option>29</option>
								<option>30</option>
								<option>31</option>
							</select>
						</div>

						<div class="large-2 columns">
							<label for="end-month">Month</label>
							<select name="end-month" id="end-month" >
								<option value="1">Jan</option>
								<option value="2">Feb</option>
								<option value="3">Mar</option>
								<option value="4">Apr</option>
								<option value="5">May</option>
								<option value="6">Jun</option>
								<option value="7">Jul</option>
								<option value="8">Aug</option>
								<option value="9">Sep</option>
								<option value="10">Oct</option>
								<option value="11">Nov</option>
								<option value="12">Dec</option>
							</select>
						</div>

						<div class="large-2 columns">
							<label for="end-year">Year</label>
							<select name="end-year" id="end-year" required>
								<option>2015</option>
								<option>2016</option>
								<option>2017</option>
								<option>2018</option>
							</select>
						</div>

						<div class="large-2 columns">
							<label for="end-hour">Hour</label>
							<input value="12" type="number" name="end-hour" id="end-hour" min="0" max="23">
						</div>
						<div class="large-2 columns">
							<label for="end-minute">Minute</label>
							<input value="00" type="number" name="end-minute" id="end-minute" min="0" max="59">
						</div>
						<div class="large-2 columns">
							<label for="end-second">Second</label>
							<input value="00" type="number" name="end-second" id="end-second" min="0" max="59">
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="columns">
				<?php
					$this->foundationAlert($this->newDealDateError, 'error');
				?>
				</div>
			</div>

			<div class="row">
				<div class="large-3 columns">
					<div class="row collapse">
						<label for="original-price">Original Price: </label>
						<div class="small-3 columns">
							<span class="prefix">$</span>
						</div>
						<div class="small-9 columns">
							<input type="number" name="original-price" step="any">
						</div>
					</div>
				</div>
				<div class="large-3 columns">
					<div class="row collapse">
						<label for="discounted-price">Discounted Price: </label>
						<div class="small-3 columns">
							<span class="prefix">$</span>
						</div>
						<div class="small-9 columns">
							<input type="number" name="discounted-price" step="any">
						</div>
					</div>
				</div>
				<div class="large-3 columns">
					<label for="code">Coupon Code: </label>
					<input type="text" id="code" placeholder="freepopcorn" name="coupon-code">
				</div>
				<div class="large-3 columns">
					<label for="image">Image: </label>
					<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
					<input type="file" id="image" class="button tiny" name="image">
					<?php $this->foundationAlert($this->dealImageError, 'error'); ?>
				</div>
			</div>

			<h2>Categories: </h2>
			<?php

				$result = $this->model->getAllCategories();

				// Loop through each category and display as a checkbox
				while( $row = $result->fetch_assoc() ) {
					echo '<p><input type="checkbox" name="category[]" value="'.$row['id'].'">'.$row['category'].'</p>';
				}

			?>
			
			<input type="submit" class="button tiny" value="Add new deal!" name="add-deal">
		</form>
	</div>
</div>












