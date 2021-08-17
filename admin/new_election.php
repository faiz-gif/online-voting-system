<html>
<head>
<title> Voting System </title>
<link rel="stylesheet" href="css/bootstrap.css"/>
</head>
<body>
<div class="container">
<div class="col-sm-6">
<h3>Add New Election</h3>
<form method="post">
<div class="form-group">
<label>Election</label>
<input type="text" name="election_name" class="form-control">
</div>
<div class="form-group">
<label>Election Start Date</label>
<input type="date" name="start" class="form-control">
</div>
<div class="form-group">
<label>Election End Date</label>
<input type="date" name="end" class="form-control">
</div>
<button type="submit" class="btn btn-success btn-block" name="ADD">Add Election</button>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
</body>
<html>
<?php
$conn=new mysqli("localhost","root","","voting");
if(isset($_POST['ADD']))
{
	$election_name=$_POST['election_name'];
	$start=$_POST['start'];
	$end=$_POST['end'];
	$insert="insert into elections_db (election_name,start,end) values ('$election_name','$start','$end')";
	$run=$conn->query($insert);
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