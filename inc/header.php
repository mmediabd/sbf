<?php ob_start(); ?>
<?php
    include 'lib/session.php';
    session::checksession();
?>

<?php include 'config/config.php';?>
<?php include 'lib/Database.php';?>
<?php include 'helpers/format.php';?>
<?php include 'helpers/functions.php';?>

<?php
  $db = new Database();
  $fm = new format();
?>


<?php date_default_timezone_set('Asia/Dhaka'); ?>

<?php
    if (isset($_GET['action']) && $_GET['action'] == "logout") {
        session:: destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>SBF Managment System</title>

		<meta name="Shadhin Bahumukhi Firm Managment System (SBF)" content="Perfect Trading Corporation (PTC)" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="css/bootstrap.min.css" />
		<link rel="stylesheet" href="font-awesome/4.2.0/css/font-awesome.min.css" />
    <!--
    <link rel="stylesheet" href="css/jquery-ui.custom.min.css" />
		-->
		<!-- text fonts -->
		<link rel="stylesheet" href="fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="css/jquery-ui.min.css" />
    <link rel="stylesheet" href="css/datepicker.min.css" />
    <link rel="stylesheet" href="css/chosen.min.css" />

</style>
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="js/ace-extra.min.js"></script>

		<!-- fade out start -->
		<script src="js/fadeOut.js"></script>

		<script type="text/javascript"> 
	      $(document).ready( function() {
	        $('#deletesuccess').delay(2000).fadeOut();
	      });
	    </script>
		<!-- fade out end -->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="js/html5shiv.min.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->

<script>
	function showUser(str) {
	    if (str == "") {
	        document.getElementById("txtHint").innerHTML = "";
	        return;
	    } else {
	        if (window.XMLHttpRequest) {
	            // code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp = new XMLHttpRequest();
	        } else {
	            // code for IE6, IE5
	            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	        }
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("txtHint").innerHTML = this.responseText;
	            }
	        };
	        xmlhttp.open("GET","getuser.php?q="+str,true);
	        xmlhttp.send();
	    }
	}
</script>
	<!--Print Option Start-->
	  <script type="text/javascript">
	    function printlayer(layer)
	    {
	      var generator = window.open(",'name,");
	      var layetext = document.getElementById(layer);
	      generator.document.write(layetext.innerHTML.replace("Print Me"));

	      generator.document.close();
	      generator.print();
	      generator.close();
	    }
	  </script>
	<!--Print Option End-->

	</head>

<body class="no-skin">
	<div id="navbar" class="navbar navbar-default">
		<script type="text/javascript">
        try{ace.settings.check('navbar' , 'fixed')}catch(e){}
      </script>

		<div class="navbar-container" id="navbar-container">
			<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
				<span class="sr-only">Toggle sidebar</span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>

				<span class="icon-bar"></span>
			</button>

			<div class="navbar-header pull-left">
				<a href="index.php" class="navbar-brand">
					<small class="">
						<span class="glyphicon glyphicon-home"> SBF</span>
					</small>
				</a>
			</div>

			<div class="navbar-buttons navbar-header pull-right" role="navigation"> 
				<ul class="nav ace-nav">
					<li class="light-blue">
						<a data-toggle="dropdown" href="#" class="dropdown-toggle">
							<span class=""></span>
							<span class="user-info">
								<small>Welcome To</small>
								<?php echo Session::get('username');?>
							</span>

							<i class="ace-icon fa fa-caret-down"></i>
						</a>

						<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
							<li>
								<a href="profile.php">
									<i class="ace-icon fa fa-user"></i>
									Profile
								</a>
							</li>

							<li class="divider"></li>

							<li>
					          <?php
               				if (isset($_GET['action']) && $_GET['action'] == "logout") {
                    		session:: destroy();
                			}
            			  ?>
								<a href="?action=logout">
									<i class="ace-icon fa fa-power-off"></i>
									Logout
								</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div><!-- /.navbar-container -->
	</div>

	<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-success">
							<i class="ace-icon fa fa-signal"></i>
						</button>

						<button class="btn btn-info">
							<i class="ace-icon fa fa-pencil"></i>
						</button>

						<button class="btn btn-warning">
							<i class="ace-icon fa fa-users"></i>
						</button>

						<button class="btn btn-danger">
							<i class="ace-icon fa fa-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="">
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

<!--SBF Managment Start-->
<?php if (Session::get('userRole') == '1') { ?>

		<li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa  fa-folder-open"></i>
              <span class="menu-text">
                SBF Menagment
              </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="#" class="dropdown-toggle">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Primary Share
                  <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                  <li class="">
                    <a href="sbfPrimaryshareinfo.php">
                      <i class="menu-icon fa fa-caret-right"></i>
                      Personal Information
                    </a>
                    <b class="arrow"></b>
                  </li>
                  <li class="">
                    <a href="primaryshareinputOutput.php">
                      <i class="menu-icon fa fa-caret-right"></i>
                      Share Input &amp; Output
                    </a>
                    <b class="arrow"></b>
                  </li>
                </ul>
              </li>

              <li class="">
                <a href="#" class="dropdown-toggle">
                  <i class="menu-icon fa fa-caret-right"></i>
                  General Investor
                  <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                  <li class="">
                    <a href="sbfGeneralinvestorinfo.php">
                      <i class="menu-icon fa fa-caret-right"></i>
                      Personal Information
                    </a>
                    <b class="arrow"></b>
                  </li>
                  <li class="">
                    <a href="dpsinputOutput.php">
                      <i class="menu-icon fa fa-caret-right"></i>
                      DPS Input &amp; Output
                    </a>
                    <b class="arrow"></b>
                  </li>
                </ul>
              </li>

              <li class="">
                <a href="sbftoSisternconcern.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  SBF To Sister Concern
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="SisternconcernTosbf.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Sister Concern To SBF
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="bankOrPersonalLoan.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Bank/Personal Loan &amp; Return
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="sbfOthers.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Others Cost
                </a>
                <b class="arrow"></b>
              </li>
          </li>
        </ul>


	<li class="">
        <a href="#" class="dropdown-toggle">
          <i class="menu-icon fa fa-folder-open"></i>
          SBF All Report
          <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>

        <ul class="submenu">
          <li class="">
            <a href="sbfdailyReport.php">
              <i class="menu-icon fa fa-caret-right"></i>
              Daily Report
            </a>
            <b class="arrow"></b>
          </li>

          <li class="">
            <a href="#">
              <i class="menu-icon fa fa-caret-right"></i>
              Personal Report
            </a>
            <b class="arrow"></b>
          </li>

          <li class="">
            <a href="#">
              <i class="menu-icon fa fa-caret-right"></i>
              Primary Share Report
            </a>
            <b class="arrow"></b>
          </li>

          <li class="">
            <a href="">
              <i class="menu-icon fa fa-caret-right"></i>
              Generel Investor Report
            </a>
            <b class="arrow"></b>
          </li>

          <li class="">
            <a href="#">
              <i class="menu-icon fa fa-caret-right"></i>
             Summary Report
            </a>
            <b class="arrow"></b>
          </li>
        </ul>
    </li>

    <li class="">
		<a href="profile.php">
			<i class="menu-icon fa fa-caret-right"></i>
			Profile
		</a>
		<b class="arrow"></b>
	</li>

<?php } ?>
<!--SBF Managment End-->

<!--PTC Managment Start-->
<?php if (Session::get('userRole') == '2') { ?>
          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-folder-open"></i>
              <span class="menu-text">
                PTC Menagment
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="ptcpersonalinfo.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Customer information
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href='installment.php'>
                  <i class="menu-icon fa fa-caret-right"></i>
                  FDR & Installment
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="fdrmidbackandreturn.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  FDR Mid Back &amp; Return
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="loan.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  B/P Loan & Return
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="#" class="dropdown-toggle">
                  <i class="menu-icon fa fa-caret-right"></i>
                  PTC Store
                  <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                  <li class="">
                    <a href="store_input.php">
                      <i class="menu-icon fa fa-caret-right"></i>
                      Store Input
                    </a>
                    <b class="arrow"></b>
                  </li>
                  <li class="">
                    <a href="store_output.php">
                      <i class="menu-icon fa fa-caret-right"></i>
                      Store Output
                    </a>
                    <b class="arrow"></b>
                  </li>
                </ul>
              </li>

              <li class="">
                <a href="sbftoptc.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  SBF To PTC
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="ptctosbf.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  PTC To SBF
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="others.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Others Cost
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>


      	<li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-folder-open"></i>
              PTC All Report
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="ptcdailyReport.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Daily Report
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="ptcPersonalReport.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Personal Report
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="#">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Salling Report
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="ptcCollectionSheet.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Collection Sheet
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="#">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Summary Report
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
        </li>

        <li class="">
			<a href="pricing.php">
				<i class="menu-icon fa fa-caret-right"></i>
				Pricing Table
			</a>
			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="invoice.php">
				<i class="menu-icon fa fa-caret-right"></i>
				Invoice
			</a>
			<b class="arrow"></b>
		</li>

    <li class="">
			<a href="profile.php">
				<i class="menu-icon fa fa-caret-right"></i>
				Profile
			</a>
			<b class="arrow"></b>
		</li>
<!--PTC Managment End-->

<?php } ?>



<!--...........admin panel...............-->
<?php if (Session::get('userRole') == '0') { ?>
			<li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-folder-open"></i>
              <span class="menu-text">
                SBF Menagment
              </span>

              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="#" class="dropdown-toggle">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Primary Share
                  <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                  <li class="">
                    <a href="sbfPrimaryshareinfo.php">
                      <i class="menu-icon fa fa-caret-right"></i>
                      Personal Information
                    </a>
                    <b class="arrow"></b>
                  </li>
                  <li class="">
                    <a href="primaryshareinputOutput.php">
                      <i class="menu-icon fa fa-caret-right"></i>
                      Share Input &amp; Output
                    </a>
                    <b class="arrow"></b>
                  </li>
                </ul>
              </li>

              <li class="">
                <a href="#" class="dropdown-toggle">
                  <i class="menu-icon fa fa-caret-right"></i>
                  General Investor
                  <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                  <li class="">
                    <a href="sbfGeneralinvestorinfo.php">
                      <i class="menu-icon fa fa-caret-right"></i>
                      Personal Information
                    </a>
                    <b class="arrow"></b>
                  </li>
                  <li class="">
                    <a href="dpsinputOutput.php">
                      <i class="menu-icon fa fa-caret-right"></i>
                      DPS Input &amp; Output
                    </a>
                    <b class="arrow"></b>
                  </li>
                </ul>
              </li>

              <li class="">
                <a href="sbftoSisternconcern.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  SBF To Sister Concern
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="SisternconcernTosbf.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Sister Concern To SBF
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="bankOrPersonalLoan.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Bank/Personal Loan &amp; Return
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="sbfOthers.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Others Cost
                </a>
                <b class="arrow"></b>
              </li>
          </li>
        </ul>


	<li class="">
        <a href="#" class="dropdown-toggle">
          <i class="menu-icon fa fa-folder-open"></i>
          SBF All Report
          <b class="arrow fa fa-angle-down"></b>
        </a>
        <b class="arrow"></b>

        <ul class="submenu">
          <li class="">
            <a href="sbfdailyReport.php">
              <i class="menu-icon fa fa-caret-right"></i>
              Daily Report
            </a>
            <b class="arrow"></b>
          </li>

          <li class="">
            <a href="#">
              <i class="menu-icon fa fa-caret-right"></i>
              Personal Report
            </a>
            <b class="arrow"></b>
          </li>

          <li class="">
            <a href="#">
              <i class="menu-icon fa fa-caret-right"></i>
              Primary Share Report
            </a>
            <b class="arrow"></b>
          </li>

          <li class="">
            <a href="#">
              <i class="menu-icon fa fa-caret-right"></i>
              Generel Investor Report
            </a>
            <b class="arrow"></b>
          </li>

          <li class="">
            <a href="#">
              <i class="menu-icon fa fa-caret-right"></i>
             Summary Report
            </a>
            <b class="arrow"></b>
          </li>
        </ul>
    </li>

<!--SBF Managment End-->

<!--PTC Managment Start-->
          <li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-folder-open"></i>
              <span class="menu-text">
                PTC Menagement
              </span>
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="ptcpersonalinfo.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Customer information
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="installment.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  FDR &amp; Installment
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="fdrmidbackandreturn.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  FDR Mid Back &amp; Return
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="loan.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  B/P Loan & Return
                </a>
                <b class="arrow"></b>
              </li>


              <li class="">
                <a href="#" class="dropdown-toggle">
                  <i class="menu-icon fa fa-caret-right"></i>
                  PTC Store
                  <b class="arrow fa fa-angle-down"></b>
                </a>
                <b class="arrow"></b>
                <ul class="submenu">
                  <li class="">
                    <a href="store_input.php">
                      <i class="menu-icon fa fa-caret-right"></i>
                      Store Input
                    </a>
                    <b class="arrow"></b>
                  </li>
                  <li class="">
                    <a href="store_output.php">
                      <i class="menu-icon fa fa-caret-right"></i>
                      Store Output
                    </a>
                    <b class="arrow"></b>
                  </li>
                </ul>
              </li>


              <li class="">
                <a href="sbftoptc.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  SBF To PTC
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="ptctosbf.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  PTC To SBF
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="others.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Others Cost
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
          </li>


      	<li class="">
            <a href="#" class="dropdown-toggle">
              <i class="menu-icon fa fa-folder-open"></i>
              PTC All Report
              <b class="arrow fa fa-angle-down"></b>
            </a>
            <b class="arrow"></b>

            <ul class="submenu">
              <li class="">
                <a href="ptcdailyReport.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Daily Report
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="ptcPersonalReport.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Personal Report
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="#">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Salling Report
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="ptcCollectionSheet.php">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Collection Sheet
                </a>
                <b class="arrow"></b>
              </li>

              <li class="">
                <a href="#">
                  <i class="menu-icon fa fa-caret-right"></i>
                  Summary Report
                </a>
                <b class="arrow"></b>
              </li>
            </ul>
        </li>


		<li class="hide">
			<a href="calendar.php">
				<i class="menu-icon fa fa-calendar"></i>

				<span class="menu-text">
					Calendar
					</span>
				</span>
			</a>

			<b class="arrow"></b>
		</li>



		<li class="">
			<a href="#" class="dropdown-toggle">
				<i class="menu-icon glyphicon glyphicon-download-alt"></i>
				<span class="menu-text">
					 Critical Path 
				 </span>

				<b class="arrow fa fa-angle-down"></b>
			</a>

			<b class="arrow"></b>

			<ul class="submenu">
				<li class="">
					<a href="addUser.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add User
					</a>
					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="sellingCatagory.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add Selling Catagory
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="collection.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add Collection Type
					</a>

					<b class="arrow"></b>
				</li>

        <li class="">
          <a href="collectionday.php">
            <i class="menu-icon fa fa-caret-right"></i>
            Add Collection Day
          </a>

          <b class="arrow"></b>
        </li>

				<li class="">
					<a href="groupName.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add Group Name
					</a>

					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="SisterConcern.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add Sister Concern
					</a>
					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="productDetails.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add Product Details
					</a>
					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="userCatagory.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add User Catagory
					</a>
					<b class="arrow"></b>
				</li>

				<li class="">
					<a href="blood_group.php">
						<i class="menu-icon fa fa-caret-right"></i>
						Add Blood Group
					</a>
					<b class="arrow"></b>
				</li>

        <li class="">
          <a href="agent.php">
            <i class="menu-icon fa fa-caret-right"></i>
            Add Agent Name
          </a>
          <b class="arrow"></b>
        </li>

        <li class="">
          <a href="marketing_officer.php">
            <i class="menu-icon fa fa-caret-right"></i>
            Add Marketing Officer
          </a>
          <b class="arrow"></b>
        </li>

			</ul>
		</li>

    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon glyphicon glyphicon-wrench"></i>
        <span class="menu-text">
           MIS Solution
         </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>

      <ul class="submenu">
        <li class="">
          <a href="sbf_share_holder_status.php">
            <i class="menu-icon fa fa-caret-right"></i>
            SBF Share Holder Status
          </a>
          <b class="arrow"></b>
        </li>

        <li class="">
          <a href="sbf_general_investor_status.php">
            <i class="menu-icon fa fa-caret-right"></i>
           SBF Investor Status
          </a>
          <b class="arrow"></b>
        </li>

        <li class="">
          <a href="ptc_customer_status.php">
            <i class="menu-icon fa fa-caret-right"></i>
            PTC Customar Status
          </a>
          <b class="arrow"></b>
        </li>

        <li class="">
          <a href="table_controler.php">
            <i class="menu-icon fa fa-caret-right"></i>
            Table Controler
          </a>
          <b class="arrow"></b>
        </li>

      </ul>
    </li>

		<li class="">
			<a href="pricing.php">
				<i class="menu-icon fa fa-th-list"></i>
        <span class="menu-text"> Pricing Table </span>
			</a>
			<b class="arrow"></b>
		</li>

		<li class="">
			<a href="invoice.php">
				<i class="menu-icon fa fa-star"></i>
        <span class="menu-text"> Invoice </span>
			</a>
			<b class="arrow"></b>
		</li>

    <li class="">
			<a href="profile.php">
				<i class="menu-icon fa fa-user"></i>
        <span class="menu-text"> Profile </span>
			</a>
			<b class="arrow"></b>
		</li>
<?php } ?>
	</ul><!-- /.nav-list -->




<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>

	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>

<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>

			<?php 
			
				function breadcrumbs($separator = ' » ', $home = 'Home') {

				$path = array_filter(explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)));
				$base_url = substr($_SERVER['SERVER_PROTOCOL'], 0, strpos($_SERVER['SERVER_PROTOCOL'], '/')) . '://' . $_SERVER['HTTP_HOST'] . '/';
				$breadcrumbs = array("<a href='\'$base_url\''>$home</a>");
				$tmp = array_keys($path);
				$last = end($tmp);
				unset($tmp);

				foreach ($path as $x => $crumb) {
				$title = ucwords(str_replace(array('.php', '_'), array('', ' '), $crumb));
				if ($x == 1){
				$breadcrumbs[] = "<a href='\'$base_url$crumb\''>$title</a>";
				}elseif ($x > 1 && $x < $last){
				$tmp = " for($i = 1; $i <= $x; $i++){ $tmp .= $path[$i] . '/'; } $tmp .= '\'>$title";
				$breadcrumbs[] = $tmp;
				unset($tmp);
				}else{
				$breadcrumbs[] = "$title";
				}
				}

				return implode($separator, $breadcrumbs);
				}
			
			?>



			<ul class="breadcrumb">
				<li>
					<i class="ace-icon fa fa-home home-icon"></i>
					<a href="index.php">Home</a>
				</li>

				<li>
					<a href="ptcpersonalinfo.php">More Pages</a>
				</li>
				<!-- <li class="active">Pricing Tables</li> -->
			</ul><!-- /.breadcrumb -->

			<div class="nav-search" id="nav-search">
				<form class="form-search">
					<span class="input-icon">
						<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
						<i class="ace-icon fa fa-search nav-search-icon"></i>
					</span>
				</form>
			</div><!-- /.nav-search -->
		</div>

		<div class="page-content">
			<div class="ace-settings-container" id="ace-settings-container">
				<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
					<i class="ace-icon fa fa-cog bigger-130"></i>
				</div>

				<div class="ace-settings-box clearfix" id="ace-settings-box">
					<div class="pull-left width-50">
						<div class="ace-settings-item">
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="no-skin" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								Inside
								<b>.container</b>
							</label>
						</div>
					</div><!-- /.pull-left -->

					<div class="pull-left width-50">
						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" />
							<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" />
							<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
						</div>

						<div class="ace-settings-item">
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" />
							<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
						</div>
					</div><!-- /.pull-left -->
				</div><!-- /.ace-settings-box -->
			</div><!-- /.ace-settings-container -->
