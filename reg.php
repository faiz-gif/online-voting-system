<?php
include("includes/header.php");
?>
<?php
require("includes/db.php");
$erroren="";
$accountsuccess="";
$accountfail="";
if(isset($_POST['reg']))
{
	$user_name=$_POST['name'];
	$user_enrol=$_POST['enrol'];
	$user_gender=$_POST['gender'];
	$user_branch=$_POST['branch'];
	$user_password=$_POST['password'];
	$select="select * from user_db where user_enrol='$user_enrol'";
	$exe=$conn->query($select);
	if($exe->num_rows>0)
	{
		$erroren="<p class='text text-center text-danger'>You are already registered</p>";
	}
	else
	{
		$insert="insert into user_db (user_name,user_enrol,user_gender,user_branch,user_password) values('$user_name','$user_enrol','$user_gender','$user_branch','$user_password')";
	    $run=$conn->query($insert);
	     if($run)
	     { 
	       $accountsuccess="<p class='text text-center text-success'>Account Created</p>";
	     }
	    else
	    {
		$accountfail="<p class='text text-center text-success'>ERROR</p>";
	    }
	}
	
	
}
?>

<br>
<hr>
  <div class="container">
     <div class="row">
	    <div class="col-sm-8 col-sm-offset-2 alert alert-success">
		   <form method="post">
		   <h4 class="text text-center bg-primary alert" style="color:white;">Register Here</h4>
		       <?php
			   if($erroren!="")
			   {
				   echo $erroren;
			   }
			   if($accountsuccess!="")
			   {
				   echo $accountsuccess;
			   }
			   if($accountfail!="")
			   {
				   echo $accountfail;
			   }
			   ?>
			   <div class="form-group">
			   <label for="Username">Your Name</label>
			   <input type="text" name="name" class="form-control" placeholder="Enter name" required>
			   </div>
			   <div class="form-group">
			   <label for="Enroll">Enrollment Number</label>
			   <input type="text" name="enrol" class="form-control" placeholder="Enrollment Number" required>
			   </div>
			   <div class="form-group">
			   <label for="Gender">Gender</label>
			   <select name="gender" class="form-control">
			        <option value="">Select</option>
					<option value="M">Male</option>
					<option value="F">Female</option>
				</select>
				</div>
				<div class="form-group">
			   <label for="Branch">Branch</label>
			   <select name="branch" class="form-control">
			        <option value="">Select</option>
					<option value="CSE">CSE</option>
					<option value="IT">IT</option>
					<option value="BT">Bio.Tech</option>
					<option value="ECE">ECE</option>
				</select>
				</div>
				<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control">
				</div>
				<div class="form-group">	
			       <button type="submit" class="btn btn-success btn-block" name="reg">Submit</button>
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