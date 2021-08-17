<?php
session_start();
include("includes/loginheader.php");
if(!$_SESSION['user_enrol'])
{
	header("location:login.php");
}
?>
<br>
<div class="container">
 <div class="col-md-6 col-md-offset-3">
    <form method="post">
	<div class="form-group">
	<label for="ID">Your ID</label>
	<input type="text" class="form-control" name="ID" id="ID" placeholder="Enter ID" required>
	</div>
	<div class="form-group">
	<label for="password">Password</label>
	<input type="password" name="password" class="form-control" placeholder="Enter Password">
	</div>
	<div class="form-group">
	<button type="submit" class="btn btn-success btn-block" name="login">Enter Voting Area</button>
	</div>
	</form>
	</div>
	</div>
	<?php
	require("includes/db.php");
	if(isset($_POST['login']))
	{
		 $user_id=$_POST['ID'];
		 $user_pass=$_POST['password'];
		 $select="select * from user_db where gen_id='$user_id' and user_password='$user_pass' ";
		 $run=$conn->query($select);
		 if($run->num_rows>0)
		 {
			 while($row=$run->fetch_array())
			 {
			 $_SESSION['gen_id']=$row['gen_id'];
			 }
			 header('location:vote.php');
		 }
		
	}
	?>