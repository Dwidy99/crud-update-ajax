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

    $price_id = htmlspecialchars($data["price_id"]);
    $product_id = htmlspecialchars($data["product_id"]);
    
	$product_name = htmlspecialchars($data["product_name"]);
	$customer_group = htmlspecialchars($data["cg_id"]);
	$price = htmlspecialchars($data["price"]);
    
    $cg_id = 0;
    if ($customer_group == "Wholesale") {
        $cg_id = 2;
    } else {
        $cg_id = 1;
    }
    echo "Product Name = ", $product_name, ". Product ID = ", $product_id, ". Customer Group = ", $customer_group, ". CG ID = ", $cg_id, ". Price ID = ", $price_id;

    
    $query = "UPDATE price pr SET pr.price = $price WHERE pr.price_id = $price_id";
    mysqli_query($conn, $query);

    $query = "UPDATE price pr SET pr.cg_id = $cg_id WHERE pr.price_id = $price_id";
    mysqli_query($conn, $query);

	$query = "UPDATE products SET product_name = $product_name WHERE product_id = $product_id";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


?>