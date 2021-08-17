<?php
session_start();
include("includes/loginheader.php");
if(!$_SESSION['gen_id'])
{
	header("location:elections.php");
}
?>
<br>
<div class="container">
   <div class="col-md-6 col-md-offset-3">
    <h3 class="text text-info text-center">Election Results LIVE</h3>
    <p class="text text-danger"> Results </p>
     <form method="post" action="">
      <div class="form-group">
         <select class="form-control" name="election_name">
		 <option selected="selected" value="">Select Election</option>
		 <?php
		 require("includes/db.php");
		 $select= "select * from elections_db";
		 $run=$conn->query($select);
		 if($run->num_rows>0)
		 {
			 while($row=$run->fetch_array())
			 {
				 $ename=$row['election_name'];
				 ?>
				
				<option value="<?php echo $ename; ?>"> <?php echo $ename; ?> </option>
				 
				 <?php
			 }
		 }
	?>
		 
		 </select>
		 <br>
		 <div class="form-group">
		 <input type="submit" name="search" class="btn btn-success" value="Search Results">
		 </div>
		 

      </div>
     </form>
	 <table class="table table-responsive table-hover table-bordered text-center">
	  <tr>
	    <td>#</td>
		<td>Candidate</td>
		<td>Votes</td>
		<td>Status</td>
	 </tr>
	  <?php
	 if(isset($_POST['search']))
	 {
		 $election=$_POST['election_name'];
		$select="select * from results where election='$election'";
		$run=$conn->query($select);
		if($run->num_rows>0)
		{
			$total=0;
			while($row=$run->fetch_array())
			{
			  $total=$total+1;
			}
		}
		$select1="select * from candidates where election='$election'";
		$run1=$conn->query($select1);
		if($run1->num_rows>0)
		{
			$sno=0;
			while($row1=$run1->fetch_array())
			{
			    $sno=$sno+1;	
				$candidate=$row1['name'];
 				$votes=$row1['votes'];
				$percent=(($votes/$total)*100);
				?>
				<tr>
				<td><?php echo $sno; ?></td>
				<td><?php echo $candidate; ?></td>
				<td> <?php echo $votes; ?></td>
				<td>
				<?php
				if($percent>50)
				{
					?>
					<div class="progress">
					<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?php echo $percent; ?>  ariavaluemin="0" aria-valuemax="<?php echo $percent;?>" style="width : <?php echo $percent; ?>%">
					<?php echo $percent;?>%
					</div>
					</div>
				<?php
				}
				else if($percent>40)
				{
					?>
					<div class="progress">
					<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="<?php echo $percent; ?>  ariavaluemin="0" aria-valuemax="<?php echo $percent;?>" style="width : <?php echo $percent; ?>%">
					<?php echo $percent;?>%
					</div>
					</div>
					<?php
					
				}
				else 
				{
					?>
					<div class="progress">
					<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?php echo $percent; ?>  ariavaluemin="0" aria-valuemax="<?php echo $percent;?>" style="width : <?php echo $percent; ?>%">
					<?php echo $percent;?>%
					</div>
					</div>
					<?php
				}
				?>
				</td>
				</tr>
				<?php
			}
			?>
			<tr>
			<td>Total votes</td>
			<td colspan="2"class="text text-right"> <?php echo $total; ?> </td>
			</tr>
			<?php
		}
		else
		{
			?>
			<tr>
			<td colspan="4"> Record Not Found </td>
			</tr>
			
			<?php
		}
	 }
	 ?>
	       
	 </table>
	
	
   </div>
</div>
