<?php
include('db.php');
?>
<div id="flash" class="flash"></div>


<script type="text/javascript">
// Update Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Updatesubmit_button").click(function() {
var dataString = $('#form').serialize()+'&'+$('#formd').serialize();

document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "EmployeeAttendanceCountaction.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});

return false;
});
});
</script>



<script type="text/javascript">
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Edit").click(function() {
var element = $(this);
var E_id = element.attr("id");
var E_count = element.attr("alt");

var info = $('#formd').serialize()+'&ide='+ E_id+'&idcount='+ E_count;

if(info=='')
{
alert("Select For Edit..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "EmployeeAttendanceCountaction.php",
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
$delete = "DELETE FROM employeeattend WHERE Aid='$id'";
$conn->query( $delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from employeetable where Eid=".$id;
$fetch= $conn->query($select_table);
while($row = $fetch->fetch_assoc())
{
?>
<div id="cp_contact_form">
<form  method="post" name="form" id="form" action="">
<table class="table table-striped table-hover table-bordered">

<TR><TD><b>Employee ID</b></TD><TD><?php echo $row['Eid']; ?></TD></TR>
<TR><TD><b>Employee Name</b></TD><TD><?php echo $row['Ename']; ?></TD></TR>
<TR><TD><b>Employee Email</b></TD><TD><?php echo $row['Eemail']; ?></TD></TR>
<TR><TD><b>Employee Mobile</b></TD><TD><?php echo $row['Emobno']; ?></TD></TR>
<TR><TD><b>Employee Position</b></TD><TD><?php echo $row['employeetype']; ?></TD></TR>
<TR><TD><b>RF-ID</b></TD><TD><?php echo $row['RFID']; ?></TD></TR>
<TR><TD><b>Salary Date From</b></TD><TD><?php echo $_POST['DateSIDFrom']; ?>

<input type="hidden" name="ucontent" value="<?php echo $_POST['ide']; ?>">
<input type="hidden" name="ucontent1" value="<?php echo $_POST['idcount']; ?>">
<input type="hidden" name="ucontent2" value="<?php echo $_POST['DateSIDFrom']; ?>">
<input type="hidden" name="ucontent3" value="<?php echo $_POST['DateSIDTo']; ?>">

</TD></TR>
<TR><TD><b>Salary Date To</b></TD><TD><?php echo $_POST['DateSIDTo']; ?></TD></TR>
<TR><TD><b>Salary Per Day</b></TD><TD><input Type="text" name="ucontent4"  class="form-control"></TD></TR>
<TR><TD><b>Other Salary Payout</b></TD><TD><input Type="text" name="ucontent5"  class="form-control"></TD></TR>

<TR><TD></TD><TD>
<input type="button" value="Set" name="submit" class="Updatesubmit_button" style="width:74px;height:35px;border:1px #C0C0C0 solid;background-color:#000000;color:#FFFFFF;font-family:Arial;font-weight:bold;font-size:13px;">
</TD></TR>

</table> 
</form>
</div>

<?php
}
}

?>


<?php
if(isset($_POST['ucontent']))
{

$ucontent=$conn->real_escape_string($_POST['ucontent']);
$ucontent1=$conn->real_escape_string($_POST['ucontent1']);
$ucontent2=$conn->real_escape_string($_POST['ucontent2']);
$ucontent3=$conn->real_escape_string($_POST['ucontent3']);
$ucontent4=$conn->real_escape_string($_POST['ucontent4']);
$ucontent5=$conn->real_escape_string($_POST['ucontent5']);

$Totalsalary=($ucontent1*$ucontent4)+$ucontent5;

$conn->query("INSERT INTO employeesalary(EID,FromDate,Todate,Daycount,Perdaysalary,Otherpay,Totalsalary) VALUES ('$ucontent','$ucontent2','$ucontent3','$ucontent1','$ucontent4','$ucontent5','$Totalsalary')");

echo "<script>alert('Employee Salary Out.!');</script>";
}
?>

<div class="table-responsive">
<h4 class="margin-bottom-15">Attendance Count From Date :<?PHP echo $_POST['DateSIDFrom']; ?>-To Date : <?PHP echo $_POST['DateSIDTo']; ?></h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>Employee ID</b></td>
<td><b>Employee Name</b></td>
<td><b>Employee Mobile No</b></td>
<td><b>Employee Position</b></td>
<td><b>Count</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
$SID="";
if(isset($_POST['SID']) and  $_POST['SID']!='')
{
$SID=$_POST['SID'];
}

$DateSIDFrom="";
if(isset($_POST['DateSIDFrom']) and  $_POST['DateSIDFrom']!='')
{
$DateSIDFrom=" and attenddatetime >='".$_POST['DateSIDFrom']."'";
}

$DateSIDTo="";
if(isset($_POST['DateSIDTo']) and  $_POST['DateSIDTo']!='')
{
$DateSIDTo=" and attenddatetime <='".$_POST['DateSIDTo']."'";
}

$select_table = "select employeetable.*,count(employeetable.Eid) as Tcount from employeetable,employeeattend where employeetable.Eid=employeeattend.EID and concat(Ename,' ',Emobno) like '%".$SID."%'".$DateSIDFrom.$DateSIDTo;

$select_table =$select_table." Group by employeetable.Eid order by employeetable.Eid";
$fetch= $conn->query($select_table);

while($row = $fetch->fetch_assoc())
{
?>
<TR>
<TD><?php echo $row['Eid']; ?></TD>
<TD><?php echo $row['Ename']; ?></TD>
<TD><?php echo $row['Emobno']; ?></TD>
<TD><?php echo $row['employeetype']; ?></TD>
<TD><?php echo $row['Tcount']; ?></TD>
<TD><a href="#" class="Edit" alt="<?php echo $row['Tcount']; ?>" id="<?php echo $row['Eid']; ?>">[ Set Salary ]</a>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
 				
</div>