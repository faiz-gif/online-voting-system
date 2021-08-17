<html>
<head>
<title> Voting System </title>
<link rel="stylesheet" href="css/bootstrap.css"/>
</head>
<body>
<div class="container">
<div class="col-sm-6">
<h3>Add Candidates</h3>
<form method="post">
<?php
$conn=new mysqli("localhost","root","","voting");
   $election=$_GET['election_name'];
   $total=$_GET['total'];
   ?>
   <label> Election Name</label>
   <input type="text" name="election" value="<?php echo $election;?>" class="form-control" readonly>
   <?php
   for($i=1;$i<=$total;$i++)
   {
	   ?>
	   <div class="form=group">
	   <label>Candidate (<?php echo $i;?>) Name</label>
	   <input type="text" name="candidate_<?php echo $i;?>" class="form-control">
	   
	   <?php
   }
   
?>
<br>
<input type="submit" name="ADD" class="btn btn-success">
</form>
</div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
</body>
<html>
<?php
if(isset($_POST['ADD']))
{
    $election=$_POST['election'];
    $total=$_GET['total'];
    $votes=0;
	for($i=1; $i<=$total ; $i++)
	{
	$name[]=$_POST['candidate_'.$i];
	}
	for($i=0; $i<$total ;$i++)
	{
		$insert="insert into candidates (name,election,votes) values ('$name[$i]','$election','$votes')";
		$run=$conn->query($insert);
		
	}
	if($run)
		{
			echo "success";
		}
		else
		{
			echo "error";
		}
}
?>