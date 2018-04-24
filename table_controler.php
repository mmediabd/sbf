<?php include 'inc/header.php' ?>

<div class="">
<div id="user-profile-3" class="user-profile row">
	<div class="col-sm-offset-1 col-sm-10">

		<div class="space"></div>

		<?php
			    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			        $name   	= $fm->validation($_POST['name']);
			        $username   = $fm->validation($_POST['username']);
			        $password   = $fm->validation($_POST['password']);
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
			        	/*
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
					*/
			        $query = "INSERT INTO tbl_controler(name, username, password, email, role) VALUES('$name', '$username', '$password', '$email', '$role')";
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
			    //}
			?>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-horizontal">
			<div class="tabbable">
				<div class="tab-content profile-edit-tab-content">
					<div id="edit-basic" class="tab-pane in active">
						<h4 class="header blue bolder smaller">All Table Controle Panel</h4>
						<div class="row">
							<div class="vspace-12-sm"></div>

							<div class="col-xs-12 col-sm-8">
								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">SBF Share Holder :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="" value="" name="name"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">SBF Share Input/Output :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="" value="" name="name"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">SBF DPS Holder  :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="" value="" name="email"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">SBF DPS Input/Output   :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="" value="" name="email"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">PTC Customer :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="" value="" name="username" />
									</div>
								</div>
								
								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">PTC FDR & Installment :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="password" id="form-field-username" placeholder="" value="" name="password"/>
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



</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->
<?php include 'inc/footer.php' ?>