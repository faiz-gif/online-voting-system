<?php
session_start();
include("includes/loginheader.php");
if(!$_SESSION['user_enrol'])
{
	echo"<script>window.location.href='log.php'</script>";
}
?>
<br>
<hr>
<div class="container">
	   <div class="row">
	       <div class="col-sm-6">
		   <h4 class="text text-center text-info alert bg-primary"> SAY NO TO LINES, VOTE WITH EASE</h4>
		   <ul>
            <li>Select <b>ID GENERATE</b></li>
            <li> Send request to Admin</li>
             <li>Choose Election</li>
            <li>Cast your Vote</li>
            <li> You're Welcome</li>
            </ul>
 		   </div>
		   <div class="col-sm-6">
		     <img src="images/1.jpg" class="img img-responsive"/>
		   
		   </div>
	    </div>
	</div>
<?php
include("includes/footer.php")
?>
<script type="text/javascript" src="js/bootstrap.js />
<script type="text/javascript" src="js/bootstrap.js />
</body>
</html>