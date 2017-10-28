<?php echo BOX_BEGIN; ?>
<h2>Your Wish List</h2>
<p>Please use this form to update your wish list. You may change the quantities, move items to your cart for purchasing, or remove items entirely.</p>
<form action="/wishlist.php" method="POST">
<table border="0" cellspacing="8" cellpadding="6">
	<tr>
		<th align="center">Item</th>
		<th align="center">Quantity</th>
		<th align="right">Price</th>
		<th align="right">Subtotal</th>
		<th align="center">Options</th>
	</tr>
<?php // Display the items.

// Fetch each item:
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	$price = get_just_price($row['price'], $row['sale_price']);
	$subtotal = $price * $row['quantity'];
	echo '<tr>
		<td>' . $row['category'] . '::' . $row['name'] . '</td>
		<td align="center"><input type="text" name="quantity[' . $row['sku'] . ']" value="' . $row['quantity'] . '" size="2" class="small" /></td>
		<td align="right">$' . number_format($price, 2) . '</td>
		<td align="right">$' . number_format($subtotal, 2) . '</td>
		<td align="right"><a href="/cart.php?sku=' . $row['sku'] . '&action=move&qty=' . $row['quantity'] .'">Move to Cart</a><br /><a href="/wishlist.php?sku=' . $row['sku'] . '&action=remove">Remove from Wish List</a></td>
	</tr>
	';
	
	// Check the stock status:
	if ( ($row['stock'] > 0) && ($row['stock'] < 10)) {
		echo '<tr class="error"><td colspan="5" align="center">There are only ' . $row['stock'] . ' left in stock of the ' . $row['name'] . '.</td></tr>';
	}

} // End of WHILE loop. 

echo '</table><p align="center"><input type="submit" value="Update Quantities" class="button" /></form></p>';

echo BOX_END; 
?>	