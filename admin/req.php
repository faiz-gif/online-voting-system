<html>
<head>
<title> Voting system
</title>
<link rel="stylesheet" href="css/bootstrap.css"/>
</head>
<body>
<div class="container">
<div class="col-sm-6">
   <h1>All requested Data</h1>
   <table class="table table-responsive table-hover">
   <tr>
        <th>#</th>
		<th>User Enrol</th>
		<th>User Branch</th>
		<th>Action</th>
	</tr>	
		<?php
		$conn=new mysqli("localhost","root","","voting");
		$select="select * from gen_db";
		$run=$conn->query($select);
		if($run->num_rows>0)
		{
		$total=0;
		
			while($row=$run->fetch_array())
			{
				$total=$total+1;
				$id=$row['ID'];
				?>
				<tr>
				   <td><?php echo $total; ?></td>
				   <td><?php echo $row['user_enrol']; ?></td>
				   <td><?php echo $row['user_branch']; ?></td>
				   <td><a href="edit.php?id=<?php echo $id;?>"> Update </a></td>
				 </tr>  
				<?php
			}
		}
		?>
	</table>	
</div>
<div class="col-sm-6">

</div>
</div>
