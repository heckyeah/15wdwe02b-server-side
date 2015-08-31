<div class="row">
	<div class="columns">
		<h1>Checkout</h1>

		<form action="index.php?page=checkout" method="post">
			
			<div>
				<label for="name">Full Name: </label>
				<input required type="text" id="name" name="name" placeholder="Bruce Wayne">
			</div>

			<div>
				<label for="postal">Postal Address: </label>
				<textarea required placeholder="20 Kent Terrace, Mt Vic, Wellington 6021" name="postal" id="postal" cols="30" rows="10"></textarea>
			</div>

			<p>Cart total: $<?= $this->grandTotal; ?></p>

			<input type="submit" value="Proceed to payment" name="go-pay" class="tiny success button">

		</form>
	</div>
</div>