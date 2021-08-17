<html>
<head>
<title> Update ID </title>
<link rel="stylesheet" href="css/bootstrap.css"/>
</head>
<body>
<div class="container">
   <div class="col-sm-6">
   <?php
   $postfix="";
   $prefix="";
   $gen_id="";
    $conn=new mysqli("localhost","root","","voting");
	$id=$_GET['id'];
	$select="select * from gen_db where ID='$id'";
	$run=$conn->query($select);
	if($run->num_rows>0)
	{
		while($row=$run->fetch_array())
		{ $user_enrol=$row['user_enrol'];
		   $user_branch=$row['user_branch'];
		}
		switch ($user_branch)
		{
			case 'CSE' :
			$prefix="JIIT";
			$rand=rand(9999999,1234567);
			$postfix="CSE";
			$gen_id=$prefix.$rand.$postfix;
			break;
			case 'BT' :
			$prefix="JIIT";
			$rand=rand(9999999,1234567);
			$postfix="BT";
		    $gen_id=$prefix.$rand.$postfix;
			break;
			case 'IT' :
			$prefix="JIIT";
			$rand=rand(9999999,1234567);
			$postfix="IT";
			$gen_id=$prefix.$rand.$postfix;
			break;
			case 'ECE' :
			$prefix="JIIT";
			$rand=rand(9999999,1234567);
			$postfix="ECE";
			$gen_id=$prefix.$rand.$postfix;
			break;
		}
			?>
			<form method="post">
			<div class="form-group">
             <label for="Enrol">Enrollment Number</label>
             <input type="text" class="form-control" name="enrol" placeholder="Enrollment Number" required readonly value="<?php echo $user_enrol;?>">
             </div>
			 <div class="form-group">
			  <label for="Branch">Branch</label>
             <input type="text" class="form-control" name="branch" placeholder="Branch" required readonly value="<?php echo $user_branch;?>">
             </div>
			 <div class="form-group">
			  <label for="ID generate">Generated ID</label>
             <input type="text" class="form-control" name="gen_id" placeholder="ID" required readonly value="<?php echo $gen_id;?>">
             </div>
			 <div class="form-group">
			 <input type="submit" name="update" value="Update User ID" class="form-control btn btn-success">
			 
			 
			 </div>
			</form>
			
			<?php
		}
		else 
		{
			echo "Record Not found";
		}
	 
   ?>
    
   
   </div>
   <div class="col-sm-6">
   
  </div>
  </div>
 </body>
</html> 
 <?php
if(isset($_POST['update']))
{
	 $user_enrol=$_POST['enrol'];
	 $gen_id=$_POST['gen_id'];
	 $update="update user_db set gen_id='$gen_id' where user_enrol='$user_enrol'";
	 $run=$conn->query($update);
	 if($run)
	 {
		 
		 $delete="delete from gen_db where user_enrol='$user_enrol'";
		 $del=$conn->query($delete);
		 if($del)
		 {
			 echo "<script>alert('Updated Successfully!')</script>";
			 echo "<script>window.location.href='req.php'</script>";
		 }
	 }
	 else 
	 {
		 echo "<script>alert('Something Went Wrong!')</script>";
	 }
	
}
  ?>
  