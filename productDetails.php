<?php include 'inc/header.php' ?>


<div id="user-profile-3" class="user-profile row">
<div class="row">
	<div class="col-xs-12">

	<!--Form Start-->

<div class="page-header">
		<h1 class="text-center">Perfect Trading Corporation (PTC)</h1> 
		<h4 class="text-center">Add Product Information</h4>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<?php
			    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			        $name 			= $fm->validation($_POST['name']);
			        $size 			= $fm->validation($_POST['size']);
			        $garrenty 		= $fm->validation($_POST['garrenty']);
			        $warrenty 		= $fm->validation($_POST['warrenty']);
			        $picec 			= $fm->validation($_POST['picec']);
			        $downPayment 	= $fm->validation($_POST['downPayment']);
			        $ins_time 		= $fm->validation($_POST['ins_time']);
			        $username 		= $fm->validation($_POST['username']);
			        
			        $name 			= mysqli_real_escape_string($db->link, $name);
			        $size 			= mysqli_real_escape_string($db->link, $size);
			        $garrenty 		= mysqli_real_escape_string($db->link, $garrenty);
			        $warrenty 		= mysqli_real_escape_string($db->link, $warrenty);
			        $picec 			= mysqli_real_escape_string($db->link, $picec);
			        $downPayment 	= mysqli_real_escape_string($db->link, $downPayment);
			        $ins_time 		= mysqli_real_escape_string($db->link, $ins_time);
			        $username 		= mysqli_real_escape_string($db->link, $username);
			        $userid 		= mysqli_real_escape_string($db->link, $_POST['userid']);

			         if ($name == "" || $size == "" || $garrenty == "" || $warrenty == "" || $picec == "" || $downPayment == "" || $ins_time == "" || $username == "") {
			                echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
									</button>
									<strong>Warning! </strong>Field must not be empty.!!</div>";
			         } else {
			            $query = "INSERT INTO tbl_productdetails(name, size, garrenty, warrenty, picec, downPayment, ins_time, username) VALUES('$name', '$size', '$garrenty', '$warrenty', '$picec', '$downPayment', '$ins_time', '$username')";
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
                    <label class="col-xs-4 col-sm-5 control-label"> Product Name :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" placeholder="Enter Product Name....." class="col-xs-10 col-sm-5" name="name" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label"> Product Size :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" placeholder="Enter Product Size....." class="col-xs-10 col-sm-5" name="size" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label"> Product Garrenty :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" placeholder="Enter Product Garrenty....." class="col-xs-10 col-sm-5" name="garrenty" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label"> Product Warrenty :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" placeholder="Enter Product Warrenty....." class="col-xs-10 col-sm-5" name="warrenty" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label"> Product Price :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" placeholder="Enter Product Price....." class="col-xs-10 col-sm-5" name="picec" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label"> Down Payment :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" placeholder="Enter Down Payment....." class="col-xs-10 col-sm-5" name="downPayment" />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label"> Installment Time :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input type="text" placeholder="Enter Installment Time....." class="col-xs-10 col-sm-5" name="ins_time" />
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
						<th class="hidden-xs">SL No</th>
						<th>Product Name</th>
						<th>Product Price</th>
						<th class="hidden-xs">Down Payment</th>
						<th class="hidden-xs">Inst. Time</th>
						<th width="16%">User Status</th>
					</tr>
				</thead>

				<tbody>
			<?php
				$query ="SELECT * FROM tbl_productdetails order by id desc";
				$getData = $db->select($query);
				if ($getData) {
					$i=0;
					while ($result = $getData->fetch_assoc()) {
						$i++;
					?>
					<tr>
						<td class="center">
							<label class="pos-rel">
								<input type="checkbox" class="ace" />
								<span class="lbl"></span>
							</label>
						</td>
						<td class="hidden-xs"><?php echo $i;?></td>
						<td><?php echo $result['name'];?></td>
						<td><?php echo "Tk. ".$result['picec'];?></td>
						<td class="hidden-xs"><?php echo $result['downPayment']."%";?></td>
						<td class="hidden-xs"><?php echo $result['ins_time'];?> Month</td>
						<td>
							<div class="">
								<?php echo $result['username'];?>
								||
								<!-- Preview option -->
					            <?php
					              $selected="SELECT * FROM tbl_productdetails order by id";
					              $Person = $db->select($selected);
					              if ($Person) {
					                    $id             =$i;
					                    $name     		=$result['name'];
					                    $size 			=$result['size'];
					                    $garrenty 	    =$result['garrenty'];
					                    $warrenty       =$result['warrenty'];
					                    $picec          =$result['picec'];
					                    $downPayment    =$result['downPayment'];
					                    $ins_time       =$result['ins_time'];
					                    $currendate     =$result['currendate'];
					                    $editDate       =$result['editDate'];
					                    $username       =$result['username'];
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

					              <p><h5><b>Product Name : </b></h5></p><input style="width: 100%;" type="text" class="form-control" readonly="" value="<?php echo $name; ?>">

					              <p><h5><b>Product Size : </b></h5></p><input style="width: 100%;" type="text" class="form-control" readonly="" value="<?php echo $size; ?>">

					              <p><h5><b>Product Garrenty : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $garrenty; ?>">

					              <p><h5><b>Product Warrenty : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $warrenty; ?>">

					              <p><h5><b>Product Price : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $picec; ?>">

					              <p><h5><b>Down Payment : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $downPayment; ?>">

					              <p><h5><b>Installment Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $ins_time; ?>">

					              <p><h5><b>Entry Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $currendate; ?>">

					              <p><h5><b>Edit Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $editDate; ?>">

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
								<a href="editproductdetails.php?editId=<?php echo $result['id'];?>">
									<span class="glyphicon glyphicon-edit"></span>
								</a>
								<!-- Edit option -->
								||
								<a onclick="return confirm('Are you sure to Delete!');" class="red" href="delproductdetails.php?delid=<?php echo $result['id'];?>">
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