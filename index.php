<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Test App</title>
<meta name="description" content="This is just a test">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="style.css">

</head>
<body>

<div class="container">
<h2>Test using Recursion of Hierarchical table</h2>

<?php

    require("class_db.php");
    require("functions.php");

    $db = new Db();    
    if (is_bool($db) === TRUE) {
    	die("Unable to connect to database");
    }

    /* Retrieve product data and build a selector.  Note: $maker is an array to hold 
       the current product_id, product_name and product category */
    $rows = $db -> select("SELECT product_id, product_name, cat_id FROM test_products");
    $maker = CreateProductSelector($rows, $db);

    echo "<br />";
  
    /* if user chooses a product, retrieve category data and display product category(s) */
    if($_POST['product_id']) {

	/* Traverse that Hierarchical table to get colors assigned to each product (if exists) */
    $rows = $db -> select("select t.cat_id, t.cat_name, @pv := t.cat_parent_id cat_parent_id\n"
	    . "from (select * from test_categories order by cat_id desc) t\n"
	    . "join (select @pv := $maker[cat_id]) tmp\n"
	    . "where t.cat_id = @pv\n"
	    . "");
        
        $maker = displayCategoryTrail($rows, $maker);
        
    	echo "<br /><br/>" . PHP_EOL; 

        /* retrieve product's options (if they exist) and display them in a selector. Otherwise do nothing. */
        $rows = $db -> select("SELECT test_products.product_id, test_products.product_name, test_options.option_name\n"
            . "FROM test_products\n"
            . " INNER JOIN test_assign_option_product\n"
            . " ON test_products.product_id=test_assign_option_product.product_id\n"
            . " INNER JOIN test_options\n"
            . " ON test_assign_option_product.option_id = test_options.option_id\n");
            

       displayOptionsSelector($rows,$maker);
    
   }

?>

</div>
</body>
</html>


