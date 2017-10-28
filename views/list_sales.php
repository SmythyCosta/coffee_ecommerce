<?php 

// This page is included by sales.php.
// This page displays the available sale products.
// This page will make use of the query result $r.
// The query returns an array of: description, image, sku, name, and stock.

// Added later in Chapter 8:
include('./includes/product_functions.inc.php');

echo BOX_BEGIN;

echo '<h2>Current Sale Items</h2>';

// Loop through each item:
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	
	echo '<h3 id="' . $row['sku'] . '">' . $row['category'] . '::' . $row['name'] .'</h3>
  	<div class="img-box">
     	<p><img alt="' . $row['name'] . '" src="'.BASE_URL.'products/' . $row['image']  . '" />' . $row['description'] . '<br />' . 
		get_price('goodies', $row['price'], $row['sale_price']) . '
		<strong>Availability:</strong> ' . get_stock_status($row['stock']) . '</p>
    <p><a href="'.BASE_URL.'cart.php?sku=' . $row['sku'] . '&action=add" class="button">Add to Cart</a></p></div>';
					
}

echo BOX_END;