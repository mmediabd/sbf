<html>
	<head>
		<title>	php fill combobox from database</title>
	</head>
	<body bgcolor="#E0E0E0">
	
	<h2>Welcome to php tutorial on php fill combobox from database</h2>
	
	<br><br>
 
<form method="post" action="index2.php">	
<?php
//============= Variables for Database ===================
$hostname = "localhost";
$username = "root";
$password = "";
$database = "sbf_ms";
//========================================================
 
//Connection...
$link = mysql_connect($hostname, $username, $password);
 
//Set Database
mysql_select_db($database,$link);
 
 
$query = "select * from tbl_ptcproductinfo";
$result = mysql_query($query);	
 
echo "Select tbl_ptcproductinfo : ";
echo "<select name=\"studentid\">";
 while($row=mysql_fetch_array($result))
 { 
       echo "<option value='".$row['sid']."'>".$row['sname']."</option>";
 }
 echo "</select>";
 echo "<br><br>";
 
 
$query = "select * from tbl_ptcproductinfo";
$result = mysql_query($query);	
 
echo "Select Subject : ";
echo "<select name=\"subjectid\">";
 while($row=mysql_fetch_array($result))
 { 
       echo "<option value='".$row['subid']."'>".$row['subname']."</option>";
 }
 echo "</select>";
 
 
 ?>
 <br>
 
 
 <br>
 <input type="submit" value="Enrolment">
 </form>
 
 
 <br>
 
<?php
 
$query = "select enrolment.eid as a, student.sname as b,subject.subname as c from student,subject,enrolment where enrolment.sid = student.sid and enrolment.subid = subject.subid";
$result = mysql_query($query);
 
echo "<br><br>";
echo "<table border=\"1\">";
echo "<tr><td>Enrollment id</td><td>Student Name </td><td>Enrolled in Subject </td><td>Remove Assignment </td> </tr>";
 
while($row=mysql_fetch_array($result))
{
	
	$eid=$row['a'];
	$sname=$row['b'];
	$subname=$row['c'];
	
	
	echo "<tr><td>$eid</td><td>$sname</td><td>$subname</td><td> <a href=\"remove.php?id=$eid\" onclick=\"return confirm('Are you sure?');\"> Remove </a></td></tr>";
}
echo "</table>";
 
?>
 
 <?php
if(isset($_SESSION['msg']))
{
	//echo ""$_SESSION['msg'];
echo "<script language=\"JavaScript\">alert(\"".$_SESSION["msg"]."\");</script>";
unset($_SESSION['msg']);
}
?>