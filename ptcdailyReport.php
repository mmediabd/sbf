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
	                            <option value="<?php echo $result['acc_number']; ?>"><?php echo $result['acc_number']; ?></option>
                        	<?php 
							}
						} ?>
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


<?php
if (isset($_POST['submit']) && $_POST['option'] == 'option1') {
	//var_dump($_POST['todate']);
	// var_dump($_POST['option']);
	$ac = $_POST['acc_number'];
	$fromDate = $_POST['fromdate'];
	$toDate = $_POST['todate'];

	$query = "SELECT * from tbl_ptcpersonalinfo";
	if ($fromDate == '' and $toDate == '' and $ac == '') {
		$ac = (int)$result['acc_number'];
	}
	if ($fromDate == '' and $toDate == '') {
		unset($fromDate);
		unset($toDate);
		$query .= " WHERE `acc_number` = $ac";
	} elseif ($ac == '') {
		$query .= " WHERE `joining_date` BETWEEN '" . $fromDate . "' AND '" . $toDate . "'";
	} else {
		$query .= " WHERE `acc_number` = $ac AND `joining_date` BETWEEN '" . $fromDate . "' AND '" . $toDate . "'";;
	}
	$query .= " ORDER BY `acc_number` ASC";
	// var_dump($query);
	echo '
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

<tbody>';

	$installment = $db->select($query);
	if ($installment) {
		$i = 0;
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
			<td><?php echo $result['applicant_name'] . '<br> ' . $result['acc_number'] ?></td>
			<td><?php echo $result['acc_number']; ?></td> 
			<td><?php echo $result['joining_date']; ?></td>
			<td><?php echo "0" . $result['mobile_number']; ?></td>
			<td><?php echo $result['NIDNumber']; ?></td>
			<td><?php echo $result['address']; ?></td>
			
		</tr>													
		<?php 
} ?></tbody><?php

}
} elseif (isset($_POST['submit']) && $_POST['option'] == 'option2') {
// Product Info
	$ac = $_POST['acc_number'];
	// $fromDate = $_POST['fromdate'];
	// $toDate = $_POST['todate'];

	$query = "select ptc.applicant_name as name, ptc.`acc_number`, ptc.`prodcutName`, ptc.`productPrice`, ptc.`downPayment`, ptc.`inst_amount`, ptc.`fdr_amount`, imt.acc_number, fdr.acc_number,
sum(InsFDR) as tt_fdr, sum(ImtInstallment) as tt_imt, sum(MidBack) as tt_midback, sum(FdrReturn) as fdrmr  
from tbl_ptcpersonalinfo ptc 
left join
(select imt.acc_number, sum(imt.fdr) as InsFDR, sum(imt.installment) as ImtInstallment from 
 tbl_installment imt group by imt.acc_number) imt 
on ptc.`acc_number` = imt .`acc_number`

left join 
(select fdr.acc_number, sum(fdr.midback) as MidBack, sum(fdr.fdr_return) as FdrReturn from 
tbl_fdrmidbackreturn fdr group by fdr.acc_number) fdr
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
	$query .= " group by ptc.acc_number ORDER BY ptc.`acc_number` ASC";
	// var_dump($query);
	echo '
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
	<th>Customer Info</th>
	<th>Product Info</th>
	<th>Ins/Fdr</th>
	<th>Total(Inst/FDR)</th>
	<th>DUE (Inst and FDR)</th>
	<th>FDR</th>
</tr>
</thead>

<tbody>';

		$productinfo = $db->select($query);
		if ($productinfo) {
			$i = 0;
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
			<td>Name: <?php echo $result['name'] ?><br>Ac NO: <?php echo $result['acc_number'] ?></td>
			<td>Pro. Name: <?php echo $result['prodcutName']; ?><br>Price: <?php echo $result['productPrice']; ?><br>Down: <?php echo $result['downPayment']; ?></td>
			<td>Ins Amt: <?php echo $result['inst_amount']; ?><br>FDR Amt: <?php echo $result['fdr_amount']; ?></td>
			<td>Total Ins: <?php echo $result['tt_imt']; ?><br>Total FDR:<?php echo $result['tt_fdr']; ?></td>
			<td>Fdrmidback: <?php echo account($result['tt_midback']);?><br>Return: <?php echo account($result['fdrmr']); ?></td>
			<td>Due Ins: <?php echo ($result['productPrice'] - $result['downPayment']) - $result['tt_imt']; ?><br>
			Due FDR: <?php echo ($result['tt_fdr'] - ($result['tt_midback'] + $result['fdrmr'])); ?></td>
		</tr>													
		<?php 
} ?></tbody> <?php

	}

//For Option 3
} elseif (isset($_POST['submit']) && $_POST['option'] == 'option3') {
//product info 

	$ac = $_POST['acc_number'];
	$fromDate = $_POST['fromdate'];
	$toDate = $_POST['todate'];

	if (($fromDate && $toDate) !== '' && $ac == '') {
		echo '<div class="row">
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
			<th>ACC Number</th>
			<th>Name</th>
			<th>Install Amount</th>
			<th>Total FDR</th>
			<th>Total Midback</th>
			<th>Total Return</th>
		</tr>
		</thead>
	
		<tbody>';

	$query = "select ptc.applicant_name as name, ptc.acc_number as ac, ptc.fdr_amount as amount, sum(imt.fdr) as ttl_fdr, sum(fdr.midback) as ttl_midback, sum(fdr.fdr_return) as ttl_return
	from tbl_ptcpersonalinfo ptc left join tbl_installment imt
	on ptc.acc_number = imt.acc_number left join tbl_fdrmidbackreturn fdr
	on fdr.acc_number = ptc.acc_number where imt.entry_date BETWEEN '" . $fromDate . "' AND '" . $toDate . "' 
	group by ptc.acc_number";
	$fdrInfo = $db->select($query);
	if ($fdrInfo) {
		$i = 0;
		while ($result = $fdrInfo->fetch_assoc()) {
			$i++;
			?>
		<tr>
			<td class="center">
				<label class="pos-rel">
					<input type="checkbox" class="ace" />
					<span class="lbl"></span>
				</label>
			</td>
			<td><?php echo $result['ac'] ?></td>
			<td><?php echo $result['name']; ?></td>
			<td><?php echo $result['amount']; ?></td>
			<td><?php echo $result['ttl_fdr']; ?></td>
			<td><?php echo $result['ttl_midback']; ?></td>
			<td><?php echo $result['ttl_return']; ?></td>
		</tr>													
		<?php 
} ?></tbody><?php 
	}

	}


	if (($ac !== "") && ($fromDate || $toDate) !== '') {

	echo '<div class="row">
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
			<th>Personal Info</th>
			<th>FDR</th>
			<th>FDR Pay Date</th>
			<th>Midback</th>
			<th>Return</th>
			<th>FDR Date</th>
		</tr>
		</thead>
	
		<tbody>';

	$query = "select ptc.applicant_name as name, ptc.acc_number as ac, ptc.fdr_amount as amount,
	imt.fdr as fdr, imt.entry_date as imt_date,
	fdr.midback as midback, fdr.fdr_return as fdr_return, fdr.inputdate as fdr_date
	from tbl_ptcpersonalinfo ptc left join tbl_installment imt
	on ptc.acc_number = imt.acc_number left join tbl_fdrmidbackreturn fdr
	on fdr.acc_number = ptc.acc_number where ptc.acc_number = $ac";
	$fdrInfoAC = $db->select($query);
	if ($fdrInfoAC) {
		$i = 0;
		while ($result = $fdrInfoAC->fetch_assoc()) {
			$i++;
			?>
		<tr>
			<td class="center">
				<label class="pos-rel">
					<input type="checkbox" class="ace" />
					<span class="lbl"></span>
				</label>
			</td>
			<td><strong>Name:</strong> <?php echo $result['name'] ?><br><strong>AC:</strong> <?php echo $result['ac'] ?><br><strong>FDR:</strong> <?php echo $result['amount']; ?></td>
			<td><?php echo $result['fdr']; ?></td>
			<td><?php echo $result['imt_date']; ?></td>
			<td><?php echo $result['midback']; ?></td>
			<td><?php echo $result['fdr_return']; ?></td>
			<td><?php echo $result['fdr_date']; ?></td>
		</tr>													
	<?php 
} ?></tbody> <tfoot> <?php

	$query2 = "select ptc.applicant_name as name, ptc.acc_number as ac, ptc.fdr_amount as amount, sum(imt.fdr) as ttl_fdr, sum(fdr.midback) as ttl_midback, sum(fdr.fdr_return) as ttl_return
	from tbl_ptcpersonalinfo ptc left join tbl_installment imt
	on ptc.acc_number = imt.acc_number left join tbl_fdrmidbackreturn fdr
	on fdr.acc_number = ptc.acc_number where ptc.acc_number = $ac";

	$fdrInfoT = $db->select($query2);
	$result = $fdrInfoT->fetch_assoc();
	?>
	<tr>
					<td class="center">
						<label class="pos-rel">
							<input type="checkbox" class="ace" />
							<span class="lbl"></span>
						</label>
					</td>
					<td><strong>Total</strong></td>
					<td><strong><?php echo $result['ttl_fdr']; ?></strong></td>
					<td colspan="2"><strong><?php echo ($result['ttl_midback'] == '') ? '0' : $result['ttl_midback']; ?></strong></td>
					<td colspan="2"><strong><?php echo ($result['ttl_return'] == '') ? '0' : $result['ttl_return']; ?></strong></td>
				</tr></tfoot>
<?php

}
}

































































} elseif (isset($_POST['submit']) && $_POST['option'] == 'option4') {
	echo '<p style="text-align:center">No Data</p>';
} elseif (isset($_POST['submit']) && $_POST['option'] == 'option5') {
	echo '<p style="text-align:center">No Data</p>';
} elseif (isset($_POST['submit']) && $_POST['option'] == 'option6') {
	echo '<p style="text-align:center">No Data</p>';
} elseif (isset($_POST['submit']) && $_POST['option'] == 'option7') {
	echo '<p style="text-align:center">No Data</p>';
} elseif (isset($_POST['submit']) && $_POST['option'] == 'option8') {
	echo '<p style="text-align:center">No Data</p>';
} elseif (isset($_POST['submit']) && $_POST['option'] == 'option9') {
	echo '<p style="text-align:center">No Data</p>';
} elseif (isset($_POST['submit']) && $_POST['option'] == 'option10') {
	echo '<p style="text-align:center">No Data</p>';
} ?>
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