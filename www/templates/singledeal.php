<div class="row">
	<div class="columns">
		
	</div>
	<div class="columns">
		<h1><?= $this->dealInfo['deal_name']; ?></h1>
		<p><?= $this->dealInfo['deal_description']; ?></p>
	</div>

	<div>
		<form action="index.php?page=cart" method="post">
			<input type="hidden" name="productID" value="<?= $_GET['dealid']; ?>">
			<input type="submit" name="add-to-cart" class="tiny button" value="Add to cart" >
		</form>
	</div>

	<div class="columns">
		<h2>Tags</h2>
		<ul>
		<?php

			while( $row = $this->dealTags->fetch_assoc() ) {
				echo '<li>';
				echo '<a href="index.php?page=search&categoryid='.$row['id'].'">';
				echo $row['category'];
				echo '</a>';
				echo '</li>';
			}

		?>
		</ul>
	</div>
</div>