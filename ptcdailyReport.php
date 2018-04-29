<?php include 'inc/header.php' ?>

<div id="user-profile-3" class="user-profile row">
<div class="row">
	<div class="col-xs-12">

	<!--Form Start-->

<div class="page-header">
		<h1 class="text-center">Perfect Trading Corporation (PTC)</h1> 
		<h4 class="text-center"><strong>Daily Report</strong></h4>
	</div><!-- /.page-header -->
	<br/>

	<div class="row">
		<div class="col-xs-12">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="form-horizontal" role="form">
                
                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label" for="form-field-date"> From Date :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php old('fromdate') ?>" data-date-format="yyyy-mm-dd"  name="fromdate"/>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-4 col-sm-5 control-label" for="form-field-date"> To Date :</label>
                    <div class="col-xs-8 col-sm-7">
                        <input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php old('todate') ?>" data-date-format="yyyy-mm-dd"  name="todate" />
                    </div>
                </div>

                <div class="form-group tabbable">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Account Number :</label>

					<div class="col-xs-7 col-sm-3 col-md-3 col-lg-3">
						<select class="chosen-select col-xs-10 col-sm-9" id="form-field-1" name="acc_number" data-placeholder="Select Account Number...">
							<option value="<?php old('acc_number') ?>"><?php old('acc_number') ?></option>

					
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


                <div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-6 col-xs-offset-4">
				    <input type="radio" name="option" value="option1" checked/>
				    New Customer
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-6 col-xs-offset-4">
				    <input type="radio" name="option" value="option2" <?php option('option', 'option2'); ?>>
				    Product Information
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-6 col-xs-offset-4">
				    <input type="radio" name="option" value="option3" <?php option('option', 'option3'); ?>>
				    FDR Information
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-6 col-xs-offset-4">
				    <input type="radio" name="option" value="option4" <?php option('option', 'option4'); ?>>
				    FDR &amp; Installment
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-8 col-xs-offset-4">
				    <input type="radio" name="option" value="option5" <?php option('option', 'option5'); ?>>
				    FDR Midback &amp; Return
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-8 col-xs-offset-4">
				    <input type="radio" name="option" value="option6" <?php option('option', 'option6'); ?>>
				    Bank/Personal Loan &amp; Return
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-6 col-xs-offset-4">
				    <input type="radio" name="option" value="option7" <?php option('option', 'option7'); ?>>
				    SBF To PTC
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-6 col-xs-offset-4">
				    <input type="radio" name="option" value="option8" <?php option('option', 'option8'); ?>>
				    PTC To SBF
				  </label>
				</div>

				<div class="radio">
				  <label class="col-lg-5 col-lg-offset-5 col-md-5 col-md-offset-5 col-sm-5 col-sm-offset-5 col-xs-6 col-xs-offset-4">
				    <input type="radio" name="option" value="option9" <?php option('option', 'option9'); ?>>
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
<?php
if (isset($_POST['submit']) && $_POST['option'] == 'option1') {
	var_dump($_POST['todate']);
	// var_dump($_POST['option']);
	$ac = $_POST['acc_number'];
	$fromDate = $_POST['fromdate'];
	$toDate = $_POST['todate'];

	$query = "SELECT * from tbl_ptcpersonalinfo";
	if ($fromDate == '' AND $toDate == '' AND $ac == '') {
		$ac = (int) $result['acc_number'];
	}
	if ($fromDate == '' AND $toDate == '') {
		unset($fromDate);
		unset($toDate);
		$query .=" WHERE `acc_number` = $ac";
	} elseif ($ac == '') {
		$query .= " WHERE `joining_date` BETWEEN '" .$fromDate . "' AND '". $toDate . "'";
	} else {
	$query .= " WHERE `acc_number` = $ac AND `joining_date` BETWEEN '" .$fromDate . "' AND '". $toDate . "'";;
	}
	$query .= " ORDER BY `acc_number` ASC";
	// var_dump($query);
echo '<div class="table-header dropdown-header">
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

<tbody>';

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
			<td><?php echo $result['applicant_name'] . '<br> ' . $result['acc_number']?></td>
			<td><?php echo $result['acc_number'];?></td> 
			<td><?php echo $result['joining_date'];?></td>
			<td><?php echo "0".$result['mobile_number'];?></td>
			<td><?php echo $result['NIDNumber'];?></td>
			<td><?php echo $result['address'];?></td>
			
		</tr>													
		<?php 
		} 
		}
	}
	elseif (isset($_POST['submit']) && $_POST['option'] == 'option2') {
// Product Info
	$ac = $_POST['acc_number'];
	// $fromDate = $_POST['fromdate'];
	// $toDate = $_POST['todate'];

	$query = "select ptc.`acc_number`, ptc.`prodcutName`, ptc.`productPrice`, ptc.`downPayment`, ptc.`inst_amount`, ptc.`fdr_amount`,
sum(imt.fdr) as tt_fdr, sum(imt.installment) as tt_imt, sum(fdr.midback) as tt_midback, sum(fdr.fdr_return) as fdrmr  
from tbl_ptcpersonalinfo ptc 
left join tbl_installment imt 
on ptc.`acc_number` = imt .`acc_number`
left join tbl_fdrmidbackreturn fdr 
on ptc.`acc_number` = fdr.`acc_number`"; 
//group by ptc.acc_number
//order by ptc.acc_number asc";
	// if ($fromDate == '' AND $toDate == '' AND $ac == '') {
	// 	$ac = (int) $result['acc_number'];
	// }
	// if ($fromDate == '' AND $toDate == '') {
	// 	unset($fromDate);
	// 	unset($toDate);
	// 	$query .=" WHERE `acc_number` = $ac";
	if ($ac !== '') {
		$query .= "  where ptc.`acc_number` = $ac";
	}
	$query .= " group by ptc.acc_number ORDER BY `acc_number` ASC";
	// var_dump($query);
echo '<div class="table-header dropdown-header">
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
	<th>ACC Number</th>
	<th>Product Info</th>
	<th>Ins/Fdr</th>
	<th>DUE FDR</th>
	<th>Inst</th>
	<th>FDR</th>
</tr>
</thead>

<tbody>';

	$productinfo = $db->select($query);
	if ($productinfo) {
		$i=0;
		while ($result = $productinfo->fetch_assoc()) {
			$i++;
		?>
		<tr>
			<td class="center">
				<label class="pos-rel">
					<input type="checkbox" class="ace" />
					<span class="lbl"></span>
				</label>
			</td>
			<td><?php echo $result['acc_number']?></td>
			<td>Name: <?php echo $result['prodcutName'];?><br>Price: <?php echo $result['productPrice'];?><br>Down: <?php echo $result['downPayment'];?></td>
			<td>Ins Amt: <?php echo $result['inst_amount'];?><br>FDR Amt: <?php echo $result['fdr_amount'];?></td>
			<td><?php echo ($result['fdr_amount'] - ($result['tt_midback'] + $result['fdrmr']));?></td>
			<td><?php echo $result['tt_fdr'];?><br><?php echo $result['tt_imt'];?></td>
			<td><?php echo ($result['tt_fdr'] + $result['fdrmr']);?></td>
		</tr>													
		<?php 
		} 
		}

//For Option 3
	} elseif (isset($_POST['submit']) && $_POST['option'] == 'option3') {
		//product info 

	$ac = $_POST['acc_number'];
	// $fromDate = $_POST['fromdate'];
	// $toDate = $_POST['todate'];

	$query = "select ptc.`acc_number`, ptc.`prodcutName`, ptc.`productPrice`, ptc.`downPayment`, ptc.`inst_amount`, ptc.`fdr_amount`,
sum(imt.fdr) as tt_fdr, sum(imt.installment) as tt_imt, sum(fdr.midback) as tt_midback, sum(fdr.fdr_return) as fdrmr  
from tbl_ptcpersonalinfo ptc 
left join tbl_installment imt 
on ptc.`acc_number` = imt .`acc_number`
left join tbl_fdrmidbackreturn fdr 
on ptc.`acc_number` = fdr.`acc_number`"; 
//group by ptc.acc_number
//order by ptc.acc_number asc";
	// if ($fromDate == '' AND $toDate == '' AND $ac == '') {
	// 	$ac = (int) $result['acc_number'];
	// }
	// if ($fromDate == '' AND $toDate == '') {
	// 	unset($fromDate);
	// 	unset($toDate);
	// 	$query .=" WHERE `acc_number` = $ac";
	if ($ac !== '') {
		$query .= "  where ptc.`acc_number` = $ac";
	}
	$query .= " group by ptc.acc_number ORDER BY `acc_number` ASC";
	// var_dump($query);
echo '<div class="table-header dropdown-header">
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
	<th>ACC Number</th>
	<th>Product Info</th>
	<th>Ins/Fdr</th>
	<th>DUE FDR</th>
	<th>Inst</th>
	<th>FDR</th>
</tr>
</thead>

<tbody>';

	$productinfo = $db->select($query);
	if ($productinfo) {
		$i=0;
		while ($result = $productinfo->fetch_assoc()) {
			$i++;
		?>
		<tr>
			<td class="center">
				<label class="pos-rel">
					<input type="checkbox" class="ace" />
					<span class="lbl"></span>
				</label>
			</td>
			<td><?php echo $result['acc_number']?></td>
			<td>Name: <?php echo $result['prodcutName'];?><br>Price: <?php echo $result['productPrice'];?><br>Down: <?php echo $result['downPayment'];?></td>
			<td>Ins Amt: <?php echo $result['inst_amount'];?><br>FDR Amt: <?php echo $result['fdr_amount'];?></td>
			<td><?php echo ($result['fdr_amount'] - ($result['tt_midback'] + $result['fdrmr']));?></td>
			<td><?php echo $result['tt_fdr'];?><br><?php echo $result['tt_imt'];?></td>
			<td><?php echo ($result['tt_fdr'] + $result['fdrmr']);?></td>
		</tr>													
		<?php 
		} 
		}

































































	}elseif (isset($_POST['submit']) && $_POST['option'] == 'option4') {
		echo '<p style="text-align:center">No Data</p>';
	}elseif (isset($_POST['submit']) && $_POST['option'] == 'option5') {
		echo '<p style="text-align:center">No Data</p>';
	}elseif (isset($_POST['submit']) && $_POST['option'] == 'option6') {
echo '<p style="text-align:center">No Data</p>';
	}elseif (isset($_POST['submit']) && $_POST['option'] == 'option7') {
echo '<p style="text-align:center">No Data</p>';
	}elseif (isset($_POST['submit']) && $_POST['option'] == 'option8') {
echo '<p style="text-align:center">No Data</p>';
	} elseif (isset($_POST['submit']) && $_POST['option'] == 'option9') {
echo '<p style="text-align:center">No Data</p>';
	} elseif (isset($_POST['submit']) && $_POST['option'] == 'option10') {
echo '<p style="text-align:center">No Data</p>';
	} ?>
	</tbody>
</table>
</div>
</div>
</div>

</div>
</div><!-- /.row -->

</div><!-- /.page-content -->
</div>
</div><!-- /.main-content -->

<?php include 'inc/footer.php' ?>
