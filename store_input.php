<?php include 'inc/header.php' ?>

<div class="">
<div id="user-profile-3" class="user-profile row">
	<div class="col-sm-offset-1 col-sm-10">

	<div class="page-header">
		<h1 class="text-center blue bolder smaller">Perfect Trading Corporation (PTC)</h1>
	</div><!-- /.page-header -->

		<div class="space"></div>

		<?php
			    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			        $prodcutName   	= $fm->validation($_POST['prodcutName']);
			        $brandName   	= $fm->validation($_POST['brandName']);
			        $companyName   	= $fm->validation($_POST['companyName']);
			        $agentName      = $fm->validation($_POST['agentName']);
			        $inputDate      = $fm->validation($_POST['inputDate']);
			        $chalanNo   	= $fm->validation($_POST['chalanNo']);
			        $quantity   	= $fm->validation($_POST['quantity']);
			        $price   		= $fm->validation($_POST['price']);
			        $totalPrice   	= $fm->validation($_POST['totalPrice']);
			        $remarks      	= $fm->validation($_POST['remarks']);
			        $username 		= $fm->validation($_POST['username']);

			        $prodcutName	= mysqli_real_escape_string($db->link, $prodcutName);
			        $brandName   	= mysqli_real_escape_string($db->link, $brandName);
			        $companyName	= mysqli_real_escape_string($db->link, $companyName);
			        $agentName	    = mysqli_real_escape_string($db->link, $agentName);
			        $inputDate	    = mysqli_real_escape_string($db->link, $inputDate);
			        $chalanNo	    = mysqli_real_escape_string($db->link, $chalanNo);
			        $quantity   	= mysqli_real_escape_string($db->link, $quantity);
			        $price			= mysqli_real_escape_string($db->link, $price);
			        $totalPrice	    = mysqli_real_escape_string($db->link, $totalPrice);
			        $remarks 	    = mysqli_real_escape_string($db->link, $remarks);
			        $username 		= mysqli_real_escape_string($db->link, $username);
			        $userid 		= mysqli_real_escape_string($db->link, $_POST['userid']);

			        if($prodcutName == "" || $brandName == "" || $companyName == "" || $agentName == "" || $chalanNo == "" || $quantity == "" || $price == "" || $totalPrice == ""){
			        echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
			        			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
									<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
								</button>
			                	<strong>Warning!</strong> Field must not be empty.!!
			               </div>";
			        } else{
			        $query = "INSERT INTO tbl_storeinput(prodcutName, brandName, companyName, agentName, inputDate, chalanNo, quantity, price, totalPrice, remarks, username) VALUES('$prodcutName', '$brandName', '$companyName', '$agentName', '$inputDate', '$chalanNo', '$quantity', '$price', '$totalPrice', '$remarks', '$username')";
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
			?>

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-horizontal">
			<div class="tabbable">
				<div class="tab-content profile-edit-tab-content">
					<div id="edit-basic" class="tab-pane in active">
						<h4 class="header blue bolder smaller">Store Input Data</h4>
						<div class="row">
							<div class="vspace-12-sm"></div>

							<div class="col-xs-12 col-sm-8">
								
								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Product Name :</label>

									<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
										<select class="chosen-select col-xs-10 col-sm-9" id="form-field-1" name="prodcutName" data-placeholder="Select Product Name......">
											<option value="">  </option>

											<?php
					                            $query = "select * from tbl_productdetails";
					                            $userCat = $db->select($query);
					                            if ($userCat) {
					                                while ($result = $userCat->fetch_assoc()) { 
					                          ?>
											<option value="<?php echo $result['name']; ?>"> <?php echo $result['name']; ?> </option>
												<?php } } ?>				
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Brand Name :</label>

									<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
										<select class="chosen-select col-xs-10 col-sm-9" id="form-field-1" name="brandName" data-placeholder="Select Brand Name......">
											<option value="">  </option>

											<?php
					                            $query = "select * from tbl_productdetails";
					                            $userCat = $db->select($query);
					                            if ($userCat) {
					                                while ($result = $userCat->fetch_assoc()) { 
					                          ?>
											<option value="<?php echo $result['brandName']; ?>"> <?php echo $result['brandName']; ?> </option>
												<?php } } ?>				
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Company Name :</label>

									<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
										<select class="chosen-select col-xs-10 col-sm-9" id="form-field-1" name="companyName" data-placeholder="Select Company Name......">
											<option value="">  </option>

											<?php
					                            $query = "select * from tbl_productdetails";
					                            $userCat = $db->select($query);
					                            if ($userCat) {
					                                while ($result = $userCat->fetch_assoc()) { 
					                          ?>
											<option value="<?php echo $result['compani']; ?>"> <?php echo $result['compani']; ?> </option>
												<?php } } ?>				
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Agent Name :</label>

									<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">
										<select class="chosen-select col-xs-10 col-sm-9" id="form-field-1" name="agentName" data-placeholder="Select Agent Name......">
											<option value="">  </option>

											<?php
					                            $query = "select * from tbl_agent";
					                            $userCat = $db->select($query);
					                            if ($userCat) {
					                                while ($result = $userCat->fetch_assoc()) { 
					                          ?>
											<option value="<?php echo $result['name']; ?>"> <?php echo $result['name']; ?> </option>
												<?php } } ?>				
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Input Date :</label>

									<div class="col-sm-8">
										<input class="date-picker col-xs-12 col-sm-10 bolder" type="text" id="form-field-username form-field-date" value="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy" readonly="" name="inputDate"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Chalan No :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Enter Chalan Number" value="" name="chalanNo"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Quantity :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Enter Quantity" value="" name="quantity"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Unite Pirce :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Enter Unite Pirce" value="" name="price"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Total Price :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Enter Total Price" value="" name="totalPrice"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Remark's :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Enter Remark's" value="" name="remarks"/>
									</div>
								</div>

								<div class="form-group hidden">
				                    <label class="col-xs-4 col-sm-5 control-label "> User Name :</label>
				                    <div class="col-xs-8 col-sm-7">
				                        <input type="text"  value="<?php echo Session::get('username')?>" class="col-xs-10 col-sm-5" name="username" readonly/>
				                        <input type="hidden" name="userid" value="<?php echo Session::get('userId')?>" class="col-xs-10 col-sm-5" />
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
			All Store Input Data
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
						<th>Product Name</th>
						<th>Company Name</th>
						<th class="hidden-xs">Chalan No</th>
						<th class="hidden-xs">Price</th>
						<th width="15%">Action</th>
					</tr>
				</thead>

				<tbody>
			<?php
				$query ="SELECT * FROM tbl_storeinput order by id desc";
				$product = $db->select($query);
				if ($product) {
					$i=0;
					while ($result = $product->fetch_assoc()) {
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
						<td><?php echo $result['prodcutName'];?></td>
						<td><?php echo $result['companyName'];?></td>
						<td class="hidden-xs"><?php echo $result['chalanNo'];?></td>
						<td class="hidden-xs"><?php echo $result['price'];?></td>
						
						<td>
							<div class="">
								<?php echo $result['username'];?>
								||
								<!-- Preview option -->
								<?php
									$selected="SELECT * FROM tbl_storeinput order by id";
									$Person = $db->select($selected);
									if ($Person) {
										$id				=$i;
										$prodcutName	=$result['prodcutName'];
										$brandName		=$result['brandName'];
									    $companyName 	=$result['companyName'];
									    $agentName		=$result['agentName'];
									    $inputDate		=$result['inputDate'];
									    $currentDate	=$result['currentDate'];
									    $editDate		=$result['editDate'];
									    $chalanNo		=$result['chalanNo'];
									    $quantity		=$result['quantity'];
									    $price			=$result['price'];
									    $totalPrice		=$result['totalPrice'];
									    $remarks		=$result['remarks'];
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

									<p><h5><b>Product Name. : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $prodcutName; ?>">
									
									<p><h5><b>Brand Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $brandName; ?>">

								    <p><h5><b>Company Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $companyName; ?>">

								    <p><h5><b>Agent Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $agentName; ?>">

								    <p><h5><b>Input Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $inputDate; ?>">

								    <p><h5><b>Entry Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $currentDate; ?>">

								    <p><h5><b>Edit Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $editDate; ?>">

								    <p><h5><b>Chalan No : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $chalanNo; ?>">

									<p><h5><b>Quantity : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $quantity; ?>">

								    <p><h5><b>Price : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $price; ?>">

								    <p><h5><b>Total Price : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $totalPrice; ?>">

								    <p><h5><b>Remark's : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $remarks; ?>">

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
								<a href="edit_store_input.php?editId=<?php echo $result['id'];?>">
									<span class="glyphicon glyphicon-edit"></span>
								</a>
								<!-- Edit option -->
								||
								<a onclick="return confirm('Are you sure to Delete!');" class="red" href="delete_store_input.php?delid=<?php echo $result['id'];?>">
									<i class="ace-icon fa fa-trash-o bigger-130"></i>
								</a>
								<?php } ?>
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