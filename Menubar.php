<!--sidebar start-->
  <div class="sidebar">
    <center>

 <img src="admin.png" class="profile_image" alt="">


      <h4><?php echo $_SESSION['usernameAdmin']; ?></h4>
      <h6 style="color: rgb(255, 255, 255);">( <?php echo $_SESSION['UtypeAdmin']; ?> )</h6>

    </center>

    <a href="Main.php?page=1">
	<i class="fas fa-tachometer-alt"></i><span>Dashboard</span>
	</a>
	
	
    <a href="Main.php?page=2">
	<i class="fas fa-question-circle"></i><span>Employee</span>
	</a>
	
	<a href="Main.php?page=3">
	<i class="fas fa-book"></i><span>Day Attendance</span>
	</a>

	<a href="Main.php?page=4">
	<i class="fas fa-book"></i><span>Attendance Count</span>
	</a>
	
	<a href="Main.php?page=5">
	<i class="fas fa-book"></i><span>Employee Salary</span>
	</a>
		
	<a href="Main.php?page=6">
	<i class="fas fa-book"></i><span>Users</span>
	</a>


  </div>
  <!--sidebar end-->
