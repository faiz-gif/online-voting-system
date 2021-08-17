<html>
<head>
<title> Voting System </title>
<link rel="stylesheet" href="css/bootstrap.css"/>
</head>
<body>
<div class="container">
<div class="col-sm-6">
<h3>Add Candidates</h3>
<form method="get" action="add_deets.php">
<div class="form-group">
<label>Select Election</label>
<select name="election_name" class="form-control">
 <option value="" selected="selected">Select Election</option>
 <?php
 $conn=new mysqli("localhost","root","","voting");
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
 <div class="form group">
 <label> No. of Candidates</label>
 <input type="text" name="total" class="form-control">
 </div>
</div>
<br>
<input type="submit" class="btn btn-success" name="ADD">
</form>
</div>
</div>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
</body>
<html>
