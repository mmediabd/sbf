<?php include 'inc/header.php' ?>
<?php $id = Session::get("userId"); ?>

<div class="">
<div id="user-profile-3" class="user-profile row">
    <div class="col-sm-offset-1 col-sm-10">

        <div class="space"></div>
            <!-- PAGE CONTENT BEGINS -->
            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $name       = $fm->validation($_POST['name']);
                    $username   = $fm->validation($_POST['username']);
                    $password   = $fm->validation(md5($_POST['password']));
                    $email      = $fm->validation($_POST['email']);
                    $editDate   = $fm->validation($_POST['editDate']);

                    $name       = mysqli_real_escape_string($db->link, $name);
                    $username   = mysqli_real_escape_string($db->link, $username);
                    $password   = mysqli_real_escape_string($db->link, $password);
                    $email      = mysqli_real_escape_string($db->link, $email);
                    $editDate   = mysqli_real_escape_string($db->link, $editDate);


    if ($name == "" || $email == "" || $username == "" || $password == "" ) {
    echo "<div class='alert alert-danger' role='alert' id='deletesuccess'>
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
                </button>
                <strong>Warning!</strong> Field must not be empty.!!
           </div>";
        } else {
        $query = "UPDATE tbl_user
        SET
        name          = '$name',
        username      = '$username',
        password      = '$password',
        email         = '$email',
        editDate      = '$editDate'
        WHERE id      = '$id'";
        $updated_row = $db->update($query);
        if ($updated_row) {
            echo "<script>window.location ='profile.php';</script>";
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
    		$query = "SELECT * FROM tbl_user WHERE id = '$id'";
			$getdata =$db->select($query);
    		if ($getdata) {
    			while ($result = $getdata->fetch_assoc()) {
    	 ?>

            <form action="" method="POST" class="form-horizontal">
            <div class="tabbable">
                <div class="tab-content profile-edit-tab-content">
                    <div id="edit-basic" class="tab-pane in active">
                        <h4 class="header blue bolder smaller">User Profile</h4>
                        <div class="row">
                            <div class="vspace-12-sm"></div>
                            <div class="col-xs-12 col-sm-8">

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-username">Name :</label>

                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" id="form-field-username" value="<?php echo $result['name']; ?>" name="name">
                                    </div>
                                </div>

								<div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-username">Email :</label>

                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" id="form-field-username" value="<?php echo $result['email']; ?>" name="email"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-username">Username :</label>

                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" id="form-field-username" value="<?php echo $result['username']; ?>" name="username" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-4 control-label no-padding-right" for="form-field-username">Password :</label>

                                    <div class="col-sm-8">
                                        <input class="col-xs-12 col-sm-10" type="text" id="form-field-username" name="password" value="<?php echo $result['password']; ?>" />
                                    </div>
                                </div>

                                <div class="form-group hidden">
                                    <label class="col-xs-4 col-sm-5 control-label " for="form-field-1">Edit Date:</label>
                                    <div class="col-xs-8 col-sm-7">
                                        <input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo date('d-m-Y, g:i a'); ?>" data-date-format="dd-mm-yyyy"  name="editDate" readonly="" />
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
<?php } } ?>
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