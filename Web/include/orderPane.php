<!-- Order Pane -->
<div class="orderPane shadowBoxLight">
	<h1 id="order">Order</h1>
	<ul id="orderList">
		<?php include 'sessionOrderData.php' ?>
	</ul>
	<!-- Tax and total --> 
	<ul id="taxAndTotal">
		<li amount="" id="taxTotal">Tax at 8.25%: $0.00</li>
		<li amount="" id="grandTotal">Grand Total: $0.00</li>
	</ul>

	<?php
		if ($page=='checkout') {
			$buttonValue = 'Edit Order';
		} else {
			$buttonValue = 'Check Out';
		}
	?>
	<input class="userInput" type="submit" id="submitOrder" value="<?php echo $buttonValue; ?>">
</div>