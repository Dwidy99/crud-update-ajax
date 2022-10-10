<?php 
    require_once __DIR__ . "./Model.php";
    require_once __DIR__ . "./functions.php";

 try {
     $instance = Model::getInstance();
     $conn = $instance->getConnection();
     $error = mysqli_connect_errno();
     if ($error != 0) {
        throw new Exception("Connection database error", 1);
     }
 } catch (\Exception $th) {
    echo $th->getMessage();
    die;
 }

 
 // cek apakah tombol submit sudah ditekan atau belum
 if( isset($_POST["submit"]) ) {
     var_dump($_POST);
     die;
     
     if ($_POST["id_price"]) {
         if( ubah($_POST) > 0 ) {
             echo "
             Update Data Berhasil
             ";
            } else {
            echo "
            Update Data Gagal
            ";
        }
    } else {
        // cek apakah data berhasil di tambahkan atau tidak
        if( tambah($_POST) > 0 ) {
            echo "
            Insert Data Berhasil
            ";
        } else {
            echo "
            Insert Data Gagal
            ";
        }
    }
}

$instance = Model::getInstance();
$sql = "SELECT p.product_name, pr.cg_id, pr.price, pr.price_id, p.product_id FROM price pr LEFT JOIN customer_group c ON c.cg_id = pr.cg_id LEFT JOIN products p ON p.product_id = pr.product_id ORDER BY pr.price_id ASC";
$data = $instance->getData($sql);
?>
<html>

<head>
    <title>CRUD AJAX</title>
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <form id="form" method="POST">
        <input type="text" name="id_price" id="price_id" value="" />
        <input type="text" name="id_product" id="product_id" value="" />
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" id="product_name" value="" />
        <div class="radio">
            <label for="customer_group">Customer Group</label>
            <input type="radio" name="cg_id" id="retail" value="Retail" /> Retail
            <input type="radio" name="cg_id" id="wholesale" value="Wholesale" /> Wholesale
        </div>
        <label for="price">Price</label>
        <input type="number" name="price" id="price" value="" />
        <div class="button">
            <button type="submit" id="submit" name="submit" value="submit">Save</button>
        </div>
    </form>

    <table id="table">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Customer Group</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $row) : ?>
            <tr>
                <td class="product-name"><?= $row["product_name"]; ?></td>
                <td class="customer-group">
                    <?php if ($row["cg_id"] == 1) : ?>
                    <?= "Retail"; ?>
                    <?php else : ?>
                    <?= "Wholesale"; ?>
                    <?php endif; ?>
                </td>
                <td class="price"><?= $row["price"]; ?></td>
                <td class="edit">
                    <button type="button" class="edit" id="id-edit" data-id="<?= $row["price_id"]; ?>">Edit</button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>

</html>