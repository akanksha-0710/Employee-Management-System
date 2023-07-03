<?php
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
url: "Employeeaction.php",
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
url: "Employeeaction.php",
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
url: "Employeeaction.php",
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
url: "Employeeaction.php",
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
$delete = "DELETE FROM employeetable WHERE Eid='$id'";
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
<h4 class="margin-bottom-15">All Employee Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>Employee ID</b></td>
<td><b>Employee Name</b></td>
<td><b>Employee Email</b></td>
<td><b>Employee Mobile No</b></td>
<td><b>Employee Position</b></td>
<td><b>Employee RFID</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
$SID="";
if(isset($_POST['SID']) and  $_POST['SID']!='')
{
$SID=$_POST['SID'];
}

$per_page = 10; 
$select_table = "select * from employeetable where concat(Ename,' ',Emobno) like '%".$SID."%'";
$fetch= $conn->query($select_table);
$count =  $fetch->num_rows;
$pages = ceil($count/$per_page);


if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by Eid limit $start,$per_page";
$fetch= $conn->query($select_table);
}
while($row = $fetch->fetch_assoc())
{
?>
<TR>
<TD><?php echo $row['Eid']; ?></TD>
<TD><?php echo $row['Ename']; ?></TD>
<TD><?php echo $row['Eemail']; ?></TD>
<TD><?php echo $row['Emobno']; ?></TD>
<TD><?php echo $row['employeetype']; ?></TD>
<TD><?php echo $row['RFID']; ?></TD>
<TD><a href="#" class="ABCD" id="<?php echo $row['Eid']; ?>">[ X ]</a>
<a href="#" class="Edit" id="<?php echo $row['Eid']; ?>">[ Edit ]</a>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
              <ul class="pagination pull-right">
				<?php
				echo "<li><a href='#'class='pages' id='1'>|<</a></li>";
				for($i=1; $i<=$pages; $i++)
				{
					echo "<li><a href='#' class='pages' id=".$i.">".$i."</a></li>";
				}
				echo "<li><a href='#' class='pages' id=".--$i.">>|</a></li>";
				echo "<input type='hidden' id='pagva' class='pagva' name='pagva' style='width:30px;' value='".$page."'>";
				?>
</ul> 				
</div>