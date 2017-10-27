<?php 

// This page is included by browse.php.
// This page displays the available coffee products.
// This page will make use of the query result $r.
// The query returns an array of: description, image, sku, name, and stock.

// Only display the header once:
$header = false; 

// Added later in Chapter 8:
include('./includes/product_functions.inc.php');

// Loop through the results:
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	
	// If the header hasn't been shown, create it:
	if (!$header) {

		echo BOX_BEGIN; 

		echo '<h2>' . $category . '</h2>
			<div class="img-box">
			<p><img alt="' . $category . '" src="'.BASE_URL.'products/' . $row['image'] . '" />' . $row['description'] . '</p>
			<p><small>All listed products are currently available.</small>';

		echo '<form action="'.BASE_URL.'cart.php" method="get">
			<input type="hidden" name="action" value="add" /><select name="sku">';

		// The header has now been shown:
		$header = true;

	} // End of $header IF.

	// Create each option:
	echo '<option value="' . $row['sku'] . '">' . $row['name'] . get_price($type, $row['price'], $row['sale_price']) . '</option>';
	
} // End of WHILE loop. 

echo '</select> <input type="submit" value="Add to Cart" class="button" /></p></form></div>';

echo BOX_END;