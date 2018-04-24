<!DOCTYPE html>
<html>
<head>
<style>
/*
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
*/
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','','sbf');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM tbl_ptcpersonalinfo WHERE acc_number = '".$q."'";
$result = mysqli_query($con,$sql);

echo "<table class='table-responsive' style='width:100%'>
<tr>
<th>Customer Name</th>
<th>Join Date</th>
<th>Mobile No.</th>
<th>NID Number</th>
<th>Address</th>
<th>Nomini Name</th>
<th>Nomini Rela.</th>
<th>Nomini Add.</th>
<th>Product Name</th>
<th>Product Price_(Tk.)</th>
<th>Down Pay.</th>
<th>Inst. Amount</th>
<th>FDR Amount</th>
<th>Cous. Cata.</th>
<th>Coll System</th>
<th>Group Name</th>
<th>Picture</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['applicant_name'] . "</td>";
    echo "<td>" . $row['joining_date'] . "</td>";
    echo "<td>" . $row['mobile_number'] . "</td>";
    echo "<td>" . $row['NIDNumber'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['Nominisname'] . "</td>";
    echo "<td>" . $row['relation'] . "</td>";
    echo "<td>" . $row['nomini_address'] . "</td>";
    echo "<td>" . $row['prodcutName'] . "</td>";
    echo "<td>"."Tk. ". $row['productPrice'] . "</td>";
    echo "<td>" . $row['downPayment'] . "</td>";
    echo "<td>" . $row['inst_amount'] . "</td>";
    echo "<td>" . $row['fdr_amount'] . "</td>";
    echo "<td>" . $row['customarCatagory'] . "</td>";
    echo "<td>" . $row['collectionday'] . "</td>";
    echo "<td>" . $row['groupname'] . "</td>";
    echo "<td><img src='" . $row['image'] . "' width='40' height='40'/></td>";
    echo "</tr>";
}

echo "</table>";
mysqli_close($con);
?>
</body>
</html>