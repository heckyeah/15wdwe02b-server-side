<div class="row">
	<div class="columns">
		<h1>Your Cart Contents</h1>
		<table style="width: 100%">
			<thead>
				<tr>
					<th>Product Name</th>
					<th>Discounted Price</th>
					<th>Update Item</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($_SESSION['cart'] as $cartItem): ?>

				<tr>
					<td><?= $cartItem['name']; ?></td>
					<td><?= $cartItem['discounted-price']; ?></td>
					<td>
						<form action="index.php?page=cart" method="post">
							<input type="submit" name="remove-from-cart" value="Remove" class="tiny button">
						</form>
					</td>
				</tr>

				<?php endforeach; ?>
			</tbody>
		</table>

		<a href="index.php?page=checkout" class="tiny success button">Go to checkout</a>

	</div>
</div>