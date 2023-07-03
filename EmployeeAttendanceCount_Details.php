  
<div class="templatemo-content">

<h1>Employee Attendance Count</h1>
<hr>


<link rel="stylesheet" href="./hot-sneaks/jquery.ui.all.css" type="text/css">

<script type="text/javascript" src="./jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="./jquery.ui.core.min.js"></script>
<script type="text/javascript" src="./jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="./jquery.ui.datepicker.min.js"></script>
<style type="text/css">
.ui-datepicker
{
   font-family: Arial;
   font-size: 13px;
   z-index: 1003 !important;
   display: none;
}
</style>
<script type="text/javascript">
$(document).ready(function()
{
   var jQueryDatePicker1Opts =
   {
      dateFormat: 'yy-mm-dd',
      changeMonth: false,
      changeYear: false,
      showButtonPanel: false,
      showAnim: 'show'
   };
   $("#jQueryDatePicker1").datepicker(jQueryDatePicker1Opts);
   
  var jQueryDatePicker11pts =
   {
      dateFormat: 'yy-mm-dd',
      changeMonth: false,
      changeYear: false,
      showButtonPanel: false,
      showAnim: 'show'
   };
   $("#jQueryDatePicker2").datepicker(jQueryDatePicker11pts);
   
});
</script>

<div id="cp_contact_form">
<form name="form" id="formd">
<div class="row">
<div class="col-md-12 margin-bottom-15">
<input type="text" name="SID"  value="" class="form-control" id="lastName" Placeholder="Enter Name Or Mobile."> 
<br>
</div>

<div class="col-md-4 margin-bottom-15">
<input type="text" name="DateSIDFrom"  value="" class="form-control" id="jQueryDatePicker1" Placeholder="Select Date From"> 
</div>

<div class="col-md-4 margin-bottom-15">
<input type="text" name="DateSIDTo"  value="" class="form-control" id="jQueryDatePicker2" Placeholder="Select Date To"> 
</div>

<div class="col-md-4 margin-bottom-15">
<button type="button" name="submit" class="submit_button form-control">Search</button>   
</div>
</div>
</form>

</div>
<hr>

<script type="text/javascript">
$(function() {

$(".submit_button").click(function() {
var dataString = $('#formd').serialize()+'&page=1';

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
/*
	$(document).ready(function(){
var textcontent2 = $("#pagva").val();
var dataString = 'page=1';//+ textcontent2;
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
*/
</script>


<div id="container">

<div id="flash" class="flash"></div>
<div id="show" class="show"></div>

</div>
</div>
