<?php 
require __DIR__ . "./Model.php";

$id = $_POST["id"];

$instance = Model::getInstance();
$sql = "SELECT * FROM products p LEFT JOIN customer_group c ON c.cg_id = p.product_id LEFT JOIN price pr ON pr.price_id = p.product_id WHERE pr.price_id = $id ORDER BY p.product_id ASC";
$data = $instance->getData($sql)[0];

echo json_encode($data);

?>