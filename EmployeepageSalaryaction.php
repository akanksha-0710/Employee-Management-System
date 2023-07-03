<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');
?>
<div id="flash" class="flash"></div>

<script type="text/javascript">
// Paging Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".pages").click(function() {
var element = $(this);
var del_id = element.attr("id");
var info = 'page=' + del_id;

if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "EmployeepageSalaryaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>



<script type="text/javascript">
// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".ABCD").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'id=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For delete..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "EmployeepageSalaryaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>



<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$delete = "DELETE FROM employeesalary WHERE SID='$id'";
$conn->query( $delete);
}
?>



<div class="table-responsive">
<h4 class="margin-bottom-15">Employee Salary</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>Salary ID</b></td>
<td><b>Employee ID</b></td>
<td><b>Name</b></td>
<td><b>Mobile No</b></td>
<td><b>Position</b></td>
<td><b>From Date</b></td>
<td><b>To Date</b></td>
<td><b>Attend Days</b></td>
<td><b>Per Day Salary</b></td>
<td><b>Extra Pay</b></td>
<td><b>Total Salary</b></td>
</tr></thead>
<tbody>
<?PHP
$SID="";
if(isset($_POST['SID']) and  $_POST['SID']!='')
{
$SID=$_POST['SID'];
}

$select_table = "select * from employeetable,employeesalary where employeetable.Eid=employeesalary.EID and employeetable.Eid='".$_SESSION['useridemployee']."'";

$select_table =$select_table." order by employeesalary.SID";
$fetch= $conn->query($select_table);

while($row = $fetch->fetch_assoc())
{
?>
<TR>			
<TD><?php echo $row['SID']; ?></TD>
<TD><?php echo $row['Eid']; ?></TD>
<TD><?php echo $row['Ename']; ?></TD>
<TD><?php echo $row['Emobno']; ?></TD>
<TD><?php echo $row['employeetype']; ?></TD>

<TD><?php echo $row['FromDate']; ?></TD>
<TD><?php echo $row['Todate']; ?></TD>
<TD><?php echo $row['Daycount']; ?></TD>
<TD><?php echo $row['Perdaysalary']; ?></TD>
<TD><?php echo $row['Otherpay']; ?></TD>
<TD><?php echo $row['Totalsalary']; ?></TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
 				
</div>