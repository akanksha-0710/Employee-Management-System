<?php
include('db.php');
 
if(isset($_POST['content']))
{

$content=$conn->real_escape_string($_POST['content']);
$content1=$conn->real_escape_string($_POST['content1']);
$content2=$conn->real_escape_string($_POST['content2']);
$content3=$conn->real_escape_string($_POST['content3']);
$RD=date('Y-m-d');

$conn->query("insert into employeetable(Ename,Eemail,Epass,Emobno,employeetype,RFID) values ('$content','$content1','$content2','$content3','','')");
echo "<font style='color:#0000FF;'>Signup Successful.!</font><br><br><br>";
}

?>