<?php include 'inc/header.php' ?>


<div id="user-profile-3" class="user-profile row">
<div class="row">
	<div class="col-xs-12">

	<!--Form Start-->

<div class="page-header">
		<h1 class="text-center">Perfect Trading Corporation (PTC)</h1> 
		<h4 class="text-center">Add User Catagory</h4>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<?php
			    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			        $name 			= $fm->validation($_POST['name']);
			        $role 			= $fm->validation($_POST['role']);
			        $username 		= $fm->validation($_POST['username']);
			        
			        $name 			= mysqli_real_escape_string($db->link, $name);
			        $role 			= mysqli_real_escape_string($db->link, $role);
			        $username 		= mysqli_real_escape_string($db->link, $username);
			        $userid 		= mysqli_real_escape_string($db->link, $_POST['userid']);

			         if ($name == "" || $role == "" || $username == "") {
			                echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
									</button>
									<strong>Warning! </strong>Field must not be empty.!!</div>";
			         } else {
			            $query = "INSERT INTO tbl_usercatagory(name, role, username) VALUES('$name', '$role', '$username')";
			            $datainsert = $db->insert($query);
			            if ($datainsert) {
			                echo "<div class='alert alert-success alert-dismissible' id='deletesuccess' role='alert'>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
									</button>
									<strong>Successfully! </strong>Data Inserted Successfully.
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
			?>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"  class="form-horizontal text-center" role="form">
                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label"> User Catagory :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" placeholder="Enter Customer Name....." class="col-xs-10 col-sm-5" name="name" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label"> User Role :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" placeholder="Enter User Role....." class="col-xs-10 col-sm-5" name="role" />
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
                        <input type="submit" name="submit" class="btn btn-lg btn-success btn-round" value="Submit">
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
						<th width="10%" class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</th>
						<th hidden=""></th>
						<th>Catagory Name</th>
						<th>User Role</th>
						<th hidden=""></th>
						<th hidden=""></th>
						<th width="15%">User Status</th>
					</tr>
				</thead>

				<tbody>
			<?php
				$query ="SELECT * FROM tbl_usercatagory order by id desc";
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
						<td hidden=""></td>
						<td><?php echo $result['name'];?></td>
						<td><?php echo $result['role'];?></td>
						<td hidden=""></td>
						<td hidden=""></td>
						<td>
							<div class="">
								<?php echo $result['username'];?>

								<?php if (Session::get('userId') == $result['id'] || Session::get('userRole') == '0') 
									{ ?>
								||
								<!-- Edit option -->
								<a href="editusercatagory.php?editId=<?php echo $result['id'];?>">
									<span class="glyphicon glyphicon-edit"></span>
								</a>
								<!-- Edit option -->
								||
								<a onclick="return confirm('Are you sure to Delete!');" class="red" href="deleteuserCatagory.php?delid=<?php echo $result['id'];?>">
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