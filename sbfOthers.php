<?php include 'inc/header.php' ?>

<div id="user-profile-3" class="user-profile row">
	<div class="row">
		<div class="col-xs-12">

<!--Form Start-->

<div class="page-header">
		<h1 class="text-center">Shadhin Bahumukhi Firm (SBF)</h1> 
		<h4 class="text-center"><u>SBF Other's Cost Input</u></h4>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<?php
			    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			        $amount 		= $fm->validation($_POST['amount']);
			        $entry_date 	= $fm->validation($_POST['entry_date']);
			        $vauchar    	= $fm->validation($_POST['vauchar']);
			        $purpose 		= $fm->validation($_POST['purpose']);
			        $client 		= $fm->validation($_POST['client']);
			        $remark 		= $fm->validation($_POST['remark']);
			        $username 		= $fm->validation($_POST['username']);

			        
			        $amount			= mysqli_real_escape_string($db->link, $amount);
			        $entry_date 	= mysqli_real_escape_string($db->link, $entry_date);
			        $vauchar 		= mysqli_real_escape_string($db->link, $vauchar);
			        $purpose 		= mysqli_real_escape_string($db->link, $purpose);
			        $client 		= mysqli_real_escape_string($db->link, $client);
			        $remark 		= mysqli_real_escape_string($db->link, $remark);
			        $username 	    = mysqli_real_escape_string($db->link, $username);
			        $userid 		= mysqli_real_escape_string($db->link, $_POST['userid']);

			         if ($amount == "" || $entry_date == "" || $vauchar == "" || $purpose == "" ||  $client == "") {
			                echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
									</button>
									<strong>Warning! </strong>Field Must Not Be Empty.!!
								</div>";
			         } else {
			         	$cquery = "SELECT * FROM tbl_sbfotherscost WHERE vauchar = '$vauchar'";
				        $check =$db->select($cquery);
				        if ($check) {
				            echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
				                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
				                            <span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
				                        </button>
				                        <strong>Warning! </strong>This Vauchar Number Already Exist.!!
				                    </div>";
				        } else{
			            $query = "INSERT INTO tbl_sbfotherscost(amount, entry_date, vauchar, purpose, client, remark, username) VALUES('$amount', '$entry_date', '$vauchar', '$purpose', '$client', '$remark', '$username')";
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
			    }
			?>

<!--form Start-->	

<form class="form-horizontal text-center" role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
		<div class="form-group">
			<label class="col-xs-4 col-sm-5 control-label">Cost Amount :</label>

			<div class="col-xs-8 col-sm-7">
				<input type="text" placeholder="Enter Cost Amount...." class="col-xs-10 col-sm-5" name="amount"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-4 col-sm-5 control-label " for="form-field-date"> Input Date :</label>

			<div class="col-xs-8 col-sm-7">
				<input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy"  name="entry_date" readonly/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-4 col-sm-5 control-label"> Vauchar Number :</label>

			<div class="col-xs-8 col-sm-7">
				<input type="Number" placeholder="Enter Vauchar Number" class="col-xs-10 col-sm-5" name="vauchar"/>
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-4 col-sm-5 control-label""> Purpose Of Cost :</label>

			<div class="col-xs-8 col-sm-7">
				<input type="text" placeholder="Enter Purpose Of Cost" class="col-xs-10 col-sm-5"  name="purpose" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-4 col-sm-5 control-label"> Client Name :</label>

			<div class="col-xs-8 col-sm-7">
				<input type="text" placeholder="Enter Client Name" class="col-xs-10 col-sm-5" name="client" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-4 col-sm-5 control-label"> Remark's :</label>

			<div class="col-xs-8 col-sm-7">
				<input type="text" placeholder="Enter Remark's" class="col-xs-10 col-sm-5" name="remark" />
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
		<th class="hidden-xs">Ref.</th>
		<th>Cost Amount</th>
		<th>Input Date</th>
		<th class="hidden-xs">Vauchar </th>
		<th class="hidden-xs">Purpose</th>
		<th width="15%">User Status</th>
	</tr>
</thead>

<tbody>
<?php
$query ="SELECT * FROM tbl_sbfotherscost order by id desc limit 100";
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
		<td class="hidden-xs"><?php echo $result['id'];?></td>
		<td><?php echo "Tk. ".$result['amount'];?></td>
		<td><?php echo $result['entry_date'];?></td>
		<td class="hidden-xs"><?php echo $result['vauchar'];?></td>
		<td class="hidden-xs"><?php echo $result['purpose'];?></td>

		<td>
			<div class="">
				<?php echo $result['username'];?>
				||
				<!-- Preview option -->
				<?php
					$selected="SELECT * FROM tbl_sbfotherscost order by id";
					$Person = $db->select($selected);
					if ($Person) {
						$id 			=$result['id'];
					    $amount 		=$result['amount'];
					    $entry_date		=$result['entry_date'];
					    $currendate		=$result['currendate'];
					    $editDate		=$result['editDate'];
					    $vauchar 		=$result['vauchar'];
					    $purpose		=$result['purpose'];
					    $client			=$result['client'];
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

						<p><h5><b>Cost Amount : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $amount; ?>">

						<p><h5><b>Issue Date : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $entry_date; ?>">

					    <p><h5><b>Entry Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $currendate; ?>">

					    <p><h5><b>Edit Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $editDate; ?>">
					    
					    <p><h5><b>Voucher No : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $vauchar; ?>">

					    <p><h5><b>Purpose of Cost : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $purpose; ?>">

					    <p><h5><b>Claint Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $client; ?>">

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
				<a href="editsbfothers.php?editId=<?php echo $result['id'];?>">
					<span class="glyphicon glyphicon-edit"></span>
				</a>
				<!-- Edit option -->
				||
				<a onclick="return confirm('Are you sure to Delete!');" class="red" href="deletesbfOthers.php?delid=<?php echo $result['id'];?>">
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