<div class="row">
	<div class="columns">
		
	</div>
	<div class="columns">
		<h1><?= $this->dealInfo['deal_name']; ?></h1>
		<p><?= $this->dealInfo['deal_description']; ?></p>
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