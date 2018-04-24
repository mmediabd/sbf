<?php include 'inc/header.php' ?>

<?php
    if (!isset($_GET['editId']) || $_GET['editId'] == NULL) {
        echo "<script>window.location = 'productDetails.php';</script>";
    } else {
        $id = $_GET['editId'];
    }
?>
<div class="">
<div id="user-profile-3" class="user-profile row">
    <div class="col-sm-offset-1 col-sm-10">

        <div class="space"></div>
            <!-- PAGE CONTENT BEGINS -->
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name       = $fm->validation($_POST['name']);
                    $size       = $fm->validation($_POST['size']);
                    $garrenty   = $fm->validation($_POST['garrenty']);
                    $warrenty   = $fm->validation($_POST['warrenty']);
                    $picec      = $fm->validation($_POST['picec']);
                    $downPayment = $fm->validation($_POST['downPayment']);
                    $ins_time   = $fm->validation($_POST['ins_time']);
                    $editDate   = $fm->validation($_POST['editDate']);
                    $username   = $fm->validation($_POST['username']);

                    $name       = mysqli_real_escape_string($db->link, $name);
                    $size       = mysqli_real_escape_string($db->link, $size);
                    $garrenty   = mysqli_real_escape_string($db->link, $garrenty);
                    $warrenty   = mysqli_real_escape_string($db->link, $warrenty);
                    $picec      = mysqli_real_escape_string($db->link, $picec);
                    $downPayment = mysqli_real_escape_string($db->link, $downPayment);
                    $ins_time   = mysqli_real_escape_string($db->link, $ins_time);
                    $editDate   = mysqli_real_escape_string($db->link, $editDate);
                    $username   = mysqli_real_escape_string($db->link, $username);
                    $userid     = mysqli_real_escape_string($db->link, $_POST['userid']);
                    


    if ($name == "" || $size == "" || $garrenty == "" || $warrenty == "" || $picec == "" || $downPayment == "" || $ins_time == "" || $username == "") {
    echo "<div class='alert alert-danger' role='alert' id='deletesuccess'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
                </button>
                <strong>Warning!</strong> Field must not be empty.!!
           </div>";
        } else {
        $query = "UPDATE tbl_productdetails
        SET
        name          = '$name',
        size          = '$size',
        garrenty      = '$garrenty',
        warrenty      = '$warrenty',
        picec         = '$picec',
        downPayment   = '$downPayment',
        ins_time      = '$ins_time',
        editDate      = '$editDate',
        username      = '$username'
        WHERE id      = '$id'";
        $updated_row = $db->update($query);

        if ($updated_row) {
            echo "<script>window.location ='productDetails.php';</script>";
            } else{
                echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
                        </button>
                        <strong>Warning! </strong>Information Not Updated.!!
                    </div>";
                }
            }
        }
    ?>

<?php
    $query = "select * from tbl_productdetails where id = '$id' order by id desc";
    $getData = $db->select($query);
    while ($result = $getData->fetch_assoc()) {
?>
            <form action="" method="POST" class="form-horizontal">
            <div class="tabbable">
                <div class="tab-content profile-edit-tab-content">
                    <div id="edit-basic" class="tab-pane in active">
                        <h4 class="header blue bolder smaller">Update Product Details</h4>
                        <div class="row">
                            <div class="vspace-12-sm"></div>
                            <div class="col-xs-12 col-sm-8">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-username">Product Name :</label>
                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" id="form-field-username" value="<?php echo $result['name']; ?>" name="name">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-username">Product Size :</label>
                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" id="form-field-username" value="<?php echo $result['size']; ?>" name="size">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-username">Product Garrenty :</label>
                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" id="form-field-username" value="<?php echo $result['garrenty']; ?>" name="garrenty">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-username">Product Warrenty :</label>
                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" id="form-field-username" value="<?php echo $result['warrenty']; ?>" name="warrenty">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-username">Product Price :</label>
                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" id="form-field-username" value="<?php echo $result['picec']; ?>" name="picec">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-username">Down Payment :</label>
                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" id="form-field-username" value="<?php echo $result['downPayment']; ?>" name="downPayment">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-username">Installment Time :</label>
                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" id="form-field-username" value="<?php echo $result['ins_time']; ?>" name="ins_time">
                                    </div>
                                </div>

                                <div class="form-group hidden">
                                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Edit Date:</label>
                                    <div class="col-xs-8 col-sm-7">
                                        <input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo date('d-m-Y, g:i a'); ?>" data-date-format="dd-mm-yyyy"  name="editDate" readonly="" />
                                    </div>
                                </div>

                                <div class="form-group hidden">
                                    <label class="col-xs-4 col-sm-5 control-label "> User Name:</label>

                                    <div class="col-xs-8 col-sm-7">
                                        <input type="text"  value="<?php echo Session::get('username')?>" class="col-xs-10 col-sm-5" name="username" readonly/>

                                        <input type="hidden" name="userid" value="<?php echo Session::get('userId')?>" class="col-xs-10 col-sm-5" />
                                    </div>
                                </div>

                                <div class="space-4"></div>
                            </div>
                        </div>
                </div>
            </div>

            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-success btn-round" type="submit" name="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Update
                    </button>
                </div>
            </div>
        </form>
<?php } ?>
</div>
</div>
</div>
</div>

</div>
</div>

<!--Form End-->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<?php include 'inc/footer.php' ?>