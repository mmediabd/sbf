<?php include 'inc/header.php' ?>

<div id="user-profile-3" class="user-profile row">
<div class="row">
	<div class="col-xs-12">

	<!--Form Start-->

<div class="page-header">
		<h1 class="text-center">Perfect Trading Corporation (PTC)</h1> 
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $applicant_name   = $fm->validation($_POST['applicant_name']);
        $father_name      = $fm->validation($_POST['father_name']);
        $joining_date     = $fm->validation($_POST['joining_date']);
        $acc_number       = $fm->validation($_POST['acc_number']);
        $mobile_number    = $fm->validation($_POST['mobile_number']);
        $address          = $fm->validation($_POST['address']);
        $NIDNumber        = $fm->validation($_POST['NIDNumber']);
        $Nominisname      = $fm->validation($_POST['Nominisname']);
        $relation         = $fm->validation($_POST['relation']);
        $nomini_address   = $fm->validation($_POST['nomini_address']);
        $prodcutName      = $fm->validation($_POST['prodcutName']);
        $productPrice     = $fm->validation($_POST['productPrice']);
        $downPayment      = $fm->validation($_POST['downPayment']);
        $inst_amount      = $fm->validation($_POST['inst_amount']);
        $fdr_amount       = $fm->validation($_POST['fdr_amount']);
        $admissionfee     = $fm->validation($_POST['admissionfee']);
        $customarCatagory = $fm->validation($_POST['customarCatagory']);
        $collectiontype   = $fm->validation($_POST['collectiontype']);
        $collectionday    = $fm->validation($_POST['collectionday']);
        $groupname        = $fm->validation($_POST['groupname']);
        $marketing_officer= $fm->validation($_POST['marketing_officer']);
        $username 	  = $fm->validation($_POST['username']);
        
        $applicant_name	  = mysqli_real_escape_string($db->link, $applicant_name);
        $father_name      = mysqli_real_escape_string($db->link, $father_name);
        $joining_date	  = mysqli_real_escape_string($db->link, $joining_date);
        $acc_number       = mysqli_real_escape_string($db->link, $acc_number);
        $mobile_number	  = mysqli_real_escape_string($db->link, $mobile_number);
        $address          = mysqli_real_escape_string($db->link, $address);
        $NIDNumber        = mysqli_real_escape_string($db->link, $NIDNumber);
        $Nominisname 	  = mysqli_real_escape_string($db->link, $Nominisname);
        $relation 	  = mysqli_real_escape_string($db->link, $relation);
        $nomini_address   = mysqli_real_escape_string($db->link, $nomini_address);
        $prodcutName   	  = mysqli_real_escape_string($db->link, $prodcutName);
        $productPrice	  = mysqli_real_escape_string($db->link, $productPrice);
        $downPayment      = mysqli_real_escape_string($db->link, $downPayment);
        $inst_amount      = mysqli_real_escape_string($db->link, $inst_amount);
        $fdr_amount       = mysqli_real_escape_string($db->link, $fdr_amount);
        $admissionfee     = mysqli_real_escape_string($db->link, $admissionfee);
      	$customarCatagory = mysqli_real_escape_string($db->link, $customarCatagory);
        $collectiontype   = mysqli_real_escape_string($db->link, $collectiontype);
        $collectionday    = mysqli_real_escape_string($db->link, $collectionday);
        $groupname        = mysqli_real_escape_string($db->link, $groupname);
        $marketing_officer= mysqli_real_escape_string($db->link, $marketing_officer);
        $username 	  = mysqli_real_escape_string($db->link, $username);
        $userid           = mysqli_real_escape_string($db->link, $_POST['userid']);

        $permited  = array('jpg', 'jpeg', 'png', 'gif', '');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "img/PTC_Customer/".$unique_image;

        if ($applicant_name == "" || $father_name == "" || $joining_date == "" || $acc_number == "" || $mobile_number == "" || $address == "" || $NIDNumber == "" || $Nominisname == "" || $relation == "" || $nomini_address == "" || $prodcutName == "" || $productPrice == "" || $downPayment == "" || $inst_amount == "" || $fdr_amount == "" || $admissionfee == "" || $customarCatagory == "" || $collectiontype == "" || $collectionday == "" || $groupname == "" || $marketing_officer == "" || $username == "") {
        echo "<div class='alert alert-danger' alert-dismissible' id='deletesuccess' role='alert'>
        			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
						<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
					</button>
                	<strong>Warning!</strong> Field must not be empty.!!
               </div>";
        }else{
        $cquery = "SELECT * FROM tbl_ptcpersonalinfo WHERE acc_number = '$acc_number'";
        $check =$db->select($cquery);
        if ($check) {
            echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
                        </button>
                        <strong>Warning! </strong>This Account Number Already Exist.!!
                    </div>";
        } elseif ($file_size >1048567) {
         echo "<span class='error'>Image Size should be less then 1MB!</span>";
        }
         elseif (in_array($file_ext, $permited) === false) {
         echo "<span class='error'>You can upload only :- "
         .implode(', ', $permited)."</span>";
        } 
        else{
        move_uploaded_file($file_temp, $uploaded_image);

        $query = "INSERT INTO tbl_ptcpersonalinfo(applicant_name, father_name, joining_date, acc_number, mobile_number, address, NIDNumber, image, Nominisname, relation, nomini_address, prodcutName, productPrice, downPayment, inst_amount, fdr_amount, admissionfee, customarCatagory, collectiontype, collectionday, groupname, marketing_officer, username) VALUES('$applicant_name', '$father_name', '$joining_date', '$acc_number', '$mobile_number', '$address', '$NIDNumber', '$uploaded_image', '$Nominisname', '$relation', '$nomini_address', '$prodcutName', '$productPrice', '$downPayment', '$inst_amount', '$fdr_amount', '$admissionfee', '$customarCatagory', '$collectiontype', '$collectionday', '$groupname', '$marketing_officer', '$username')";
            $datainsert = $db->insert($query);
        if ($datainsert) {
            echo "<div class='alert alert-success alert-dismissible' id='deletesuccess' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
						</button>
						<strong>Successfully! </strong> Data Inserted Successfully.
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

<!-- Button trigger modal -->
                <div class="text-center">
                    <button type="button" class="btn btn-primary btn-lg btn-round" data-toggle="modal" data-target="#myModal">Add New Customer</button>
                </div>
                <br/>
<!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add New Customer</h4>
                      </div>
                      <div class="modal-body">
                        
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
                          <div class="form-group">
                            <label for="applicant_name" class="control-label">Applicant Name</label>
                            <input type="text" name="applicant_name" placeholder="Enter applicant name" class="form-control" id="applicant_name">
                          </div>

                          <div class="form-group">
                            <label for="father_name" class="control-label">Applicant Father Name</label>
                            <input type="text" name="father_name" placeholder="Enter applicant father name" class="form-control" id="father_name">
                          </div>

                          <div class="form-group">
                            <label for="form-field-date" class="control-label">Application Date</label>
                            <input type="text" name="joining_date" class="form-control date-picker" id="form-field-date" value="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy" readonly="">
                          </div>

                          <div class="form-group">
                            <label for="acc_number" class="control-label">Account Number</label>
                            <input type="number" name="acc_number" placeholder="Create account number" class="form-control" id="acc_number">
                          </div>

                          <div class="form-group">
                            <label for="mobile_number" class="control-label">Mobile Number</label>
                            <input type="text" name="mobile_number" placeholder="Enter mobile number" class="form-control" id="mobile_number">
                          </div>

                          <div class="form-group">
                            <label for="address" class="control-label">Address</label>
                            <input type="text" name="address" placeholder="Enter Address" class="form-control" id="address">
                          </div>

                          <div class="form-group">
                            <label for="NIDNumber" class="control-label">NID Number</label>
                            <input type="text" name="NIDNumber" placeholder="Enter NID Number" class="form-control" id="NIDNumber">
                          </div>

                          <div class="form-group">
                            <label for="image" class="control-label">Applicant Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                          </div>

                          <div class="form-group">
                            <label for="Nominisname" class="control-label">Nomini Name</label>
                            <input type="text" name="Nominisname" placeholder="Enter nominis name" class="form-control" id="Nominisname">
                          </div>

                          <div class="form-group">
                            <label for="relation" class="control-label">With Nomini Relation</label>
                            <input type="text" name="relation" placeholder="Enter with nominis relation" class="form-control" id="relation">
                          </div>

                          <div class="form-group">
                            <label for="nomini_address" class="control-label">Nomini Address</label>
                            <input type="text" name="nomini_address" placeholder="Enter nomini address" class="form-control" id="nomini_address">
                          </div>

                          <div class="form-group">
                            <label for="prodcutName" class="control-label">Product Name</label>
                            <input type="text" name="prodcutName" placeholder="Enter product name" class="form-control" id="prodcutName">
                          </div>

                          <div class="form-group">
                            <label for="productPrice" class="control-label">Product Price</label>
                            <input type="number" name="productPrice" placeholder="Enter prodcut price" class="form-control" id="productPrice">
                          </div>

                          <div class="form-group">
                            <label for="downPayment" class="control-label">Down Payment</label>
                            <input type="number" name="downPayment" placeholder="Enter down payment" class="form-control" id="downPayment">
                          </div>

                          <div class="form-group">
                            <label for="inst_amount" class="control-label">Installment Amount</label>
                            <input type="number" name="inst_amount" placeholder="Enter installment amount" class="form-control" id="inst_amount">
                          </div>

                          <div class="form-group">
                            <label for="fdr_amount" class="control-label">FDR Amount</label>
                            <input type="text" name="fdr_amount" placeholder="Enter fdr amount" class="form-control" id="fdr_amount">
                          </div>

                          <div class="form-group">
                            <label for="admissionfee" class="control-label">Admission Fee</label>
                            <input type="text" name="admissionfee" placeholder="Enter fdr amount" class="form-control" id="admissionfee">
                          </div>

                          <div class="form-group">
                            <label for="customarCatagory" class="control-label">Coustomar Catagory</label>
                            <select class="form-control" id="customarCatagory" name="customarCatagory">
                                <option value="">Select coustomar catagory......</option>
                                <?php
                                    $query = "select * from catatgory";
                                    $Catagory = $db->select($query);
                                    if ($Catagory) {
                                        while ($result = $Catagory->fetch_assoc()) { 
                                  ?>
                                <option value="<?php echo $result['id'];?>"> <?php echo $result['name'];?> </option>
                                    <?php } } ?>                        
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="collectiontype" class="control-label">Collection Type</label>
                            <select class="form-control" id="collectiontype" name="collectiontype">
                                <option value="">Select collection Type......</option>
                                <?php
                                    $query = "select * from collectionsystem";
                                    $collection = $db->select($query);
                                    if ($collection) {
                                        while ($result = $collection->fetch_assoc()) { 
                                  ?>
                                <option value="<?php echo $result['id'];?>"> <?php echo $result['name'];?> </option>
                                    <?php } } ?>                        
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="collectionday" class="control-label">Collection Day</label>
                            <select class="form-control" id="collectionday" name="collectionday">
                                <option value="">Select collection Day......</option>
                                <?php
                                    $query = "select * from collectionday";
                                    $collection = $db->select($query);
                                    if ($collection) {
                                        while ($result = $collection->fetch_assoc()) { 
                                  ?>
                                <option value="<?php echo $result['id'];?>"> <?php echo $result['name'];?> </option>
                                    <?php } } ?>                        
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="groupname" class="control-label">Group Name</label>
                           <select class="form-control" id="groupname" name="groupname">
                                <option value="">Select group name......</option>
                                <?php
                                    $query = "select * from tbl_groupname";
                                    $Catagory = $db->select($query);
                                    if ($Catagory) {
                                        while ($result = $Catagory->fetch_assoc()) { 
                                  ?>
                                <option value="<?php echo $result['id'];?>"> <?php echo $result['name'];?> </option>
                                    <?php } } ?>                        
                            </select>
                          </div>

                          <div class="form-group">
                            <label for="marketing_officer" class="control-label">Marketing Officer Name</label>
                           <select class="form-control" id="marketing_officer" name="marketing_officer">
                                <option value="">Select Marketing Officer name......</option>
                                <?php
                                    $query = "select * from tbl_marketing_officer";
                                    $Catagory = $db->select($query);
                                    if ($Catagory) {
                                        while ($result = $Catagory->fetch_assoc()) { 
                                  ?>
                                <option value="<?php echo $result['id'];?>"> <?php echo $result['name'];?> </option>
                                    <?php } } ?>                        
                            </select>
                          </div>

                          <div class="form-group hidden">
                            <label for="username" class="control-label">User Name</label>
                            <input type="text" value="<?php echo Session::get('username')?>" name="username" class="form-control" id="username" readonly>
                            <input type="hidden" name="userid" value="<?php echo Session::get('userId')?>" class="form-control" id="username" readonly>
                          </div>


                          <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
                            <button type="submit" name="submit" class="btn btn-primary btn-round">Submit</button>
                          </div>
                    </form>

                      </div>
                    </div>
                  </div>
                </div>

		</div>
	</div>

<!--Form -->

<div class="row">
<div class="col-xs-12">

<div class="row">
<div class="col-xs-12">
<div class="clearfix">
<div class="pull-right tableTools-container"></div>
</div>

<div class="table-header dropdown-header">
Customar Details Information Table
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
      <th class="hidden-xs">Mobile No</th>
			<th class="hidden-xs">Product Name</th>
			<th class="hidden-xs">price</th>
			<th width="17%">User Status</th>
		</tr>
	</thead>

	<tbody>
<?php
	$query ="SELECT * FROM tbl_ptcpersonalinfo where status = '0' order by id desc;";
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
      <td class="hidden-xs"><?php echo $result['mobile_number'];?></td>
			<td class="hidden-xs"><?php echo $result['prodcutName'];?></td>
			<td class="hidden-xs"><?php echo $result['productPrice'];?></td>
			<td>
				<div class="">
					<?php echo $result['username'];?>
            ||
            <!-- Preview option -->
            <?php
              $selected="SELECT * FROM tbl_ptcpersonalinfo order by id";
              $Person = $db->select($selected);
              if ($Person) {
                    $image          =$result['image'];
                    $id             =$result['id'];
                    $acc_number     =$result['acc_number'];
                    $applicant_name =$result['applicant_name'];
                    $father_name    =$result['father_name'];
                    $joining_date   =$result['joining_date'];
                    $currentdate    =$result['currentdate'];
                    $editDate       =$result['editDate'];
                    $mobile_number  =$result['mobile_number'];
                    $address        =$result['address'];
                    $NIDNumber      =$result['NIDNumber'];
                    $Nominisname    =$result['Nominisname'];
                    $relation       =$result['relation'];
                    $nomini_address =$result['nomini_address'];
                    $prodcutName    =$result['prodcutName'];
                    $productPrice   =$result['productPrice'];
                    $downPayment    =$result['downPayment'];
                    $inst_amount    =$result['inst_amount'];
                    $fdr_amount     =$result['fdr_amount'];
                    $admissionfee   =$result['admissionfee'];
                    $customarCatagory =$result['customarCatagory'];
                    $collectiontype  =$result['collectiontype'];
                    $collectionday  =$result['collectionday'];
                    $groupname      =$result['groupname'];
                    $marketing_officer =$result['marketing_officer'];
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
            <h4 class="modal-title">Full Information of this Person</h4>
            </div>
            <div class="modal-body">
              <p><h5><b>Customer Picture : </b></h5></p>
              <img src="<?php echo $image; ?>" height="250px" width="100%"/>

              <p><h5><b>Account Number : </b></h5></p><input style="width: 100%;" type="text" class="form-control" readonly="" value="<?php echo $acc_number; ?>">

              <p><h5><b>Applicant Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $applicant_name; ?>">

              <p><h5><b>Father Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $father_name; ?>">

                <p><h5><b>Joining Date : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $joining_date; ?>">

                <p><h5><b>Entry Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $currentdate; ?>">

                <p><h5><b>Edit Date & Time : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $editDate; ?>">

                <p><h5><b>Mobile Number : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $mobile_number; ?>">

                <p><h5><b>Address : </b></h5></p>
                <textarea style="width: 100%" readonly=""><?php echo $address; ?></textarea>

                <p><h5><b>NID Number : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $NIDNumber; ?>">

                <p><h5><b>Nomini Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $Nominisname; ?>">

                <p><h5><b>With Nomini Relation : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $relation; ?>">

                <p><h5><b>Nomini Address : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $nomini_address; ?>">

                <p><h5><b>Product Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $prodcutName; ?>">

                <p><h5><b>Product Price : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $productPrice; ?>">

                <p><h5><b>Down Payment : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $downPayment; ?>">

                <p><h5><b>Installment Amount : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $inst_amount; ?>">

                <p><h5><b>FDR Amount : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $fdr_amount; ?>">

                <p><h5><b>Admission Fee : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $admissionfee; ?>">

                <p><h5><b>Customer Catagory : </b></h5></p>
                <input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $customarCatagory; ?>">

                <p><h5><b>Collection Type : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $collectiontype; ?>">

                <p><h5><b>Collection Day : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $collectionday; ?>">

                <p><h5><b>Group Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $groupname; ?>">

                <p><h5><b>Marketing Officer Name : </b></h5></p><input style="width: 100%" type="" class="form-control" readonly="" value="<?php echo $marketing_officer; ?>">

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
          <a href="editPtcPerInfo.php?editid=<?php echo $result['id'];?>">
            <span class="glyphicon glyphicon-edit"></span>
          </a>
            <!-- Edit option -->
					||
					<a onclick="return confirm('Are you sure to Delete!');" class="red" href="deleteptcpersonalinfo.php?delid=<?php echo $result['id'];?>">
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