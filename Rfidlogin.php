
 <div class="container">
    <div class="row">
        <div class="col-md-12">

<div class="box" id="form">
                     <h1>RFID Employee Attendance</h1>
                    <p class="text-muted"> Please Swap Your RFID Card!</p>


	 <div class="form-group">
          <div class="col-md-12">
           
              <input type="text" class="form-control" id="RFKEY" name="RFKEY" placeholder="RF-ID">
           
          </div>              
        </div>

 
         
		 <div class="form-group">
         <div class="col-md-12">
         <div class="col-sm-offset-2 col-sm-10">
		<div id="show" class="show" style="color:#000"></div>
		
		</div></div></div>
</div>

      </div>


<script>
$("#RFKEY").keydown(function (e) {

	if ($(e.target).attr("class")=='form-control' && e.keyCode == 13) {

var dataString = "RFKEY="+$("#RFKEY").val();
//var dataString = $('#form').serialize();

document.getElementById("show").innerHTML="";
$.ajax({
type: "POST",
url: "Employeeattend.php",
data: dataString,
cache: true,
success: function(html){
$("#show").append(html);
$("#RFKEY").val('');
}  
});

	}

	});
</script>

    </div></div>
