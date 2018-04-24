<?php include 'inc/header.php' ?>

<?php
    if (!isset($_GET['editid']) || $_GET['editid'] == NULL) {
        echo "<script>window.location = 'sbfGeneralinvestorinfo.php';</script>";
        //header("Location:sbfPrimaryshareinfo.php");
    } else {
        $id = $_GET['editid'];
    }
?>
<div id="user-profile-3" class="user-profile row">
<div class="row">
	<div class="col-xs-12">

<!--Form Start-->
<div class="page-header">
		<h1 class="text-center">Shadhin Bahumukhi Firm (SBF)</h1> 
		<h4 class="text-center"><u>Edit Personal Information</u></h4>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<?php
			    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			    	$acc_number       = $fm->validation($_POST['acc_number']);
			        $applicant_name   = $fm->validation($_POST['applicant_name']);
			        $father_name   	  = $fm->validation($_POST['father_name']);
			        $joining_date     = $fm->validation($_POST['joining_date']);
			        $editDate     	  = $fm->validation($_POST['editDate']);
			        $mobile_number    = $fm->validation($_POST['mobile_number']);
			        $address 		  = $fm->validation($_POST['address']);
			        $blood_group 	  = $fm->validation($_POST['blood_group']);
			        $NIDNumber 		  = $fm->validation($_POST['NIDNumber']);
			        $Nominisname      = $fm->validation($_POST['Nominisname']);
			        $relation         = $fm->validation($_POST['relation']);
			        $nomini_address   = $fm->validation($_POST['nomini_address']);
			        $status           = $fm->validation($_POST['status']);
			        $username 		  = $fm->validation($_POST['username']);

			        $acc_number		  = mysqli_real_escape_string($db->link, $acc_number);
			        $applicant_name	  = mysqli_real_escape_string($db->link, $applicant_name);
			        $father_name	  = mysqli_real_escape_string($db->link, $father_name);
			        $joining_date	  = mysqli_real_escape_string($db->link, $joining_date);
			        $editDate	  	  = mysqli_real_escape_string($db->link, $editDate);
			        $mobile_number	  = mysqli_real_escape_string($db->link, $mobile_number);
			        $address		  = mysqli_real_escape_string($db->link, $address);
			        $blood_group	  = mysqli_real_escape_string($db->link, $blood_group);
			        $NIDNumber 		  = mysqli_real_escape_string($db->link, $NIDNumber);
			        $Nominisname 	  = mysqli_real_escape_string($db->link, $Nominisname);
			        $relation 	  	  = mysqli_real_escape_string($db->link, $relation);
			        $nomini_address   = mysqli_real_escape_string($db->link, $nomini_address);
			        $status           = mysqli_real_escape_string($db->link, $status);
			        $username 		  = mysqli_real_escape_string($db->link, $username);
			        $userid 		  = mysqli_real_escape_string($db->link, $_POST['userid']);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "img/SBF_investor/".$unique_image;

    if ($applicant_name == "" || $father_name == "" || $joining_date == "" || $acc_number == "" || $mobile_number == "" || $address == "" || $blood_group == "" || $NIDNumber == "" || $Nominisname == "" || $relation == "" || $nomini_address == "" || $username == "") {
    echo "<div class='alert alert-danger' role='alert' id='deletesuccess'>
    			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
				</button>
            	<strong>Warning!</strong> Field must not be empty.!!
           </div>";
        } else {

        if (!empty($file_name)) {

        
         if ($file_size >1048567) {
         	echo "<div class='alert alert-danger' role='alert' id='deletesuccess'>
    			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
				</button>
            	<strong>Warning!</strong> Image Size should be less then 1MB!
           </div>";
        }
         elseif (in_array($file_ext, $permited) === false) {
         	echo "<div class='alert alert-danger' role='alert' id='deletesuccess'>
    			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
				</button>
            	<strong>Warning!</strong> You can upload only :- "
         .implode(', ', $permited)."</div>";
        } 
        else {
        move_uploaded_file($file_temp, $uploaded_image);
        $query = "UPDATE tbl_sbfgeneralinvestorinfo
        SET
        acc_number 		= '$acc_number',
	    applicant_name  = '$applicant_name',
	    father_name		= '$father_name',
	    joining_date	= '$joining_date',
	    editDate		= '$editDate',
	    mobile_number	= '$mobile_number',
	    address 		= '$address',
	    blood_group		= '$blood_group',
	    image 			= '$uploaded_image',
	    NIDNumber		= '$NIDNumber',
	    Nominisname		= '$Nominisname',
	    relation 		= '$relation',
	    nomini_address  = '$nomini_address',
	    status 			= '$status'
        WHERE id 		= '$id'";
        $updated_row = $db->update($query);

        if ($updated_row) {
        	echo "<script>window.location ='sbfGeneralinvestorinfo.php';</script>";
	        } else{
	            echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
						</button>
						<strong>Warning! </strong>Information Not Updated.!!
					</div>";
	        }
        }
} else {
        $query = "UPDATE tbl_sbfgeneralinvestorinfo
        SET
        acc_number 		= '$acc_number',
	    applicant_name  = '$applicant_name',
	    father_name		= '$father_name',
	    joining_date	= '$joining_date',
	    editDate		= '$editDate',
	    mobile_number	= '$mobile_number',
	    address 		= '$address',
	    blood_group		= '$blood_group',
	    NIDNumber		= '$NIDNumber',
	    Nominisname		= '$Nominisname',
	    relation 		= '$relation',
	    nomini_address  = '$nomini_address',
	    status 			= '$status'
        WHERE id 		= '$id'";
        $updated_row = $db->update($query);

        if ($updated_row) {
        	echo "<script>window.location ='sbfGeneralinvestorinfo.php';</script>";
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
    }
    ?>


<?php
    $query = "select * from tbl_sbfgeneralinvestorinfo where id = '$id' order by id desc";
    $getData = $db->select($query);
    while ($result = $getData->fetch_assoc()) {
    
?>
			<form action="" method="POST" enctype="multipart/form-data" class="form-horizontal text-center">

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Account Number :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" readonly="" class="col-xs-10 col-sm-5" name="acc_number" value="<?php echo $result['acc_number'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Applicant Name :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="applicant_name" value="<?php echo $result['applicant_name'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Father Name :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="father_name" value="<?php echo $result['father_name'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Application Date :</label>
					<div class="col-xs-8 col-sm-7">
						<input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo $result['joining_date'];?>" data-date-format="dd-mm-yyyy"  name="joining_date" readonly="" />
					</div>
				</div>

				<div class="form-group hidden">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Edit Date :</label>
					<div class="col-xs-8 col-sm-7">
						<input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo date('d-m-Y, g:i a'); ?>" data-date-format="dd-mm-yyyy"  name="editDate" readonly="" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Mobile Number :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="mobile_number" value="<?php echo $result['mobile_number'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Address :</label>
					<div class="col-xs-8 col-sm-7">
						<textarea type="text" class="col-xs-10 col-sm-5" name="address"><?php echo $result['address'];?></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label" for="form-field-1"> NID Number :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="NIDNumber" value="<?php echo $result['NIDNumber'];?>"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Blood Groop :</label>
					<div class="col-xs-8 col-sm-7">
						<select class="col-xs-10 col-sm-5" id="select" name="blood_group">
				            <?php
				                $query = "select * from tbl_bloodgroup";
				                $getData = $db->select($query);
				                if ($getData) {
				                    while ($getResult = $getData->fetch_assoc()) { 
				                ?>
				                <option 
				                <?php
				                    if ($result['blood_group'] == $getResult['id']) { ?>
				                       selected = "selected"
				                <?php } ?> value="<?php echo $getResult['id'];?>"><?php echo $getResult['name'];?>
				                </option>
				            <?php } } ?>
				        </select>
					</div>
				</div>

				<div class="form-group">
					<img class="col-xs-10 col-sm-3 col-sm-offset-5 col-lg-offset-5" src="<?php echo $result['image'];?>"/> <br/> <br/>
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Applicant image :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="file" class="col-xs-10 col-sm-5" name="image" value="<?php echo $result['image'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label" for="form-field-1"> Nomini Name :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="Nominisname" value="<?php echo $result['Nominisname'];?>"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> With Nomini Relation :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="relation" value="<?php echo $result['relation'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Nomini Address :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="nomini_address" value="<?php echo $result['nomini_address'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1">General Investor Status :</label>
					<div class="col-xs-8 col-sm-7">
						<select class="col-xs-10 col-sm-5" id="select" name="status">
                            <?php
                                $query = "select * from tbl_user_status";
                                $getData = $db->select($query);
                                if ($getData) {
                                    while ($getResult = $getData->fetch_assoc()) { 
                                ?>
                                <option 
                                <?php
                                    if ($result['status'] == $getResult['status']) { ?>
                                       selected = "selected"
                                <?php } ?> value="<?php echo $getResult['status'];?>"><?php echo $getResult['name'];?>
                                </option>
                            <?php } } ?>
                        </select>
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