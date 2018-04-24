<?php include 'inc/header.php' ?>

<div id="user-profile-3" class="user-profile row"  style="max-height: 500px">
<div class="row">
	<div class="col-xs-12">

	<!--Form Start-->

<div class="page-header">
		<h1 class="text-center">Perfect Trading Corporation (PTC)</h1> 
		<h4 class="text-center"><strong>Personal Report</strong></h4>
	</div><!-- /.page-header -->

	<div class="">
		<div class="col-xs-12">
<!-- PAGE CONTENT BEGINS -->
			<div class="container">
		      <div class="row">
		        <div class="col-md-3">
		          
		        </div>
		        <div class="col-md-6 well center">
		        	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="" role="form">
					  <div class="form-group">
					    <div class="input-group">
					      <div class="input-group-addon hidden-480">Account Number :</div>
					      	<div class=" col-sm-8 col-md-8 col-lg-12">
					      	<select name="acc_number" onchange="showUser(this.value)" class="chosen-select  col-sm-12 col-md-8 col-lg-12" data-placeholder="Select Account Number..." id="form-field-1">
							<option value="">Search by account number</option>


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
					  </div>
					</form>
		        </div>
		      </div>
		    </div>

		    
		    <div class="panel panel-primary">
			  <div class="panel-heading">PTC Customer Details :- </div>
			  <div class="panel-body" style="height: 200px;">
				  <div id="txtHint">
				    <h1 class="center">PTC Customer information will be displayed here...</h1>
				  </div>
			  </div>
			</div>

<?php include 'inc/footer.php' ?>