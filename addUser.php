<?php include 'inc/header.php' ?>

<div class="">
<div id="user-profile-3" class="user-profile row">
	<div class="col-sm-offset-1 col-sm-10">

		<div class="space"></div>

		<?php
			    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			        $name   	= $fm->validation($_POST['name']);
			        $username   = $fm->validation($_POST['username']);
			        $password   = $fm->validation(md5($_POST['password']));
			        $email      = $fm->validation($_POST['email']);
			        $role   	= $fm->validation($_POST['role']);

			        $name	    = mysqli_real_escape_string($db->link, $name);
			        $username   = mysqli_real_escape_string($db->link, $username);
			        $password	= mysqli_real_escape_string($db->link, $password);
			        $email	    = mysqli_real_escape_string($db->link, $email);
			        $role 	    = mysqli_real_escape_string($db->link, $role);

			        if($name == "" || $username == "" || $password == "" || $email == ""){
			        echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
			        			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
								</button>
			                	<strong>Warning!</strong> Field must not be empty.!!
			               </div>";
			        } else {
		        	$cquery = "SELECT * FROM tbl_user WHERE username = '$username' OR email = '$email'";
			        $check =$db->select($cquery);
			        if ($check) {
			            echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
			                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			                            <span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
			                        </button>
			                        <strong>Warning! </strong>This Username or Email Address Already Exist.!!
			                    </div>";
			        } else{
			        $query = "INSERT INTO tbl_user(name, username, password, email, role) VALUES('$name', '$username', '$password', '$email', '$role')";
			            $datainsert = $db->insert($query);
			        if ($datainsert) {
			            echo "<div class='alert alert-success alert-dismissible' id='deletesuccess' role='alert'>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
									</button>
									<strong>Successfully! </strong> Data Inserted Successful.
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

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-horizontal">
			<div class="tabbable">
				<div class="tab-content profile-edit-tab-content">
					<div id="edit-basic" class="tab-pane in active">
						<h4 class="header blue bolder smaller">Add User</h4>
						<div class="row">
							<div class="vspace-12-sm"></div>

							<div class="col-xs-12 col-sm-8">
								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Name :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Enter Full Name" value="" name="name"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Email :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Enter Email" value="" name="email"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Username :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Enter Username" value="" name="username" />
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Password :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="password" id="form-field-username" placeholder="Enter Password" value="" name="password"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">User Role :</label>

									<div class="col-sm-8">
										
					                    <select class="col-xs-10 col-sm-10" id="form-field-1" name="role">
											<option value="">Select User Category......</option>
											<?php
					                            $query = "select * from tbl_usercatagory";
					                            $userCat = $db->select($query);
					                            if ($userCat) {
					                                while ($result = $userCat->fetch_assoc()) { 
					                          ?>
											<option value="<?php echo $result['role']; ?>"> <?php echo $result['name']; ?> </option>
												<?php } } ?>				
										</select>
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
						Save
					</button>

					&nbsp; &nbsp;
					<button class="btn btn-round" type="reset" name="reset">
						<i class="ace-icon fa fa-undo bigger-110"></i>
						Reset
					</button>
				</div>
			</div>
		</form>

			<div class="hr hr-8"></div>

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
		<div class="table-header">
			Show All Input Data
		</div>

		<!-- div.table-responsive -->

		<!-- div.dataTables_borderWrap -->
		<div>
			<table id="dynamic-table" class="table table-striped table-bordered table-hover">
				<thead>
					<tr>
						<th class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</th>
						<th class="hidden-xs">SL No.</th>
						<th>Name</th>
						<th>Username</th>
						<th class="hidden-xs">Email</th>
						<th class="hidden-xs">User Role</th>
						<th width="10%">Action</th>
					</tr>
				</thead>

				<tbody>
			<?php
				$query ="SELECT * FROM tbl_user order by id desc";
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
						<td class="hidden-xs"><?php echo $i; ?></td>
						<td><?php echo $result['name'];?></td>
						<td><?php echo $result['username'];?></td>
						<td class="hidden-xs"><?php echo $result['email'];?></td>
						<?php 
						if ($result['role'] == '0') { ?>
							<td class="hidden-xs">Admin</td>
							<?php } elseif($result['role'] == '1'){ ?>
								<td class="hidden-xs">SBF_User</td>
							<?php } elseif($result['role'] == '2'){ ?>
								<td class="hidden-xs">PTC_User</td>
							<?php } elseif($result['role'] == '3'){ ?>
								<td class="hidden-xs">Others</td>
							<?php }else{ ?>
								<td class="hidden-xs">None</td>
						<?php } ?>
						<td>
							<div class="">
								<!-- Preview option -->
								<?php
									$selected="SELECT * FROM tbl_user order by id";
									$Person = $db->select($selected);
									if ($Person) {
										$id				=$i;
										$name			=$result['name'];
									    $username 		=$result['username'];
									    $password		=$result['password'];
									    $email			=$result['email'];
									    $role			=$result['role'];
									    $currendate		=$result['currendate'];
									    $editDate		=$result['editDate'];
									?>

								<a href="#<?php echo $result['id']; ?>" data-toggle="modal" data-target="#<?php echo $result['id']; ?>">
									<span class="glyphicon glyphicon-zoom-in"></span></a>

								<!-- Modal content-->
								<div id="<?php echo $result['id']; ?>" class="modal fade" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">View Details</h4>
								</div>
								<div class="modal-body">

									<p><h5><b>SL No. : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $id; ?>">

									<p><h5><b>Name. : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $name; ?>">
									
									<p><h5><b>Email : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $email; ?>">

								    <p><h5><b>Username : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $username; ?>">

								    <p><h5><b>Password : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $password; ?>">

								    <p><h5><b>Role : </b></h5></p>
								    	<?php 
										if ($result['role'] == '0') { ?>
												<input style="width: 100%" type="" class="form-control" readonly="" value="Admin">
											<?php } elseif($result['role'] == '1'){ ?>
												<input style="width: 100%" type="" class="form-control" readonly="" value="SBF_User">
											<?php } elseif($result['role'] == '2'){ ?>
												<input style="width: 100%" type="" class="form-control" readonly="" value="PTC_User">
											<?php } elseif($result['role'] == '3'){ ?>
												<input style="width: 100%" type="" class="form-control" readonly="" value="Others">
											<?php }else{ ?>
												<input style="width: 100%" type="" class="form-control" readonly="" value="None">
										<?php } ?>

								    <p><h5><b>Entry Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $currendate; ?>">

								    <p><h5><b>Edit Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $editDate; ?>">

								</div>
								<div class="modal-footer">
								<button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
								</div>
								</div>
								</div>
								</div>

								<?php } ?>
								<!-- Preview option -->
								||
								<!-- Edit option -->
								<a href="edituser.php?editId=<?php echo $result['id'];?>">
									<span class="glyphicon glyphicon-edit"></span>
								</a>
								<!-- Edit option -->
								||
								<a onclick="return confirm('Are you sure to Delete!');" class="red" href="deleteUser.php?delid=<?php echo $result['id'];?>">
									<i class="ace-icon fa fa-trash-o bigger-130"></i>
								</a>
							</div>
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