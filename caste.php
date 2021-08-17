<?php
session_start();
include("includes/loginheader.php");
if(!$_SESSION['gen_id'])
{
	header("location:elections.php");
	exit();
}
?>
<br>
<div class="container">
<div class="col-md-6 col-md-offset-3">
<form method="post">
<?php
require("includes/db.php");
 $ename=$_GET['election_name'];
 ?>
 <div class="form-group">
 <input type="text" value="<?php echo $ename;?>" class="form-control" readonly />
 </div>
 <?php
 $select="select * from candidates where election='$ename'";
 $run=$conn->query($select);
 if($run->num_rows>0)
 {
	 while($row=$run->fetch_array())
	 {
	 ?>
	 <input type="radio" name="choice" class="form-control" value="<?php echo $row['name'];?>">
	 <label><?php echo $row['name'];?></label>
	 <?php
	 }
 }
?>
<br>
<br>
<div>
<input type="submit" name="caste" class="btn btn-success" value="Caste Your Vote">
</div>
</form>
</div>
</div>
<?php
if(isset($_POST['caste']))
{
	 $candidate_name=$_POST['choice'];
	 $user_enrol=$_SESSION['user_enrol'];
	 $select="select * from results where enrol='$user_enrol' and election='$ename'";
	 $exe1=$conn->query($select);
	 if($exe1->num_rows>0)
	 {
		 echo "<p class='text text-center text-success'>You have already voted for this election, Sorry</p>";
	 }
	 else
	 {
		 $insert="insert into results (enrol,election,candidate) values ('$user_enrol','$ename','$candidate_name')";
	     $run=$conn->query($insert);
	     if($run)
	    {
		 $update="update candidates set votes=`votes`+'1' where name='$candidate_name' and election='$ename'";
		 $exe=$conn->query($update);
		    if($exe)
		   {
			  echo "<p class='text text-center text-success'>Voted</p>";
		   }
		    else
		    {
			  echo "<p class='text text-center text-success'>Error</p>";
		    }
	    }
	 else
	 {
		 echo "error";
	 }
		 
    }
		 
}
	 
?>
