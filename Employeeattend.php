<?php
include('db.php');
if(isset($_POST['RFKEY']))
{

$content=$_POST['RFKEY'];
$Eid="";
$EName="";
$result=$conn->query("select * From employeetable where RFID='".$content."'");
while($row = $result->fetch_assoc())
{	
$Eid=$row['Eid'];
$EName=$row['Ename'];
}

if($Eid!="")
{
$attdate=date('Y-m-d');
$result1=$conn->query("select * From employeeattend where EID='".$Eid."' and attenddatetime like '%".$attdate."%'");
$count=$result1->num_rows;
if($count<=0)
{
$conn->query("insert into employeeattend(EID,attenddatetime) values('$Eid',now())");
echo "<font style='color:#0000FF;'>hi ".$EName.",Your Todays Attendance Set Successful.!</font><br><br><br>";
}
else{
echo "<font style='color:#00FF00;'>hi ".$EName.",Your Todays Attendance Already Set.!</font><br><br><br>";
}

}
else
{
echo "<font style='color:#FF0000;'>Employee Record Not Found.!</font><br><br><br>";
}

}

?>