<?php include 'inc/header.php' ?>

<?php
    if (!isset($_GET['editId']) || $_GET['editId'] == NULL) {
        echo "<script>window.location = 'installment.php';</script>";
    } else {
        $id = $_GET['editId'];
    }
?>
<div id="user-profile-3" class="user-profile row">
<div class="row">
    <div class="col-xs-12">

<!--Form Start-->
<div class="page-header">
        <h1 class="text-center">Perfect Trading Corporation (PTC)</h1> 
        <h4 class="text-center"><u>Edit Data</u></h4>
    </div><!-- /.page-header -->

    <div class="row">
        <div class="col-xs-12">
            <!-- PAGE CONTENT BEGINS -->
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $acc_number       = $fm->validation($_POST['acc_number']);
                    $entry_date       = $fm->validation($_POST['entry_date']);
                    $editDate         = $fm->validation($_POST['editDate']);
                    $installment      = $fm->validation($_POST['installment']);
                    $fdr              = $fm->validation($_POST['fdr']);
                    $remark           = $fm->validation($_POST['remark']);
                    $username         = $fm->validation($_POST['username']);

                    $acc_number       = mysqli_real_escape_string($db->link, $acc_number);
                    $entry_date       = mysqli_real_escape_string($db->link, $entry_date);
                    $editDate         = mysqli_real_escape_string($db->link, $editDate);
                    $installment      = mysqli_real_escape_string($db->link, $installment);
                    $fdr              = mysqli_real_escape_string($db->link, $fdr);
                    $remark           = mysqli_real_escape_string($db->link, $remark);
                    $username         = mysqli_real_escape_string($db->link, $username);
                    $userid           = mysqli_real_escape_string($db->link, $_POST['userid']);


    if ($acc_number == "" || $entry_date == "" || $installment == "" || $fdr == "") {
    echo "<div class='alert alert-danger' role='alert' id='deletesuccess'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
                </button>
                <strong>Warning!</strong> Field must not be empty.!!
           </div>";
        } else {
        $query = "UPDATE tbl_installment
        SET
        acc_number      = '$acc_number',
        entry_date      = '$entry_date',
        editDate        = '$editDate',
        installment     = '$installment',
        fdr             = '$fdr',
        remark          = '$remark'
        WHERE id        = '$id'";
        $updated_row = $db->update($query);

        if ($updated_row) {
            echo "<script>window.location ='installment.php';</script>";
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
    $query = "select * from tbl_installment where id = '$id' order by id desc";
    $getData = $db->select($query);
    while ($result = $getData->fetch_assoc()) {
    
?>
            <form action="" method="POST" class="form-horizontal text-center">

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Account Number :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" name="acc_number" value="<?php echo $result['acc_number'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Issue Date :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo $result['entry_date'];?>" data-date-format="dd-mm-yyyy"  name="entry_date" readonly="" />
                    </div>
                </div>

                <div class="form-group hidden">
                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Edit Date :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo date('d-m-Y, g:i a'); ?>" data-date-format="dd-mm-yyyy"  name="editDate" readonly="" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Installment :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" name="installment" value="<?php echo $result['installment'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> FDR Amount :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" name="fdr" value="<?php echo $result['fdr'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Remark's :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" name="remark" value="<?php echo $result['remark'];?>"/>
                    </div>
                </div>

                <div class="form-group hidden">
                    <label class="col-xs-4 col-sm-5 control-label "> User Name :</label>

                    <div class="col-xs-8 col-sm-7">
                        <input type="text"  value="<?php echo Session::get('username')?>" class="col-xs-10 col-sm-5" name="username" readonly/>

                        <input type="hidden" name="userid" value="<?php echo Session::get('userId')?>" class="col-xs-10 col-sm-5" />
                    </div>
                </div>

                <div class="form-group">
                    <label></label>
                    <div class="row text-center">
                        <input type="submit" name="submit" class="btn btn-lg btn-success btn-round" value="Update">
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