<?php
session_start();
include("includes/loginheader.php");
if(!$_SESSION['gen_id'])
{
	header("location:elections.php");
}
?>
<br>
<hr>
<div class="container">
 <div class="col-md-6 col-md-offset-3">
 <form method="post">
 <label>Elections</label>
 <select name="name" class="form-control">
 <option value="" selected="selected">Select Election</option>
 <?php
 require("includes/db.php");
 $select="select * from elections_db";
 $run=$conn->query($select);
 if($run->num_rows>0)
 {
	 while($row=$run->fetch_array())
	 {
		 
	
 ?>
 <option value="<?php echo $row['election_name'];?>"><?php echo $row['election_name'];?></option>
 
 <?php
	 }
 }
 ?>
 </select>
 <br>
 
<input type="submit" name="Search" class="btn btn-success" value="Search Candidates">

 </div>
</div>
<?php
date_default_timezone_set("Asia/Kolkata");
if(isset($_POST['Search']))
{
	$election=$_POST['name'];
	$select="select * from elections_db where election_name='$election'";
	$run=$conn->query($select);
	if($run->num_rows>0)
	{
		while($row=$run->fetch_array())
		{
			$start=$row['start'];
			$end=$row['end'];
		}
		
	}
	  $current_ts=time();
	  $start_ts=strtotime($start);
	  $end_ts=strtotime($end);
	 if($current_ts<$start_ts)
	 {
		 echo "Not started";
	 }
	 else if($current_ts>$end_ts)
	 {
		 echo "Over";
	 }
	 else
	 {
		 ?>
		 <a href="caste.php?election_name=<?php echo $election;?>">Click Here</a>
<?php
     }
	 
	
}
?>
