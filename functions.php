<?php 

function tambah($data) {
    $instance = Model::getInstance();
    $conn = $instance->getConnection();

	$product_name = htmlspecialchars($data["product_name"]);
	$customer_group = htmlspecialchars($data["cg_id"]);
    
    $cg_id = 0;
    if ($customer_group == "Wholesale") {
        $cg_id = 2;
    } else {
        $cg_id = 1;
    }
	$price = htmlspecialchars($data["price"]);

	$query = "INSERT INTO products
				VALUES
			  ('', '$product_name')
			";
	mysqli_query($conn, $query);
    $product_id = $conn->insert_id;

   $query = "INSERT INTO price
				VALUES
			  ('', '$product_id', '$cg_id', '$price')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function ubah($data) {
    $instance = Model::getInstance();
    $conn = $instance->getConnection();

    $price_id = htmlspecialchars($data["id_price"]);
    $product_id = htmlspecialchars($data["id_product"]);
    
	$product_name = htmlspecialchars($data["product_name"]);
	$customer_group = htmlspecialchars($data["cg_id"]);
	$price = htmlspecialchars($data["price"]);
    
    $cg_id = 0;
    if ($customer_group == "Wholesale") {
        $cg_id = 2;
    } 
    if ($customer_group == "Retail") {
        $cg_id = 1;
    }
    
    $query = "UPDATE price pr SET pr.cg_id = $cg_id, pr.price = $price WHERE pr.price_id = $price_id";
    mysqli_query($conn, $query);

	$query = "UPDATE products p SET p.product_name = '$product_name' WHERE p.product_id = $product_id";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


?>