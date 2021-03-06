<?php 
// This page is included by shop.php.
// This page displays the individual categories.
// This page will make use of the query result $r.
// The query returns an array of: id, category, description, and image.

// Begin the HTML box:
echo BOX_BEGIN;

echo '<ul class="items-list">';

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { // Fetch each item.
	
	// Print the item within some HTML:
	echo '<li><h3>' . $row['category'] . ' </h3>
                <p><img alt="' . $row['category'] . '" src="'.BASE_URL.'products/' . $row['image'] . '" />' . $row['description'] . '<br />
                <a href="'.BASE_URL.'browse/' . $type . '/' . urlencode($row['category']) . '/' . $row['id'] . '" class="h4">View All ' . $row['category'] . ' Products</a></p>
             </li>';	

}

echo '</ul>';

// Complete the HTML box:
echo BOX_END;