<?php include 'inc/header.php' ?>

 <?php
 /*
		if(isset($_POST['submit'])) {
			$id 	    = $_POST['id'];
			$status 	= $_POST['status'];

 		$status = $fm->validation($_POST['status']);
		$status = mysqli_real_escape_string($db->link, $status);

		$query ="UPDATE tbl_sbfprimaryshareinfo
					SET
					status 	= 'status'
					WHERE id = '$id'";

		$updated_row = $db->update($query);
		if ($updated_row) {
        	echo "<div class='alert alert-success alert-dismissible' id='deletesuccess' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
						</button>
						<strong>Successful ! </strong> Information Updated Successful.!!
					</div>";
	        } else{
	            echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
						</button>
						<strong>Warning! </strong>Information Not Updated.!!
					</div>";
	        }
	  }
	  */
?>

<div class="row">
<div class="col-xs-12">

<div class="row">
<div class="col-xs-12">
<div class="clearfix">
<div class="pull-right tableTools-container"></div>
</div>

<div class="table-header dropdown-header">
PTC Customar Status
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
			<th>Customer Name</th>
			<th class="hidden">Joining Date</th>
			<th class="hidden-xs">Mobile Number</th>
			<th class="hidden">Address</th>
			<th width="18%">User Status</th>
		</tr>
	</thead>

	<tbody>
<?php
	$query ="SELECT * FROM tbl_ptcpersonalinfo order by id desc";
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
			<td class="hidden"><?php echo $result['joining_date'];?></td>
			<td class="hidden-xs"><?php echo $result['mobile_number'];?></td>
			<td class="hidden"><?php echo $fm->textShorten($result['address'], 20);?></td>
				
			<td>
				<form action="<?php $_PHP_SELF ?>" method="POST">
					<select class="" id="select" name="status">
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
	                <input name="update" type="submit" id="update" value="Update">
	                <!--<a href="?edit=<?php echo $result['id'];?>">
         			<input type="submit" name="submit" class="btn btn-xs btn-round btn-danger" value="Update">
             		</a>-->
				</form>
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
<?php include 'inc/footer.php' ?>