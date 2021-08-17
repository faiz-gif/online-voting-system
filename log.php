<?php
session_start();
include("includes/header.php");

?>
<?php
require("includes/db.php");
$error="";
$success="";
if(isset($_POST['login']))
{
	$user_enrol=$_POST['enroll'];
	$user_password=$_POST['password'];
	$select="select * from user_db where user_enrol='$user_enrol' and user_password='$user_password'";
	$run=$conn->query($select);
	if($run->num_rows>0)
	{
		while($row=$run->fetch_array())
		{
			$_SESSION['user_name']=$user_name=$row['user_name'];
			$_SESSION['user_enrol']=$user_enrol=$row['user_enrol'];
			echo"<script>window.location.href='welcome.php'</script>";
		}
	}
	else
	{
		$error="<span>Invalid email or password";
	}
}
?>

<br>
<hr>
  <div class="container">
     <div class="row">
	    <div class="col-sm-8 col-sm-offset-2 alert alert-success">
		   <form method="post">
		   <h4 class="text text-center bg-primary alert" style="color:white;">Login to Vote</h4>
		     <h5 class="text text-center text-danger">  <?php
			   if($error!="")
			   {
				   echo $error;
		       }
			   
			   ?>
			   </h5>
			  
			   <div class="form-group">
			   <label for="Enroll">Enrollment Number</label>
			   <input type="text" name="enroll" class="form-control" placeholder="Enrollment Number" required>
			   </div>
			   
				
				<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Enter your Password">
				</div>
				<div class="form-group">	
			       <button type="submit" class="btn btn-success btn-block" name="login">Login</button>
				</div> 
			</form>
			</br>
			</div>
			</div>
			</div>
			<?php
			include('includes/footer.php');
			?>
			<script type="text/javascript" src="js/bootstrap.js />
            <script type="text/javascript" src="js/bootstrap.js />
</body>
</html>