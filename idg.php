<?php
session_start();
include("includes/loginheader.php");
if(!$_SESSION['user_enrol'])
{
	header("location:log.php");
}
?>
<br>
<hr>
<div class="container">
 <?php
 require("includes/db.php");
  
 $user_enrol=$_SESSION['user_enrol'];
 $select="select * from gen_db where user_enrol='$user_enrol'";
	 $run=$conn->query($select);
	 if($run->num_rows>0)
	 {
		 ?>
		 <div class="col-sm-6 col-sm-offset-3 alert alert-success">
		 <h4> Request has been submitted, Be Patient</h4>
		 </div>
		 <?php
	 }
	 else
	 {
		 
		 
		 ?>
		 <?php
		 $select="select * from user_db where user_enrol='$user_enrol' " ;
 $run=$conn->query($select);
	if($run->num_rows>0)
	{
		while($row=$run->fetch_array())
		{
			$user_name=$row['user_name'];
			$user_enrol=$row['user_enrol'];
			$user_branch=$row['user_branch'];
			$gen_id=$row['gen_id'];
			
		}
	if($gen_id!="")
	{
		?>
		<div class="col-sm-6 col-sm-offset-3 alert alert-success">
		<h4>Your ID is "<span class="text text-danger"><?php echo $gen_id; ?>" </span> </h4>
	    <p><b>ID to be used with password to caste vote</b></p> 
		<?php
	}
	else 
	{
		?>
		<div class="col-sm-6 col-sm-offset-3 alert alert-success">
  <form method="post">
  <h4 class="text text-center bg-primary alert" style="color:white;">ID Generation</h4>
  <div class="form-group">
  <label for="Username">Your name</label>
  <input type="text" class="form-control" name="name" placeholder="Your name" required value="<?php echo $user_name;?>" readonly>
  </div>
  <div class="form-group">
  <label for="Username">Enrollment Number</label>
  <input type="text" class="form-control" name="enrol" placeholder="Enrollment Number" required value="<?php echo $user_enrol;?>" readonly>
  </div>
  <div class="form-group">
  <label for="Username">Branch</label>
  <input type="text" class="form-control" name="branch" placeholder="Branch" required value="<?php echo $user_branch;?>" readonly>
  </div>
  <div class="form-group">	
	<button type="submit" class="btn btn-success btn-block" name="gen">Generate ID</button>
   </div>
  </form>
  </div>
 </div>

	 <?php
	}
}	
 if(isset($_POST['gen']))
 {
	 $user_enrol=$_POST['enrol'];
	 $user_branch=$_POST['branch'];
	 require("includes/db.php");
	 
	     $insert="insert into gen_db (user_enrol,user_branch) values('$user_enrol','$user_branch')";
	     $run=$conn->query($insert);
	     if($run)
	     {
		    echo "<script>alert('Request Submitted Succesfully!')</script>";
			header("location:idg.php");
	     }
	     else
	     {
		 echo "error";
	      } 
	 
 }
 }
 ?>