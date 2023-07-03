<!--sidebar start-->
  <div class="sidebar">
    <center>


      <img src="employee.png" class="profile_image" alt="">


      <h4><?php echo $_SESSION['usernameemployee']; ?></h4>
      <h6 style="color: rgb(255, 255, 255);">( Employee )</h6>

    </center>
	
	<a href="MainEmployee.php?page=1">
	<i class="fas fa-book"></i><span>Attendance</span>
	</a>

	<a href="MainEmployee.php?page=2">
	<i class="fas fa-book"></i><span>Salary</span>
	</a>
  </div>
  <!--sidebar end-->
