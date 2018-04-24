<?php include 'inc/header.php' ?>

<?php
    if (!isset($_GET['editId']) || $_GET['editId'] == NULL) {
        echo "<script>windows.location = 'store_output.php';</script>";
    } else {
        $id = $_GET['editId'];
    }
?>
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
			        $editDate       = $fm->validation($_POST['editDate']);
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
			        $editDate	    = mysqli_real_escape_string($db->link, $editDate);
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
			        } else {
			             $query = "UPDATE tbl_storeOutput
					        SET
					        prodcutName 	= '$prodcutName',
						    brandName  		= '$brandName',
						    companyName		= '$companyName',
						    agentName		= '$agentName',
						    inputDate		= '$inputDate',
						    editDate		= '$editDate',
						    chalanNo  		= '$chalanNo',
						    quantity 		= '$quantity',
						    price 			= '$price',
						    totalPrice 		= '$totalPrice',
						    username 		= '$username',
						    remarks 		= '$remarks'
					        WHERE id 		= '$id'";
					        $updated_row = $db->update($query);
					        if ($updated_row) {
					        	echo "<script>window.location ='store_output.php';</script>";
						        } else{
						            echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
											<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
												<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
											</button>
											<strong>Warning! </strong>Information Not Updated.!!
										</div>";
						        	}
			         			}
			        		}
						?>


<?php
    $query = "select * from tbl_storeOutput where id = '$id' order by id desc";
    $getData = $db->select($query);
    while ($result = $getData->fetch_assoc()) {
?>
        <form action="" method="POST" class="form-horizontal">
			<div class="tabbable">
				<div class="tab-content profile-edit-tab-content">
					<div id="edit-basic" class="tab-pane in active">
						<h4 class="header blue bolder smaller">Update Store Output Data</h4>
						<div class="row">
							<div class="vspace-12-sm"></div>

							<div class="col-xs-12 col-sm-8">
								
								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Product Name :</label>

									<div class="col-sm-8">
					                    <select class="col-xs-10 col-sm-10" id="form-field-1" name="prodcutName">
												<?php
									                $query = "select * from tbl_productdetails";
									                $getData = $db->select($query);
									                if ($getData) {
									                    while ($getResult = $getData->fetch_assoc()) { 
									                ?>
									                <option 
									                <?php
									                    if ($result['prodcutName'] == $getResult['name']) { ?>
									                       selected = "selected"
									                <?php } ?> value="<?php echo $getResult['name'];?>"><?php echo $getResult['name'];?>
									                </option>
									            <?php } } ?>				
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Brand Name :</label>

									<div class="col-sm-8">
					                    <select class="col-xs-10 col-sm-10" id="form-field-1" name="brandName">		
					                    		<?php
									                $query = "select * from tbl_productdetails";
									                $getData = $db->select($query);
									                if ($getData) {
									                    while ($getResult = $getData->fetch_assoc()) { 
									                ?>
									                <option 
									                <?php
									                    if ($result['brandName'] == $getResult['brandName']) { ?>
									                       selected = "selected"
									                <?php } ?> value="<?php echo $getResult['brandName'];?>"><?php echo $getResult['brandName'];?>
									                </option>
									            <?php } } ?>			
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Company Name :</label>

									<div class="col-sm-8">
					                    <select class="col-xs-10 col-sm-10" id="form-field-1" name="companyName">
												<?php
									                $query = "select * from tbl_productdetails";
									                $getData = $db->select($query);
									                if ($getData) {
									                    while ($getResult = $getData->fetch_assoc()) { 
									                ?>
									                <option 
									                <?php
									                    if ($result['companyName'] == $getResult['compani']) { ?>
									                       selected = "selected"
									                <?php } ?> value="<?php echo $getResult['compani'];?>"><?php echo $getResult['compani'];?>
									                </option>
									            <?php } } ?>			
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Agent Name :</label>

									<div class="col-sm-8">
					                    <select class="col-xs-10 col-sm-10" id="form-field-1" name="agentName">		<?php
									                $query = "select * from tbl_agent";
									                $getData = $db->select($query);
									                if ($getData) {
									                    while ($getResult = $getData->fetch_assoc()) { 
									                ?>
									                <option 
									                <?php
									                    if ($result['agentName'] == $getResult['name']) { ?>
									                       selected = "selected"
									                <?php } ?> value="<?php echo $getResult['name'];?>"><?php echo $getResult['name'];?>
									                </option>
									            <?php } } ?>				
										</select>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Input Date :</label>

									<div class="col-sm-8">
										<input class="date-picker col-xs-12 col-sm-10 bolder" type="text" id="form-field-username form-field-date" value="<?php echo $result['inputDate'];?>" data-date-format="dd-mm-yyyy" readonly="" name="inputDate"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Edit Date :</label>

									<div class="col-sm-8">
										<input class="date-picker col-xs-12 col-sm-10 bolder" type="text" id="form-field-username form-field-date" value="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy" readonly="" name="editDate"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Chalan No :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Enter Chalan Number" value="<?php echo $result['chalanNo'];?>" name="chalanNo"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Quantity :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Enter Quantity" value="<?php echo $result['quantity'];?>" name="quantity"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Unite Pirce :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Enter Unite Pirce" value="<?php echo $result['price'];?>" name="price"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Total Price :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Enter Total Price" value="<?php echo $result['totalPrice'];?>" name="totalPrice"/>
									</div>
								</div>

								<div class="form-group">
									<label class="col-sm-4 control-label no-padding-right" for="form-field-username">Remark's :</label>

									<div class="col-sm-8">
										<input class="col-xs-12 col-sm-10" type="text" id="form-field-username" placeholder="Enter Remark's" value="<?php echo $result['remarks'];?>" name="remarks"/>
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
<?php } ?>

<div class="hr hr-8"></div>

                  </div>
                </div>
              </div>
            </div>

        </div>
    </div>

<!--Form End-->
</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<?php include 'inc/footer.php' ?>