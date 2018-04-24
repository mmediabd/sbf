<?php
    include 'lib/session.php';
    session:: checksession();
?>

<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/format.php';?>

<?php
    $db = new Database();
?>
<?php
    if (!isset($_GET['delid']) || $_GET['delid'] == NULL) {
        echo "<script>window.location = 'productDetails.php';</script>";
    } else {
        $id=$_GET['delid'];

        $query = "select * from tbl_productdetails where id = '$id'";
        $getData = $db->select($query);
        if ($getData) {
        	while ($delimg = $getData->fetch_assoc()) {
        	}
        }

        $delquery = "delete from tbl_productdetails where id = '$id'";
        $delData = $db->delete($delquery);
        if ($delData) {

        	echo "<script>window.location = 'productDetails.php';</script>";
        } else {
        	echo "<script>alert('Data Not Deleted.!!');</script>";
        	echo "<script>window.location = 'productDetails.php';</script>";
        }
    }
?>