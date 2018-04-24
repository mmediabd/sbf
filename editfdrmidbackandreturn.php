<?php include 'inc/header.php' ?>

<?php
    if (!isset($_GET['editId']) || $_GET['editId'] == NULL) {
        echo "<script>window.location = 'fdrmidbackandreturn.php';</script>";
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
                    $name             = $fm->validation($_POST['name']);
                    $inputdate        = $fm->validation($_POST['inputdate']);
                    $editDate         = $fm->validation($_POST['editDate']);
                    $midback          = $fm->validation($_POST['midback']);
                    $fdr_return       = $fm->validation($_POST['fdr_return']);
                    $vauchar          = $fm->validation($_POST['vauchar']);
                    $remark           = $fm->validation($_POST['remark']);
                    $username         = $fm->validation($_POST['username']);

                    $acc_number       = mysqli_real_escape_string($db->link, $acc_number);
                    $name             = mysqli_real_escape_string($db->link, $name);
                    $inputdate        = mysqli_real_escape_string($db->link, $inputdate);
                    $editDate         = mysqli_real_escape_string($db->link, $editDate);
                    $midback          = mysqli_real_escape_string($db->link, $midback);
                    $fdr_return       = mysqli_real_escape_string($db->link, $fdr_return);
                    $vauchar          = mysqli_real_escape_string($db->link, $vauchar);
                    $remark           = mysqli_real_escape_string($db->link, $remark);
                    $username         = mysqli_real_escape_string($db->link, $username);
                    $userid           = mysqli_real_escape_string($db->link, $_POST['userid']);


    if ($acc_number == "" || $name == "" || $inputdate == "" || $midback == "" || $fdr_return == "" || $vauchar == "") {
    echo "<div class='alert alert-danger' role='alert' id='deletesuccess'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
                </button>
                <strong>Warning!</strong> Field must not be empty.!!
           </div>";
        } else {
        $query = "UPDATE tbl_fdrmidbackreturn
        SET
        acc_number      = '$acc_number',
        name            = '$name',
        inputdate       = '$inputdate',
        editDate        = '$editDate',
        midback         = '$midback',
        fdr_return      = '$fdr_return',
        vauchar         = '$vauchar',
        remark          = '$remark'
        WHERE id        = '$id'";
        $updated_row = $db->update($query);

        if ($updated_row) {
            echo "<script>window.location ='fdrmidbackandreturn.php';</script>";
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
    $query = "select * from tbl_fdrmidbackreturn where id = '$id' order by id desc";
    $getData = $db->select($query);
    while ($result = $getData->fetch_assoc()) {
    
?>
            <form action="" method="POST" class="form-horizontal text-center">

                <div class="form-group tabbable">
                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1">Account No :</label>
                <div class="col-xs-8 col-sm-4 col-md-3 col-lg-4">
                    <select class="col-xs-10 col-sm-9" id="select" name="acc_number" >
                            <?php
                                $query = "select * from tbl_ptcpersonalinfo";
                                $getData = $db->select($query);
                                if ($getData) {
                                    while ($getResult = $getData->fetch_assoc()) { 
                                ?>
                                <option 
                                <?php
                                    if ($result['acc_number'] == $getResult['acc_number']) { ?>
                                       selected = "selected"
                                <?php } ?> value="<?php echo $getResult['acc_number'];?>"><?php echo $getResult['acc_number'];?>
                                </option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Name :</label>

                    <div class="col-xs-8 col-sm-4 col-md-3 col-lg-4">
                    <select class="col-xs-10 col-sm-9" id="select" name="name" >
                            <?php
                                $query = "select * from tbl_ptcpersonalinfo";
                                $getData = $db->select($query);
                                if ($getData) {
                                    while ($getResult = $getData->fetch_assoc()) { 
                                ?>
                                <option 
                                <?php
                                    if ($result['name'] == $getResult['applicant_name']) { ?>
                                       selected = "selected"
                                <?php } ?> value="<?php echo $getResult['applicant_name'];?>"><?php echo $getResult['applicant_name'];?>
                                </option>
                            <?php } } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Issue Date :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo $result['inputdate'];?>" data-date-format="dd-mm-yyyy"  name="inputdate" readonly="" />
                    </div>
                </div>

                <div class="form-group hidden">
                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Edit Date :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo date('d-m-Y, g:i a'); ?>" data-date-format="dd-mm-yyyy"  name="editDate" readonly="" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Midback :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" name="midback" value="<?php echo $result['midback'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> FDR Return :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" name="fdr_return" value="<?php echo $result['fdr_return'];?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Vauchar No :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" class="col-xs-10 col-sm-5" name="vauchar" value="<?php echo $result['vauchar'];?>">
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