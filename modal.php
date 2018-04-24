<?php ob_start(); ?>
<?php
    include 'lib/session.php';
    session::checksession();
?>

<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/format.php';?>

<?php
  $db = new Database();
  $fm = new format();
?>


<?php date_default_timezone_set('Asia/Dhaka'); ?>

<?php
    if (isset($_GET['action']) && $_GET['action'] == "logout") {
        session:: destroy();
    }
?>


	
<?php
    if (!isset($_GET['editid']) || $_GET['editid'] == NULL) {
        echo "<script>window.location = 'others.php';</script>";
    } else {
        $postid=$_GET['editid'];
    }
?>

	<a href="#modal-table" role="button" class="green" data-toggle="modal">
		<i class="ace-icon fa fa-pencil bigger-130"></i>
	</a>
    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name  = mysqli_real_escape_string($db->link, $_POST['name']);
        $designation    = mysqli_real_escape_string($db->link, $_POST['designation']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

    if ($name == "" || $designation == "") {
        echo "<span class='error'>Field must not be empty.!!</span>";
        } else {

        if (!empty($file_name)) {

        
         if ($file_size >1048567) {
         echo "<span class='error'>Image Size should be less then 1MB!</span>";
        }
         elseif (in_array($file_ext, $permited) === false) {
         echo "<span class='error'>You can upload only:-"
         .implode(', ', $permited)."</span>";
        } 
        else {
        move_uploaded_file($file_temp, $uploaded_image);
        $query = "UPDATE tbl_otherscost
                SET
                name         = '$name',
                designation  = '$designation',
                image        = '$uploaded_image'
                WHERE id = '$postid'";
        $updated_row = $db->update($query);

        if ($updated_row) {
         echo "<span class='success'>Porfile Updated Successfully.</span>";
        }
        else {
         echo "<span class='error'>Porfile Not Updated !</span>";
            }
        }
} else {
        $query = "UPDATE tbl_otherscost
                SET
                name         = '$name',
                designation  = '$designation'
                WHERE id = '$postid'";
        $updated_row = $db->update($query);

        if ($updated_row) {
         echo "<span class='success'>Porfile Updated Successfully.</span>";
        }
        else {
         echo "<span class='error'>Porfile Not Updated !</span>";
            }
        }
     }
    }
    ?>

    <div class="block">
    <?php
    $query = "select * from tbl_otherscost where id = '$postid' order by id desc";
    $getpost = $db->select($query);
        while($postresult = $getpost->fetch_assoc()){

    ?>

	
  <div id="load_popup_modal_contant" class="" role="dialog">

  <div class="modal-dialog modal-md">
<?php
//$id1 = $_POST["id1"];
//$id2 = $_POST["id2"];
?>
	<form role="form" class="form-inline" role="form" id="form_load_content_id">
    <!-- Start: Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Show Popup Title Here</h4>
      </div>
	    <div id="validation-error"></div>
  <div class="cl"></div>
	    <div class="modal-body">
	<h3> Modal Popup content Here</h3>
      </div>
      <div class="modal-footer">

	  <input name="submit_popup" id="submit_popup" type="button" value="SUBMIT" class="btn btn-primary" />
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	  </form>
      </div>
    </div>
  </div>
  </div>

