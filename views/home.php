<?php
echo BOX_BEGIN;

echo '<div class="wrapper">';

// Check for sales!

// If records are returned, include the view:
if (mysqli_num_rows($r) > 0) {
	
	echo '<dl class="special fright">
		<dt><a href="'.BASE_URL.'shop/sales/">Sale Items</a></dt>';

	// Fetch each item:
   while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
   	echo '<dd><a href="'.BASE_URL.'shop/sales/#' . $row['sku'] . '" title="View This Product"><img alt="" src="'.BASE_URL.'products/' . $row['image'] . '" /><span>' . $row['sale_price'] . '</span></a></dd>';
   }
	
	echo '</dl>';

} // End of mysqli_num_rows() IF.

echo '<h2>Welcome to Our Online Coffee House!</h2>
<p>We\'re so glad you made it. Have a seat. Let me get you a fresh, hot cup o\' Joe. Cream and sugar? There you go.</p>
<p>Please use the links at the top to browse through our catalog. If you\'ve been here before, you can find things you bookmarked by clicking on your Wish List and Cart links. </p>
</div>';

echo BOX_END;

echo BOX_BEGIN;

echo '<h3>About Clever Coffee, Inc.</h3>
<p>Clever Coffee, Inc. has been selling coffee online since 1923. For years, Clever Coffee, Inc. failed to make a profit, due to the lack of computers and the Internet. Yadda, yadda, yadda.</p>
<p>It\'s safe to shop here, promise!</p>';

echo BOX_BEGIN;