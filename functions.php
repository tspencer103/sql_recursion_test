 <?php
 
    function CreateProductSelector($rows) {

        /* build the initial form for selecting a product */
    	echo "<div class='form-group'>" . PHP_EOL;
        echo "<label for='sel1'>Select a brand:</label>" . PHP_EOL;
        echo "<br />" . PHP_EOL;
        echo "<form role='form' class='form-control' id='sel1' method='post' action='" . $_SERVER["PHP_SELF"] . "'>" . PHP_EOL;
        echo "<select id='selBG' name='product_id'>" . PHP_EOL;
        echo "<option value='' disabled selected>Brand</option>";

        foreach ($rows as $row) {
            echo '<option value = "' . $row['product_id'] . '">' . $row['product_name'] . '</option>' . PHP_EOL;
	    if ($_POST['product_id'] == $row['product_id']) {

	        /* save the product cat_id and name in $maker and save for later */
	        $maker['cat_id'] = $row['cat_id'];
	        $maker['product_name'] = $row['product_name'];
	    }
	} 
	
	echo "</select>" . PHP_EOL;
	echo "<button id='selBG' type='submit'value='submit'>Submit</button>" . PHP_EOL;
	echo "</form>" . PHP_EOL;
	echo "</div>" . PHP_EOL;

	return $maker;
    }
    
    function displayCategoryTrail($rows, $maker) {

        /* reverse the categories for display purposes */
	$rows = array_reverse ($rows , $preserve_keys = TRUE);

        /* display category(s) */
	foreach ($rows as $row) {
	    echo $row['cat_name'] . ' -> ';
	} 
	
	/* followed by product name */
	echo $maker['product_name'] . PHP_EOL;

        /* add the product's primary category name to $maker and save for later */
	$maker['category'] = $row['cat_name'];
        return $maker;
    }
    
    function displayOptionsSelector($rows, $maker) {

        /* make sure the product name was returned in the db query */
        $key = array_search($maker['product_name'], array_column($rows, 'product_name')); 

        /* if $key returns a boolean, then product name wasn't found. Otherwise continue. */
        if (is_bool($key) === FALSE) {

            /* display product and nearest category */
	    echo $maker['product_name'] . " (" . $maker['category'] . ")<br />" . PHP_EOL;
 
            /* and build selector */
            echo "<select id='selBG'>" . PHP_EOL; 
	    echo "<option value='' disabled selected>Options</option>" . PHP_EOL; 
            foreach($rows as $row) {
                if ($row['product_id'] == $_POST['product_id']) {
                    echo "<option>" . $row['option_name'] . "</option>" . PHP_EOL;
                }
            }
            
            echo "</select>" . PHP_EOL;
        }
    }
?>