<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');
?>
<div id="flash" class="flash"></div>


<script type="text/javascript">
// Update Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Updatesubmit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();;

document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "EmployeeAttendanceaction.php",
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
url: "EmployeeAttendanceaction.php",
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
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Edit").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'ide=' + del_id+'&page='+ textcontent2;

if(info=='')
{
alert("Select For Edit..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "EmployeeAttendanceaction.php",
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
url: "EmployeeAttendanceaction.php",
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

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Employee ID</label>
                    <input type="text" name="ucontent" size="0" maxlength="0" value="<?php echo $row['Eid']; ?>" class="form-control" id="lastName" Placeholder="Name">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Employee Name</label>
                    <input type="text" name="ucontent1"  value="<?php echo $row['Ename']; ?>" class="form-control" id="firstName" Placeholder="Email">        
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Employee Email</label>
                    <input type="text" name="ucontent2" value="<?php echo $row['Eemail']; ?>" class="form-control" id="firstName" Placeholder="Email">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Employee Password</label>
                    <input type="text" name="ucontent3"  value="<?php echo $row['Epass']; ?>" class="form-control" id="lastName" Placeholder="Password">        
                  </div>
                </div>
				<div class="row">
                  <div class="col-md-12 margin-bottom-15">
                    <label for="firstName" class="control-label">Employee Mobile No</label>
                    <input type="text" name="ucontent4" value="<?php echo $row['Emobno']; ?>" class="form-control" id="firstName" Placeholder="Mobile No">           
                  </div>
                </div>

			  <div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label>Employee Position : </label>
                    <select type="text" name="ucontent5" class="form-control" id="Emailaddress" >
					<option value="<?php echo $row['employeetype']; ?>"><?php echo $row['employeetype']; ?></option>
					<option value="Worker">Worker</option>
					<option value="Clerks">Clerks</option>
					<option value="Team Leader">Team Leader</option>
					<option value="Officer">Officer</option>
					<option value="Manager">Manager</option>
					</select>	
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label>RF-ID</label>
                    <input type="text" name="ucontent6" class="form-control" id="Emailaddress" value="<?php echo $row['RFID']; ?>">  
                  </div>
                </div>   

              <div class="row">
                <div class="col-md-6 margin-bottom-15">
				<label for="firstName" class="control-label"><BR><BR></label>
                  <button type="button" name="submit" class="Updatesubmit_button">Update</button>   <BR><BR>
                </div>
              </div>
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
$ucontent6=$conn->real_escape_string($_POST['ucontent6']);

$conn->query("update employeetable set Ename='$ucontent1', Eemail='$ucontent2', Epass='$ucontent3', Emobno='$ucontent4', employeetype='$ucontent5',RFID='$ucontent6' where Eid=$ucontent");

echo "<script>alert('Employee Updated');</script>";
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
<td><b>DateTime</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
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

$select_table = "select * from employeetable,employeeattend where employeetable.Eid=employeeattend.EID and employeetable.Eid='".$_SESSION['useridemployee']."'".$DateSIDFrom.$DateSIDTo;

$select_table =$select_table." order by employeetable.Eid";
$fetch= $conn->query($select_table);

while($row = $fetch->fetch_assoc())
{
?>
<TR>
<TD><?php echo $row['Eid']; ?></TD>
<TD><?php echo $row['Ename']; ?></TD>
<TD><?php echo $row['Emobno']; ?></TD>
<TD><?php echo $row['employeetype']; ?></TD>
<TD><?php echo $row['attenddatetime']; ?></TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
 				
</div>