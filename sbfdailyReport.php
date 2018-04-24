<?php include 'inc/header.php' ?>

<div id="user-profile-3" class="user-profile row">
<div class="row">
	<div class="col-xs-12">

	<!--Form Start-->

<div class="page-header">
		<h1 class="text-center">Shadhin Bahumukhi Firm (SBF)</h1> 
		<h4 class="text-center"><strong>Daily Report</strong></h4>
	</div><!-- /.page-header -->
	<br/>

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<?php
			    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

			        $formdate 		= $fm->validation($_GET['formdate']);
			        $todate 		= $fm->validation($_GET['todate']);
			        $vauchar    	= $fm->validation($_GET['vauchar']);

			        
			        $formdate		= mysqli_real_escape_string($db->link, $formdate);
			        $todate 		= mysqli_real_escape_string($db->link, $todate);
			        $vauchar 		= mysqli_real_escape_string($db->link, $vauchar);

			         if ($formdate == "" || $todate == "" || $vauchar == "") {
			                echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
									<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
										<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
									</button>
									<strong>Warning! </strong>Field Must Not Be Empty.!!
								</div>";
			         } else {
			            $query = "INSERT INTO tbl_otherscost(formdate, todate, vauchar) VALUES('$formdate', '$todate', '$vauchar')";
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

		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-horizontal" role="form">
                
                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label" for="form-field-date"> From Date :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy"  name="formdate" readonly/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label" for="form-field-date"> To Date :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo date('d-m-Y'); ?>" data-date-format="dd-mm-yyyy"  name="todate" readonly/>
                    </div>
                </div>

                <div class="form-group tabbable">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Account Number :</label>
					<div class="col-xs-8 col-sm-4 col-md-3 col-lg-4">
					<select class="col-xs-10 col-sm-9" required="" id="form-field-1" name="acc_number" >
							<option value="">All</option>
							<?php
	                            $query = "select * from tbl_sbfgeneralinvestorinfo";
	                            $Category = $db->select($query);
	                            if ($Category) {
	                                while ($result = $Category->fetch_assoc()) { 
	                            ?>
	                            <option value="<?php echo $result['acc_number'];?>"><?php echo $result['acc_number'];?></option>
                        	<?php } } ?>
						</select>
					</div>
				</div>


                <div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-4 col-xs-offset-4">
				    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
				    New Share Holder
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-4 col-xs-offset-4">
				    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">
				    Share Input &amp; Output
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-4 col-xs-offset-4">
				    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				    New DPS Holder
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-4 col-xs-offset-4">
				    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
				    DPS Input &amp; Output
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-4 col-xs-offset-4">
				    <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
				    SBF To Sister Concern
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-4 col-xs-offset-4">
				    <input type="radio" name="optionsRadios" id="optionsRadios4" value="option4">
				    Sister Concern To SBF
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-4 col-xs-offset-4">
				    <input type="radio" name="optionsRadios" id="optionsRadios5" value="option5">
				    Bank/Personal Loan &amp; Return
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-4 col-xs-offset-4">
				    <input type="radio" name="optionsRadios" id="optionsRadios5" value="option6">
				    Daily Others Cost
				  </label>
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
			<th>Applicant Name</th>
			<th>Account No</th>
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