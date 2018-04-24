<?php include 'inc/header.php' ?>

<div class="page-header">
	<h1>
		Dashboard
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			overview &amp; stats
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
	<!-- PAGE CONTENT BEGINS--
		<div class="alert alert-block alert-success text-center" id="deletesuccess">
			<button type="button" class="close" data-dismiss="alert">
				<i class="ace-icon fa fa-times"></i>
			</button>
			<i class="ace-icon fa fa-check green"></i>
			<strong class="green">Welcome to visit Our SBF Managment System. </strong>
		</div>
	<!-- PAGE CONTENT BEGINS -->



<div class="well">
<div class="row">
    <div class="col-sm-3 well">
      <div class="icon" style="float: right; font-size: 40px; color: green"><i class="fa fa-user"></i></div>
        <div class="tile-stats tile-white tile-white-primary" style="font-size: 30px; font-weight: bold;">
            <div class="num" data-start="0" data-end="
            	<?php
		            $query = "SELECT * FROM tbl_sbfprimaryshareinfo WHERE status='0'";
		            $msg = $db->select($query);
		            if ($msg) {
		               $count = mysqli_num_rows($msg);
		                    echo "".$count."";
		            }else{
		                echo "0";
		            }
		        ?>
            " data-duration="1500" data-delay="0">
            </div>
            <h3>SBF Share Holder</h3>
        </div>
    </div>

    <div class="col-sm-3 well">
    	<div class="icon" style="float: right; font-size: 40px; color: green"><i class="fa fa-user"></i></div>
        <div class="tile-stats tile-white tile-white-primary" style="font-size: 30px; font-weight: bold;">
            <div class="num" data-start="0" data-end="
            	<?php
		            $query = "SELECT * FROM tbl_sbfgeneralinvestorinfo WHERE status='0'";
		            $msg = $db->select($query);
		            if ($msg) {
		               $count = mysqli_num_rows($msg);
		                    echo "".$count."";
		            }else{
		                echo "0";
		            }
		        ?>
            " data-duration="1500" data-delay="0">
            </div>
            <h3>SBF DPS Investor</h3>
        </div>
    </div>


    <div class="col-sm-3 well">
    	<div class="icon" style="float: right; font-size: 40px; color: green"><i class="fa fa-user"></i></div>
        <div class="tile-stats tile-white tile-white-primary" style="font-size: 30px; font-weight: bold;">
            <div class="num" data-start="0" data-end="
            	<?php
		            $query = "SELECT * FROM tbl_ptcpersonalinfo WHERE status='0'";
		            $msg = $db->select($query);
		            if ($msg) {
		               $count = mysqli_num_rows($msg);
		                    echo "".$count."";
		            }else{
		                echo "0";
		            }
		        ?>
            " data-duration="1500" data-delay="0">
            </div>
            <h3>PTC Customer</h3>
        </div>
    </div>


    <div class="col-sm-3 well">
    	<div class="icon" style="float: right; font-size: 40px; color: green"><i class="fa fa-user"></i></div>
        <div class="tile-stats tile-white tile-white-primary" style="font-size: 30px; font-weight: bold;">
            <div class="num" data-start="0" data-end="

            	<?php
		            $query = "SELECT SUM(productPrice) FROM tbl_ptcpersonalinfo";
		            $msg = $db->select($query);
		            if ($msg) {
		               $count = mysqli_num_rows($msg);
		                    echo "".$count."";
		            }else{
		                echo "0";
		            }
		        ?>

		        

            " data-duration="1500" data-delay="0">
            </div>
            <h3>PTC Prodcut Price</h3>
        </div>
    </div>

    <div class="col-sm-3 well">
    	<div class="icon" style="float: right; font-size: 40px; color: green"><i class="fa fa-user"></i></div>
        <div class="tile-stats tile-white tile-white-primary" style="font-size: 30px; font-weight: bold;">
            <div class="num" data-start="0" data-end="
            	<?php
		            $query = "SELECT SUM(downPayment) FROM tbl_ptcpersonalinfo";
		            $msg = $db->select($query);
		            if ($msg) {
		               $count = mysqli_num_rows($msg);
		                    echo "".$count."";
		            }else{
		                echo "0";
		            }
		        ?>
            " data-duration="1500" data-delay="0">
            </div>
            <h3>PTC Donw Payment</h3>
        </div>
    </div>

    <div class="col-sm-3 well">
    	<div class="icon" style="float: right; font-size: 40px; color: green"><i class="fa fa-user"></i></div>
        <div class="tile-stats tile-white tile-white-primary" style="font-size: 30px; font-weight: bold;">
            <div class="num" data-start="0" data-end="
            	<?php
		            $query = "SELECT SUM(inst_amount) FROM tbl_ptcpersonalinfo";
		            $msg = $db->select($query);
		            if ($msg) {
		               $count = mysqli_num_rows($msg);
		                    echo "".$count."";
		            }else{
		                echo "0";
		            }
		        ?>
            " data-duration="1500" data-delay="0">
            </div>
            <h3>PTC Installment</h3>
        </div>
    </div>

    <div class="col-sm-3 well">
    	<div class="icon" style="float: right; font-size: 40px; color: green"><i class="fa fa-user"></i></div>
        <div class="tile-stats tile-white tile-white-primary" style="font-size: 30px; font-weight: bold;">
            <div class="num" data-start="0" data-end="
            	<?php
		            $query = "SELECT SUM(fdr_amount) FROM tbl_ptcpersonalinfo";
		            $msg = $db->select($query);
		            if ($msg) {
		               $count = mysqli_num_rows($msg);
		                    echo "".$count."";
		            }else{
		                echo "0";
		            }
		        ?>
            " data-duration="1500" data-delay="0">
            </div>
            <h3>PTC FDR</h3>
        </div>
    </div>

    <div class="col-sm-3 well">
    	<div class="icon" style="float: right; font-size: 40px; color: green"><i class="fa fa-user"></i></div>
        <div class="tile-stats tile-white tile-white-primary" style="font-size: 30px; font-weight: bold;">
            <div class="num" data-start="0" data-end="
            	<?php
		            $query = "SELECT SUM(admissionfee) FROM tbl_ptcpersonalinfo";
		            $msg = $db->select($query);
		            if ($msg) {
		               $count = mysqli_num_rows($msg);
		                    echo "".$count."";
		            }else{
		                echo "0";
		            }
		        ?>
            " data-duration="1500" data-delay="0">
            </div>
            <h3>PTC Admission Fee</h3>
        </div>
    </div>

  </div>
  </div>


<?php include 'inc/footer.php' ?>