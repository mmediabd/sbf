<?php include 'inc/header.php' ?>

<?php
    if (!isset($_GET['editId']) || $_GET['editId'] == NULL) {
        echo "<script>window.location = 'sbfOthers.php';</script>";
        //header("Location:sbfPrimaryshareinfo.php");
    } else {
        $id = $_GET['editId'];
    }
?>
<div id="user-profile-3" class="user-profile row">
<div class="row">
	<div class="col-xs-12">

<!--Form Start-->
<div class="page-header">
		<h1 class="text-center">Shadhin Bahumukhi Firm (SBF)</h1> 
		<h4 class="text-center"><u>Edit Data</u></h4>
	</div><!-- /.page-header -->

	<div class="row">
		<div class="col-xs-12">
			<!-- PAGE CONTENT BEGINS -->
			<?php
			    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			        $amount   		  = $fm->validation($_POST['amount']);
			        $entry_date   	  = $fm->validation($_POST['entry_date']);
			        $editDate   	  = $fm->validation($_POST['editDate']);
			        $vauchar          = $fm->validation($_POST['vauchar']);
			        $purpose          = $fm->validation($_POST['purpose']);
			        $client           = $fm->validation($_POST['client']);
			        $remark 		  = $fm->validation($_POST['remark']);
			        $username 		  = $fm->validation($_POST['username']);

			        $amount	  	 	  = mysqli_real_escape_string($db->link, $amount);
			        $entry_date	      = mysqli_real_escape_string($db->link, $entry_date);
			        $editDate	      = mysqli_real_escape_string($db->link, $editDate);
			        $vauchar    	  = mysqli_real_escape_string($db->link, $vauchar);
			        $purpose	      = mysqli_real_escape_string($db->link, $purpose);
			        $client	      	  = mysqli_real_escape_string($db->link, $client);
			        $remark		  	  = mysqli_real_escape_string($db->link, $remark);
			        $username 		  = mysqli_real_escape_string($db->link, $username);
			        $userid 		  = mysqli_real_escape_string($db->link, $_POST['userid']);


    if ($amount == "" || $entry_date == "" || $vauchar == "" || $purpose == "" || $client == "") {
    echo "<div class='alert alert-danger' role='alert' id='deletesuccess'>
    			<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
					<span aria-hidden='true'><i class='ace-icon fa fa-times'></i></span>
				</button>
            	<strong>Warning!</strong> Field must not be empty.!!
           </div>";
        } else {
        $query = "UPDATE tbl_sbfOtherscost
        SET
	    amount  		= '$amount',
	    entry_date		= '$entry_date',
	    editDate		= '$editDate',
	    vauchar			= '$vauchar',
	    purpose			= '$purpose',
	    client			= '$client',
	    remark 			= '$remark'
        WHERE id 		= '$id'";
        $updated_row = $db->update($query);

        if ($updated_row) {
        	echo "<script>window.location ='sbfOthers.php';</script>";
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
    $query = "select * from tbl_sbfOtherscost where id = '$id' order by id desc";
    $getData = $db->select($query);
    while ($result = $getData->fetch_assoc()) {
    
?>
			<form action="" method="POST" class="form-horizontal text-center">

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Cost Amount :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="amount" value="<?php echo $result['amount'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Issue Date :</label>
					<div class="col-xs-8 col-sm-7">
						<input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo $result['entry_date'];?>" data-date-format="dd-mm-yyyy"  name="entry_date" readonly="" />
					</div>
				</div>

				<div class="form-group hidden">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Edit Date :</label>
					<div class="col-xs-8 col-sm-7">
						<input class="date-picker col-xs-10 col-sm-5" id="form-field-date" type="text" value="<?php echo date('d-m-Y, g:i a'); ?>" data-date-format="dd-mm-yyyy"  name="editDate" readonly="" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Vauchar No :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="vauchar" value="<?php echo $result['vauchar'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Purpose Of Cost :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="purpose" value="<?php echo $result['purpose'];?>">
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label" for="form-field-1"> Client :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="client" value="<?php echo $result['client'];?>"/>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-4 col-sm-5 control-label " for="form-field-1"> Remark's :</label>
					<div class="col-xs-8 col-sm-7">
						<input type="text" class="col-xs-10 col-sm-5" name="remark" value="<?php echo $result['remark'];?>"/>
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
						<input type="submit" name="submit" class="btn btn-lg btn-success btn-round" value="Update">
					</div>
				</div>
			</form>
<?php } ?>
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