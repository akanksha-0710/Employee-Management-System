  
<div class="templatemo-content">

<h1>Employee Details</h1>
<hr>

<script type="text/javascript" src="js/jquery.min.js"></script>

<div id="cp_contact_form">
<form name="form" id="formser">
<div class="row">
<div class="col-md-6 margin-bottom-15">
<input type="text" name="SID"  value="" class="form-control" id="lastName" Placeholder="Enter Name Or Mobile."> 
</div>
<div class="col-md-6 margin-bottom-15">
<button type="button" name="submit" class="submit_button form-control">Search</button>   
</div>
</div>
</form>

</div>
<hr>

<script type="text/javascript">
$(function() {

$(".submit_button").click(function() {
var dataString = $('#formser').serialize()+'&page=1';

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
	$(document).ready(function(){
var textcontent2 = $("#pagva").val();
var dataString = 'page=1';//+ textcontent2;
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

</script>


<div id="container">

<div id="flash" class="flash"></div>
<div id="show" class="show"></div>

</div>
</div>
