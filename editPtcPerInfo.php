<?php include 'inc/header.php' ?>

<?php
    if (!isset($_GET['editid']) || $_GET['editid'] == NULL) {
        echo "<script>window.location = 'ptcpersonalinfo.php';</script>";
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
		<h1 class="text-center">Perfect Trading Corporation (PTC)</h1> 
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
			        $NIDNumber 		  = $fm->validation($_POST['NIDNumber']);
			        $Nominisname      = $fm->validation($_POST['Nominisname']);
			        $relation         = $fm->validation($_POST['relation']);
			        $nomini_address   = $fm->validation($_POST['nomini_address']);
			        $prodcutName      = $fm->validation($_POST['prodcutName']);
			        $productPrice     = $fm->validation($_POST['productPrice']);
			        $downPayment      = $fm->validation($_POST['downPayment']);
			        $inst_amount      = $fm->validation($_POST['inst_amount']);
			        $fdr_amount       = $fm->validation($_POST['fdr_amount']);
			        $admissionfee     = $fm->validation($_POST['admissionfee']);
			        $customarCatagory = $fm->validation($_POST['customarCatagory']);
			        $collectiontype   = $fm->validation($_POST['collectiontype']);
			        $collectionday    = $fm->validation($_POST['collectionday']);
			        $groupname        = $fm->validation($_POST['groupname']);
			        $marketing_officer = $fm->validation($_POST['marketing_officer']);
			        $status           = $fm->validation($_POST['status']);
			        $username 		  = $fm->validation($_POST['username']);

			        $acc_number		  = mysqli_real_escape_string($db->link, $acc_number);
			        $applicant_name	  = mysqli_real_escape_string($db->link, $applicant_name);
			        $father_name	  = mysqli_real_escape_string($db->link, $father_name);
			        $joining_date	  = mysqli_real_escape_string($db->link, $joining_date);
			        $editDate	  	  = mysqli_real_escape_string($db->link, $editDate);
			        $mobile_number	  = mysqli_real_escape_string($db->link, $mobile_number);
			        $address		  = mysqli_real_escape_string($db->link, $address);
			        $NIDNumber 		  = mysqli_real_escape_string($db->link, $NIDNumber);
			        $Nominisname 	  = mysqli_real_escape_string($db->link, $Nominisname);
			        $relation 	  	  = mysqli_real_escape_string($db->link, $relation);
			        $nomini_address   = mysqli_real_escape_string($db->link, $nomini_address);
			        $prodcutName   	  = mysqli_real_escape_string($db->link, $prodcutName);
			        $productPrice	  = mysqli_real_escape_string($db->link, $productPrice);
			        $downPayment      = mysqli_real_escape_string($db->link, $downPayment);
			        $inst_amount      = mysqli_real_escape_string($db->link, $inst_amount);
			        $fdr_amount       = mysqli_real_escape_string($db->link, $fdr_amount);
			        $admissionfee     = mysqli_real_escape_string($db->link, $admissionfee);
			      	$customarCatagory = mysqli_real_escape_string($db->link, $customarCatagory);
			        $collectiontype   = mysqli_real_escape_string($db->link, $collectiontype);
			        $collectionday    = mysqli_real_escape_string($db->link, $collectionday);
			        $groupname        = mysqli_real_escape_string($db->link, $groupname);
			        $marketing_officer = mysqli_real_escape_string($db->link, $marketing_officer);
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
        $uploaded_image = "img/PTC_Customer/".$unique_image;

    if ($applicant_name == "" || $father_name == "" || $joining_date == "" || $acc_number == "" || $mobile_number == "" || $address == "" || $NIDNumber == "" || $Nominisname == "" || $relation == "" || $nomini_address == "" || $marketing_officer == "" || $username == "") {
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
        $query = "UPDATE tbl_ptcpersonalinfo
        SET
        acc_number 		= '$acc_number',
	    applicant_name  = '$applicant_name',
	    father_name		= '$father_name',
	    joining_date	= '$joining_date',
	    editDate		= '$editDate',
	    mobile_number	= '$mobile_number',
	    address 		= '$address',
	    image 			= '$uploaded_image',
	    NIDNumber		= '$NIDNumber',
	    Nominisname		= '$Nominisname',
	    relation 		= '$relation',
	    nomini_address  = '$nomini_address',
	    prodcutName     = '$prodcutName',
        productPrice    = '$productPrice',
        downPayment    	= '$downPayment',
        inst_amount    	= '$inst_amount',
        fdr_amount     	= '$fdr_amount',
        admissionfee   	= '$admissionfee',
        customarCatagory = '$customarCatagory',
        collectiontype 	= '$collectiontype',
        collectionday  	= '$collectionday',
        groupname     	= '$groupname',
        marketing_officer = '$marketing_officer',
        username     	= '$username',
        status 			= '$status'
        WHERE id 		= '$id'";
        $updated_row = $db->update($query);

        if ($updated_row) {
        	echo "<script>window.location ='ptcpersonalinfo.php';</script>";
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
        $query = "UPDATE tbl_ptcpersonalinfo
        SET
        acc_number 		= '$acc_number',
	    applicant_name  = '$applicant_name',
	    father_name		= '$father_name',
	    joining_date	= '$joining_date',
	    editDate		= '$editDate',
	    mobile_number	= '$mobile_number',
	    address 		= '$address',
	    NIDNumber		= '$NIDNumber',
	    Nominisname		= '$Nominisname',
	    relation 		= '$relation',
	    nomini_address  = '$nomini_address',
	    prodcutName     = '$prodcutName',
        productPrice    = '$productPrice',
        downPayment    	= '$downPayment',
        inst_amount    	= '$inst_amount',
        fdr_amount     	= '$fdr_amount',
        admissionfee   	= '$admissionfee',
        customarCatagory = '$customarCatagory',
        collectiontype 	= '$collectiontype',
        collectionday  	= '$collectionday',
        groupname     	= '$groupname',
        marketing_officer 	= '$marketing_officer',
        username     	= '$username',
        status 			= '$status'
        WHERE id 		= '$id'";
        $updated_row = $db->update($query);

        if ($updated_row) {
        	echo "<script>window.location ='ptcpersonalinfo.php';</script>";
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
    $query = "select * from tbl_ptcpersonalinfo where id = '$id' order by id desc";
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
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Applicant Father Name :</label>
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
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Product Name :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="prodcutName" value="<?php echo $result['prodcutName'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Product Price :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="productPrice" value="<?php echo $result['productPrice'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Down Payment :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="downPayment" value="<?php echo $result['downPayment'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label" for="form-field-1"> Installment Amount :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="inst_amount" value="<?php echo $result['inst_amount'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> FDR Amount :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="fdr_amount" value="<?php echo $result['fdr_amount'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Admission Fee :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="admissionfee" value="<?php echo $result['admissionfee'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Customer Catagory :</label>
					<div class="col-xs-8 col-sm-7">
						<select class="col-xs-10 col-sm-5" id="select" name="customarCatagory">
				            <?php
				                $query = "select * from catatgory";
				                $getData = $db->select($query);
				                if ($getData) {
				                    while ($getResult = $getData->fetch_assoc()) { 
				                ?>
				                <option 
				                <?php
				                    if ($result['customarCatagory'] == $getResult['id']) { ?>
				                       selected = "selected"
				                <?php } ?> value="<?php echo $getResult['id'];?>"><?php echo $getResult['name'];?>
				                </option>
				            <?php } } ?>
				        </select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Collection Type :</label>
					<div class="col-xs-8 col-sm-7">
						<select class="col-xs-10 col-sm-5" id="select" name="collectiontype">
				            <?php
				                $query = "select * from collectionsystem";
				                $getData = $db->select($query);
				                if ($getData) {
				                    while ($getResult = $getData->fetch_assoc()) { 
				                ?>
				                <option 
				                <?php
				                    if ($result['collectiontype'] == $getResult['id']) { ?>
				                       selected = "selected"
				                <?php } ?> value="<?php echo $getResult['id'];?>"><?php echo $getResult['name'];?>
				                </option>
				            <?php } } ?>
				        </select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Collection Day :</label>
					<div class="col-xs-8 col-sm-7">
						<select class="col-xs-10 col-sm-5" id="select" name="collectionday">
				            <?php
				                $query = "select * from collectionday";
				                $getData = $db->select($query);
				                if ($getData) {
				                    while ($getResult = $getData->fetch_assoc()) { 
				                ?>
				                <option 
				                <?php
				                    if ($result['collectionday'] == $getResult['id']) { ?>
				                       selected = "selected"
				                <?php } ?> value="<?php echo $getResult['id'];?>"><?php echo $getResult['name'];?>
				                </option>
				            <?php } } ?>
				        </select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Group Name :</label>
					<div class="col-xs-8 col-sm-7">
						<select class="col-xs-10 col-sm-5" id="select" name="groupname">
				            <?php
				                $query = "select * from tbl_groupname";
				                $getdata = $db->select($query);
				                if ($getdata) {
				                    while ($getresult = $getdata->fetch_assoc()) { 
				                ?>
				                <option 
				                <?php
				                    if ($result['groupname'] == $getresult['id']) { ?>
				                       selected = "selected"
				                <?php } ?> value="<?php echo $getresult['id'];?>"><?php echo $getresult['name'];?>
				                </option>
				            <?php } } ?>
				        </select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Marketing Officer Name :</label>
					<div class="col-xs-8 col-sm-7">
						<select class="col-xs-10 col-sm-5" id="select" name="marketing_officer">
				            <?php
				                $query = "select * from  tbl_marketing_officer";
				                $getdata = $db->select($query);
				                if ($getdata) {
				                    while ($getresult = $getdata->fetch_assoc()) { 
				                ?>
				                <option 
				                <?php
				                    if ($result['marketing_officer'] == $getresult['id']) { ?>
				                       selected = "selected"
				                <?php } ?> value="<?php echo $getresult['id'];?>"><?php echo $getresult['name'];?>
				                </option>
				            <?php } } ?>
				        </select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1">Customer Status :</label>
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
					<label class="col-xs-4 col-sm-5 control-label"> User Name :</label>

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