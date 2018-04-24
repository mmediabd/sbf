<?php 
	require_once('lib/Database.php');
	$search=$_POST['search'];
	
	$sql = "SELECT * FROM tbl_sbfgeneralinvestorinfo WHERE applicnt_name LIKE '$search%'";

	$result = $conn->query($sql);

	$count=$result->num_rows;
	//echo $count; 
	?>
	<table class="table table-striped table-bordered">
	<tr>
		<th>Name</th>

	</tr>
	<?php

	if ($count>0) {
		while($data=$result->fetch_assoc())
		{
		echo "<tr>";
		echo "<td>".$data['applicnt_name']."</td>";
		echo "</tr>";
		}
	}
	else{
		echo "<div class='alert alert-danger alert-dismissible' id='deletesuccess' role='alert'>
			<strong>Error! </strong>Data not found.</div>";
	}
?>
</table>