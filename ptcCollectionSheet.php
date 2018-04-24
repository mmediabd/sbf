<?php include 'inc/header.php' ?>

<div id="user-profile-3" class="user-profile row">
<div class="row">
	<div class="col-xs-12">

	<!--Form Start-->

<div class="page-header">
		<h1 class="text-center">Perfect Trading Corporation (PTC)</h1> 
		<h4 class="text-center"><strong>Daily Collection Sheet</strong></h4>
	</div><!-- /.page-header -->
	<br/>

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-horizontal" role="form">
                

                <div class="form-group tabbable">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Account Number :</label>
					<div class="col-xs-8 col-sm-4 col-md-3 col-lg-4">
					<select class="col-xs-10 col-sm-9" required="" id="form-field-1" name="acc_number" >
							<option value="">All</option>
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

				<div class="form-group tabbable">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Collection Day :</label>
					<div class="col-xs-8 col-sm-4 col-md-3 col-lg-4">
					<select class="col-xs-10 col-sm-9" required="" id="form-field-1" name="name" >
							<option value="">All</option>
							<?php
	                            $query = "select * from collectionsystem";
	                            $Category = $db->select($query);
	                            if ($Category) {
	                                while ($result = $Category->fetch_assoc()) { 
	                            ?>
	                            <option value="<?php echo $result['name'];?>"><?php echo $result['name'];?></option>
                        	<?php } } ?>
						</select>
					</div>
				</div>

				<div class="form-group tabbable">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Selling Catagory Name :</label>
					<div class="col-xs-8 col-sm-4 col-md-3 col-lg-4">
					<select class="col-xs-10 col-sm-9" required="" id="form-field-1" name="name" >
							<option value="">All</option>
							<?php
	                            $query = "select * from catatgory";
	                            $Category = $db->select($query);
	                            if ($Category) {
	                                while ($result = $Category->fetch_assoc()) { 
	                            ?>
	                            <option value="<?php echo $result['name'];?>"><?php echo $result['name'];?></option>
                        	<?php } } ?>
						</select>
					</div>
				</div>

				<div class="form-group tabbable">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Group Name :</label>
					<div class="col-xs-8 col-sm-4 col-md-3 col-lg-4">
					<select class="col-xs-10 col-sm-9" required="" id="form-field-1" name="name" >
							<option value="">All</option>
							<?php
	                            $query = "select * from tbl_groupname";
	                            $Category = $db->select($query);
	                            if ($Category) {
	                                while ($result = $Category->fetch_assoc()) { 
	                            ?>
	                            <option value="<?php echo $result['name'];?>"><?php echo $result['name'];?></option>
                        	<?php } } ?>
						</select>
					</div>
				</div>


                <div class="form-group">
                    <label></label>
                    <div class="row col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-4 col-xs-offset-4">
                        <input type="submit" name="submit" class="btn btn-primary btn-lg btn-round" value="View">
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

<div class="table-header dropdown-header">
Show Accept Report
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
			<th>Joining Date</th>
			<th>Mobile Number</th>
			<th>NID Number</th>
			<th>Address</th>
		</tr>
	</thead>

	<tbody>
<?php
	$query ="SELECT * FROM tbl_sbfprimaryshareinfo order by id desc";
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
			<td><?php echo $result['applicant_name'];?></td>
			<td><?php echo $result['acc_number'];?></td>
			<td><?php echo $result['joining_date'];?></td>
			<td><?php echo "0".$result['mobile_number'];?></td>
			<td><?php echo $result['NIDNumber'];?></td>
			<td><?php echo $result['address'];?></td>
			
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