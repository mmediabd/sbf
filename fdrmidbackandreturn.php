<?php include 'inc/header.php' ?>


<div id="user-profile-3" class="user-profile row">
<div class="row">
	<div class="col-xs-12">

	<!--Form Start-->

<div class="page-header">
		<h1 class="text-center">Perfect Trading Corporation (PTC)</h1> 
		<h4 class="text-center"><u>FDR Midback &amp; Return Table</u></h4>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<?php
			    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			        $acc_number 	= $fm->validation($_POST['acc_number']);
			        $name 			= $fm->validation($_POST['name']);
			        $inputdate    	= $fm->validation($_POST['inputdate']);
			        $midback 		= $fm->validation($_POST['midback']);
			        $fdr_return 	= $fm->validation($_POST['fdr_return']);
			        $vauchar    	= $fm->validation($_POST['vauchar']);
			        $remark 		= $fm->validation($_POST['remark']);
			        $username 		= $fm->validation($_POST['username']);

			        

			        $acc_number		= mysqli_real_escape_string($db->link, $acc_number);
			        $name 			= mysqli_real_escape_string($db->link, $name);
			        $inputdate 		= mysqli_real_escape_string($db->link, $inputdate);
			        $midback 		= mysqli_real_escape_string($db->link, $midback);
			        $fdr_return 	= mysqli_real_escape_string($db->link, $fdr_return);
			        $vauchar    	= mysqli_real_escape_string($db->link, $vauchar);
			        $remark 		= mysqli_real_escape_string($db->link, $remark);
			        $username 		= mysqli_real_escape_string($db->link, $username);
			        $userid 		= mysqli_real_escape_string($db->link, $_POST['userid']);

			         if ($acc_number == "" || $name == "" || $inputdate == "" || $midback == "" || $fdr_return == "" || $vauchar == "") {
			                echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
									</button>
									<strong>Warning! </strong>Field must not be empty.!!</div>";
			         } else {
			            $query = "INSERT INTO tbl_fdrmidbackreturn(acc_number, name, inputdate, midback, fdr_return, vauchar, remark, username) VALUES('$acc_number', '$name', '$inputdate', '$midback', '$fdr_return', '$vauchar', '$remark', '$username')";
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


		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-horizontal text-center" role="form">
		   <div class="form-group tabbable">
			<label class="col-xs-4 col-sm-5 control-label " for="form-field-1">Account Number :</label>

			<div class="col-xs-7 col-sm-3 col-md-3 col-lg-3">
					<select class="chosen-select col-xs-10 col-sm-9" id="form-field-1" name="acc_number" data-placeholder="Select Account Number...">
						<option value="">  </option>

							<?php
	                            $query = "select * from tbl_ptcpersonalinfo";
	                            $Category = $db->select($query);
	                            if ($Category) {
	                                while ($result = $Category->fetch_assoc()) { 
	                            ?>
	                            <option value="<?php echo $result['acc_number'];?>"><?php echo $result['acc_number'];?></option>
                        	<?php } } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label"> Customar Name :</label>
						<div class="col-xs-7 col-sm-3 col-md-3 col-lg-3">
							<select class="chosen-select col-xs-10 col-sm-9" id="form-field-1" name="name" data-placeholder="Select Customar Name......">
								<option value="">  </option>
							<?php
	                            $query = "select * from tbl_ptcpersonalinfo";
	                            $Category = $db->select($query);
	                            if ($Category) {
	                                while ($result = $Category->fetch_assoc()) { 
	                            ?>
	                            <option value="<?php echo $result['applicant_name'];?>"><?php echo $result['applicant_name'];?></option>
                        	<?php } } ?>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-date"> Input Date :</label>
					<div class="col-xs-8 col-sm-7">
						<input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy"  name="inputdate" readonly="" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label"> Midback :</label>

					<div class="col-xs-8 col-sm-7">
						<input type="text" placeholder="Enter Midback Amount......" class="col-xs-10 col-sm-5" name="midback"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label""> Return :</label>

					<div class="col-xs-8 col-sm-7">
						<input type="text" placeholder="Enter Return Amount......" class="col-xs-10 col-sm-5" name="fdr_return" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label""> Vauchar No :</label>

					<div class="col-xs-8 col-sm-7">
						<input type="text" placeholder="Enter Return Amount......" class="col-xs-10 col-sm-5" name="vauchar" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label"> Remark's :</label>

					<div class="col-xs-8 col-sm-7">
						<input type="text" placeholder="Enter Remark's......." class="col-xs-10 col-sm-5" name="remark" />
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
							<th>Ref.</th>
							<th>Account No</th>
							<th>Customar Name</th>
							<th>Issue Date</th>
							<th>Midback</th>
							<th>Return</th>
							<th width="16%">User Status</th>
						</tr>
					</thead>

					<tbody>
				<?php
					$query ="SELECT * FROM tbl_fdrmidbackreturn order by id desc";
					$installment = $db->select($query);
					if ($installment) {
						$i=0;
						while ($result = $installment->fetch_assoc()) {
							$i++;
						?>
						<tr>
							<td><?php echo $result['id'];?></td>
							<td><?php echo $result['acc_number'];?></td>
							<td><?php echo $result['name'];?></td>
							<td><?php echo $result['inputdate'];?></td>
							<td><?php echo "Tk. ".$result['midback'];?></td>
							<td><?php echo "Tk. ".$result['fdr_return'];?></td>

							<td>
								<div class="">
									<?php echo $result['username'];?>
									||
									<!-- Preview option -->
									<?php
										$selected="SELECT * FROM tbl_fdrmidbackreturn order by id";
										$Person = $db->select($selected);
										if ($Person) {
											$id 			=$result['id'];
										    $acc_number 	=$result['acc_number'];
										    $name 			=$result['name'];
										    $inputdate		=$result['inputdate'];
										    $currentdate	=$result['currentdate'];
										    $editDate		=$result['editDate'];
										    $midback		=$result['midback'];
										    $fdr_return 	=$result['fdr_return'];
										    $vauchar    	=$result['vauchar'];
										    $remark			=$result['remark'];
										    $username		=$result['username'];
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

									<p><h5><b>Account Number : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $acc_number; ?>">

									<p><h5><b>Customer Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $name; ?>">

									<p><h5><b>Issue Date : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $inputdate; ?>">

								    <p><h5><b>Entry Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $currentdate; ?>">

								    <p><h5><b>Edit Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $editDate; ?>">

								    <p><h5><b>Midback : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $midback; ?>">
								    
								    <p><h5><b>FDR Return : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $fdr_return; ?>">

								    <p><h5><b>Vauchar No : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $vauchar; ?>">

								    <p><h5><b>Remark's : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $remark; ?>">

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
									<a href="editfdrmidbackandreturn.php?editId=<?php echo $result['id'];?>">
										<span class="glyphicon glyphicon-edit"></span>
									</a>
									<!-- Edit option -->
									||
									<a onclick="return confirm('Are you sure to Delete!');" class="red" href="deletefdrmidbacreturn.php?delid=<?php echo $result['id'];?>">
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