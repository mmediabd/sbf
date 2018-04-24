<?php include 'inc/header.php' ?>


<div id="user-profile-3" class="user-profile row">
<div class="row">
	<div class="col-xs-12">

	<!--Form Start-->

<div class="page-header">
		<h1 class="text-center">Shadhin Bahumukhi Firm (SBF)</h1> 
		<h4 class="text-center"><u>Bank or Personal Loan &amp; Return</u></h4>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<?php
			    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			        $name 			= $fm->validation($_POST['name']);
			        $inputdate    	= $fm->validation($_POST['inputdate']);
			        $loaninput 		= $fm->validation($_POST['loaninput']);
			        $receiptNo 		= $fm->validation($_POST['receiptNo']);
			        $loanoutput 	= $fm->validation($_POST['loanoutput']);
			        $vouchar 		= $fm->validation($_POST['vouchar']);
			        $remark 		= $fm->validation($_POST['remark']);
			        $username 		= $fm->validation($_POST['username']);
			        
			        $name 			= mysqli_real_escape_string($db->link, $name);
			        $inputdate 		= mysqli_real_escape_string($db->link, $inputdate);
			        $loaninput 		= mysqli_real_escape_string($db->link, $loaninput);
			        $receiptNo 		= mysqli_real_escape_string($db->link, $receiptNo);
			        $loanoutput 	= mysqli_real_escape_string($db->link, $loanoutput);
			        $vouchar 		= mysqli_real_escape_string($db->link, $vouchar);
			        $remark 		= mysqli_real_escape_string($db->link, $remark);
			        $username 		= mysqli_real_escape_string($db->link, $username);
			        $userid 		= mysqli_real_escape_string($db->link, $_POST['userid']);

			         if ($name == "" || $inputdate == "" || $loaninput == "" || $receiptNo == "" || $loanoutput == "" || $vouchar == "") {
			                echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
									</button>
									<strong>Warning! </strong>Field must not be empty.!!</div>";
			         } else {
			         	/*
			         	$cquery = "SELECT * FROM tbl_sbfLoan WHERE vouchar = '$vouchar'";
				        $check =$db->select($cquery);
				        if ($check) {
				            echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
				                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				                            <span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
				                        </button>
				                        <strong>Warning! </strong>This Vauchar Number Already Exist.!!
				                    </div>";
				        } else{
				        	*/
			            $query = "INSERT INTO tbl_sbfloan(name, inputdate, loaninput, receiptNo, loanoutput, vouchar, remark, username) VALUES('$name', '$inputdate', '$loaninput', '$receiptNo', '$loanoutput', '$vouchar', '$remark', '$username')";
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
			    //}
			?>


		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-horizontal text-center" role="form">
				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label"> Client Name :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" placeholder="Enter Client Name......" class="col-xs-10 col-sm-5" name="name"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-date"> Input Date :</label>
					<div class="col-xs-8 col-sm-7">
						<input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy"  name="inputdate" readonly="" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label"> Loan Input :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" placeholder="Enter Loan Input Amount......" class="col-xs-10 col-sm-5" name="loaninput"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label"> Receipt No :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" placeholder="Enter Loan Receipt No......" class="col-xs-10 col-sm-5" name="receiptNo" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label"> Loan Output :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" placeholder="Enter Loan Output Amount......" class="col-xs-10 col-sm-5" name="loanoutput" />
					</div>
				</div>

				

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label"> Vouchar No.:</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" placeholder="Enter Vouchar No......" class="col-xs-10 col-sm-5" name="vouchar"/>
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
				<th class="center">
					<label class="pos-rel">
						<input type="checkbox" class="ace" />
						<span class="lbl"></span>
					</label>
				</th>
				<th>Client Name</th>
				<th>Input</th>
				<th class="hidden-xs">Receipt No</th>
				<th class="hidden-xs">Out Put</th>
				<th class="hidden-xs">Vouchar No.</th>
				<th width="15%">User Status</th>
			</tr>
		</thead>

		<tbody>
	<?php
		$query ="SELECT * FROM tbl_sbfloan order by id desc limit 100";
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
				<td><?php echo $result['name'];?></td>
				<td><?php echo "Tk. ".$result['loaninput'];?></td>
				<td class="hidden-xs"><?php echo $result['receiptNo'];?></td>
				<td class="hidden-xs"><?php echo "Tk. ".$result['loanoutput'];?></td>
				<td class="hidden-xs"><?php echo $result['vouchar'];?></td>
				<td>
					<div class="">
						<?php echo $result['username'];?>
						||
						<!-- Preview option -->
						<?php
							$selected="SELECT * FROM tbl_sbfloan order by id";
							$Person = $db->select($selected);
							if ($Person) {
									$id 			=$result['id'];
								    $name 			=$result['name'];
								    $inputdate		=$result['inputdate'];
								    $currendate		=$result['currendate'];
								    $editDate		=$result['editDate'];
								    $loaninput		=$result['loaninput'];
								    $receiptNo		=$result['receiptNo'];
								    $loanoutput		=$result['loanoutput'];
								    $vouchar 		=$result['vouchar'];
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

							<p><h5><b>Client Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $name; ?>">

							<p><h5><b>Issue Date : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $inputdate; ?>">

						    <p><h5><b>Entry Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $currendate; ?>">

						    <p><h5><b>Edit Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $editDate; ?>">

						    <p><h5><b>Input Loan Amount : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $loaninput; ?>">

						    <p><h5><b>Receipt No : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $receiptNo; ?>">

						    <p><h5><b>Output Loan Amount : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $loanoutput; ?>">
						    
						    <p><h5><b>Voucher No : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $vouchar; ?>">

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
						<a href="editbankorpersonalloan.php?editId=<?php echo $result['id'];?>">
							<span class="glyphicon glyphicon-edit"></span>
						</a>
						<!-- Edit option -->
						||
						<a onclick="return confirm('Are you sure to Delete!');" class="red" href="deletebankOrPersonalLoan.php?delid=<?php echo $result['id'];?>">
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