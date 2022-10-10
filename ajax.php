<?php 
require __DIR__ . "./Model.php";

$id = $_POST["id"];

$instance = Model::getInstance();
$sql = "SELECT p.product_id, p.product_name, pr.cg_id, pr.price, pr.price_id, c.customer_group FROM price pr LEFT JOIN customer_group c ON c.cg_id = pr.cg_id LEFT JOIN products p ON p.product_id = pr.product_id WHERE pr.price_id = $id ORDER BY pr.price_id ASC";
$data = $instance->getData($sql)[0];

echo json_encode($data);

?>