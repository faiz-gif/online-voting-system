<html>
<head>
<title> Online Voting</title>
<link rel="stylesheet" href="css/bootstrap.css"/>
</head>
<body>
   <div class="container">
       <nav class="navbar navbar-default">
	     <div class="container-fluid">
		 <div class="navbar-header">
		  <a href="" class="navbar-brand">Online voting system</a>
		 </div>
		 <ul class="nav navbar-nav">
		 <li><a href="welcome.php">Home</a></li>
		 <li><a href="idg.php">ID Generation</a></li>
		 <li><a href="elections.php">Election</a></li>
		 <li><a href="results.php">Results</a></li>
		 <li><a href="vote.php">Vote</a></li>
		 <li><a href="logo.php">Logout</a></li>
		 <li><a href=""><?php echo $_SESSION['user_enrol']; ?></a> </li>
		
		 </ul>
		 </div>
       </nav>
   </div>
   <div class="container">
   <div class="row">
   <div class="col-sm-4 col-sm-offset-4">
   <img src="images/2.jpg" class="img img-responsive" />
   </div>
   </div>
   </div>
