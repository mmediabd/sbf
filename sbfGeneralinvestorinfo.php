<?php include 'inc/header.php' ?>


<div id="user-profile-3" class="user-profile row">
<div class="row">
	<div class="col-xs-12">

	<!--Form Start-->

<div class="page-header">
		<h1 class="text-center">Shadhin Bahumukhi Firm (SBF)</h1>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<?php
			    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			        $applicant_name   = $fm->validation($_POST['applicant_name']);
			        $father_name      = $fm->validation($_POST['father_name']);
			        $joining_date     = $fm->validation($_POST['joining_date']);
			        $acc_number       = $fm->validation($_POST['acc_number']);
			        $mobile_number    = $fm->validation($_POST['mobile_number']);
			        $address          = $fm->validation($_POST['address']);
			        $blood_group 	  = $fm->validation($_POST['blood_group']);
			        $NIDNumber 	  = $fm->validation($_POST['NIDNumber']);
			        $Nominisname      = $fm->validation($_POST['Nominisname']);
			        $relation         = $fm->validation($_POST['relation']);
			        $nomini_address   = $fm->validation($_POST['nomini_address']);
			        $username 	  = $fm->validation($_POST['username']);

			        $applicant_name	  = mysqli_real_escape_string($db->link, $applicant_name);
			        $father_name	  = mysqli_real_escape_string($db->link, $father_name);
			        $joining_date	  = mysqli_real_escape_string($db->link, $joining_date);
			        $acc_number	  = mysqli_real_escape_string($db->link, $acc_number);
			        $mobile_number	  = mysqli_real_escape_string($db->link, $mobile_number);
			        $address	  = mysqli_real_escape_string($db->link, $address);
			        $blood_group	  = mysqli_real_escape_string($db->link, $blood_group);
			        $NIDNumber 	  = mysqli_real_escape_string($db->link, $NIDNumber);
			        $Nominisname 	  = mysqli_real_escape_string($db->link, $Nominisname);
			        $relation 	  = mysqli_real_escape_string($db->link, $relation);
			        $nomini_address   = mysqli_real_escape_string($db->link, $nomini_address);
			        $username         = mysqli_real_escape_string($db->link, $username);
			        $userid 	  = mysqli_real_escape_string($db->link, $_POST['userid']);

			        $permited  = array('jpg', 'jpeg', 'png', 'gif', '');
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
			        } 
			        else{
			        $cquery = "SELECT * FROM tbl_sbfgeneralinvestorinfo WHERE acc_number = '$acc_number'";
			        $check =$db->select($cquery);
			        if ($check) {
			            echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
			                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			                            <span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
			                        </button>
			                        <strong>Warning! </strong>This Account Number Already Exist.!!
			                    </div>";
			        } elseif ($file_size >1048567) {
			         echo "<span class='error'>Image Size should be less then 1MB!</span>";
			        }
			         elseif (in_array($file_ext, $permited) === false) {
			         echo "<span class='error'>You can upload only :- "
			         .implode(', ', $permited)."</span>";
			        } 
			        else{
			        move_uploaded_file($file_temp, $uploaded_image);
			        $query = "INSERT INTO tbl_sbfgeneralinvestorinfo(applicant_name, father_name, joining_date, acc_number, mobile_number, address, blood_group, image, NIDNumber, Nominisname, relation, nomini_address, username) VALUES('$applicant_name', '$father_name', '$joining_date', '$acc_number', '$mobile_number', '$address', '$blood_group', '$uploaded_image', '$NIDNumber', '$Nominisname', '$relation', '$nomini_address', '$username')";
			            $datainsert = $db->insert($query);
			        if ($datainsert) {
			            echo "<div class='alert alert-success alert-dismissible' id='deletesuccess' role='alert'>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
									</button>
									<strong>Successfully! </strong> Data Inserted Successfully.
								</div>";
			            } else{
			                echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
									</button>
									<strong>Warning! </strong>Data Not Inserted.!!
								</div>";
			            	}
			         	}
			        }
			    }
			?>

<!-- Button trigger modal -->
                <div class="text-center">
					<button type="button" class="btn btn-primary btn-lg btn-round" data-toggle="modal" data-target="#myModal">
					  Add New General Investor
					</button>
				</div>
				<br/>
<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Add New General Investor</h4>
				      </div>
				      <div class="modal-body">
				        
				    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
				          <div class="form-group">
				            <label for="applicant_name" class="control-label">Applicant Name</label>
				            <input type="text" name="applicant_name" placeholder="Enter applicant name" class="form-control" id="applicant_name">
				          </div>

				          <div class="form-group">
				            <label for="father_name" class="control-label">Applicant Father Name</label>
				            <input type="text" name="father_name" placeholder="Enter applicant father name" class="form-control" id="father_name">
				          </div>

				          <div class="form-group">
				            <label for="form-field-date" class="control-label">Application Date</label>
				            <input type="text" name="joining_date" class="form-control date-picker" id="form-field-date" value="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy" readonly="">
				          </div>

				          <div class="form-group">
				            <label for="acc_number" class="control-label">Account Number</label>
				            <input type="number" name="acc_number" placeholder="Create account number" class="form-control" id="acc_number">
				          </div>

				          <div class="form-group">
				            <label for="mobile_number" class="control-label">Mobile Number</label>
				            <input type="text" name="mobile_number" placeholder="Enter mobile number" class="form-control" id="mobile_number">
				          </div>

				          <div class="form-group">
				            <label for="address" class="control-label">Address</label>
				            <input type="text" name="address" placeholder="Enter Address" class="form-control" id="address">
				          </div>

				          <div class="form-group">
				            <label for="form-field-1" class="control-label">Blood Group</label>
								<select class="form-control" id="form-field-1" name="blood_group">
									<option value="">Select blood group......</option>
									<?php
			                            $query = "select * from tbl_bloodgroup";
			                            $blood_group = $db->select($query);
			                            if ($blood_group) {
			                                while ($result = $blood_group->fetch_assoc()) { 
			                          ?>
									<option value="<?php echo $result['name'];?>"> <?php echo $result['name'];?> </option>
										<?php } } ?>						
								</select>
				          </div>

				          <div class="form-group">
				            <label for="NIDNumber" class="control-label">NID Number</label>
				            <input type="text" name="NIDNumber" placeholder="Enter NID Number" class="form-control" id="NIDNumber">
				          </div>

				          <div class="form-group">
				            <label for="image" class="control-label">Applicant image</label>
				            <input type="file" name="image"  class="form-control" id="image">
				          </div>

				          <div class="form-group">
				            <label for="Nominisname" class="control-label">Nomini Name</label>
				            <input type="text" name="Nominisname" placeholder="Enter nominis name" class="form-control" id="Nominisname">
				          </div>

				          <div class="form-group">
				            <label for="relation" class="control-label">With Nomini Relation</label>
				            <input type="text" name="relation" placeholder="Enter with nominis relation" class="form-control" id="relation">
				          </div>

				          <div class="form-group">
				            <label for="nomini_address" class="control-label">Nomini Address</label>
				            <input type="text" name="nomini_address" placeholder="Enter nomini address" class="form-control" id="nomini_address">
				          </div>

				          <div class="form-group hidden">
				            <label for="username" class="control-label">User Name</label>
				            <input type="text" value="<?php echo Session::get('username')?>" name="username" class="form-control" id="username" readonly>
				            <input type="hidden" name="userid" value="<?php echo Session::get('userId')?>" class="form-control" id="username" readonly>
				          </div>

					      <div class="modal-footer">
					        <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
					        <button type="submit" name="submit" class="btn btn-primary btn-round">Submit</button>
					      </div>
				    </form>
				      </div>
				    </div>
				  </div>
				</div>

		</div>
	</div>

<!--Form End-->

<div class="row">
<div class="col-xs-12">

<div class="row">
<div class="col-xs-12">
<div class="clearfix">
<div class="pull-right tableTools-container"></div>
</div>

<div class="table-header dropdown-header">
General Investor Details Information
</div>


<div class="//dropdown-content">
<table id="dynamic-table" class="table table-striped table-bordered table-hover">
	<thead>
		<tr>
			<th class="center">
				<label class="pos-rel">
					<input type="checkbox" class="ace" />
					<span class="lbl"></span>
				</label>
			</th>
			<th>Account No</th>
			<th>Applicant Name</th>
			<th class="hidden-xs">Joining Date</th>
			<th class="hidden-xs">Mobile Number</th>
			<th class="hidden-xs">Address</th>
			<th width="17%">User Status</th>
		</tr>
	</thead>

	<tbody>
<?php
	$query ="SELECT * FROM tbl_sbfgeneralinvestorinfo where status = '0' order by id desc limit 100";
	$installment = $db->select($query);
	if ($installment) {
		$i=0;
		while ($result = $installment->fetch_assoc()) {
			$i++;
		?>
		<tr>
			<td class="center">
				<label class="pos-rel">
					<input type="checkbox" class="ace" />
					<span class="lbl"></span>
				</label>
			</td>
			<td><?php echo $result['acc_number'];?></td>
			<td><?php echo $result['applicant_name'];?></td>
			<td class="hidden-xs"><?php echo $result['joining_date'];?></td>
			<td class="hidden-xs"><?php echo $result['mobile_number'];?></td>
			<td class="hidden-xs"><?php echo $fm->textShorten($result['address'], 20);?></td>
			<td>
				<div class="">
					<?php echo $result['username'];?>
					||
					<!-- Preview option -->
						<?php
							$selected="SELECT * FROM tbl_sbfgeneralinvestorinfo order by id";
							$Person = $db->select($selected);
							if ($Person) {
									$image			=$result['image'];
									$id 			=$result['id'];
								    $acc_number		=$result['acc_number'];
								    $applicant_name =$result['applicant_name'];
								    $father_name	=$result['father_name'];
								    $joining_date	=$result['joining_date'];
								    $currendate		=$result['currendate'];
								    $editDate		=$result['editDate'];
								    $mobile_number	=$result['mobile_number'];
								    $address 		=$result['address'];
								    $blood_group	=$result['blood_group'];
								    $NIDNumber		=$result['NIDNumber'];
								    $Nominisname	=$result['Nominisname'];
								    $relation 		=$result['relation'];
								    $nomini_address =$result['nomini_address'];
								    $username 		=$result['username'];
								?>

							<a href="#<?php echo $result['id']; ?>" data-toggle="modal" data-target="#<?php echo $result['id']; ?>">
							<span class="glyphicon glyphicon-zoom-in"></span></a>

						<!-- Modal content-->
						<div id="<?php echo $result['id']; ?>" class="modal fade" role="dialog">
						<div class="modal-dialog">
						<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Full Information of this Person</h4>
						</div>
						<div class="modal-body">
							<p><h5><b>Investor Picture : </b></h5></p>
							<img src="<?php echo $image; ?>" height="250px" width="100%"/>

							<p><h5><b>Account Number : </b></h5></p><input style="width: 100%;" type="text" class="form-control" readonly="" value="<?php echo $acc_number; ?>">

							<p><h5><b>Applicant Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $applicant_name; ?>">

							<p><h5><b>Father Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $father_name; ?>">

						    <p><h5><b>Joining Date : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $joining_date; ?>">

						    <p><h5><b>Entry Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $currendate; ?>">

						    <p><h5><b>Edit Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $editDate; ?>">

						    <p><h5><b>Mobile Number : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $mobile_number; ?>">

						    <p><h5><b>Address : </b></h5></p>
						    <textarea style="width: 100%" readonly=""><?php echo $address; ?></textarea>

						    <p><h5><b>Blood Group : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $blood_group; ?>">

						    <p><h5><b>NID Number : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $NIDNumber; ?>">

						    <p><h5><b>Nomini Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $Nominisname; ?>">

						    <p><h5><b>With Nomini Relation : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $relation; ?>">

						    <p><h5><b>Nomini Address : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $nomini_address; ?>">

						    <p><h5><b>Username : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $username; ?>">
						    
						</div>
						<div class="modal-footer">
						<button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
						</div>
						</div>
						</div>
						</div>

						<?php } ?>
						<!-- Preview option -->
					<?php if (Session::get('userId') == $result['id'] || Session::get('userRole') == '0') 
						{ ?>
					||
					<!-- Edit option -->
					<a href="editsgiinfo.php?editid=<?php echo $result['id'];?>">
						<span class="glyphicon glyphicon-edit"></span>
					</a>
						<!-- Edit option -->
					||
					<a onclick="return confirm('Are you sure to Delete!');" class="red" href="deletesbfGeneralinvestorinfo.php?delid=<?php echo $result['id'];?>">
						<i class="ace-icon fa fa-trash-o bigger-130"></i>
					</a>
					
				</div>
				<?php } ?>
			</td>
		</tr>													
		<?php } } ?>
	</tbody>
</table>
</div>
</div>
</div>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->


<?php include 'inc/footer.php' ?>