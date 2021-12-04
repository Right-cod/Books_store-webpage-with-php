<html>
	<head>
		<title>Admin panel</title>
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/styleAdmin.css" type="text/css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT+Sans">
		<link rel="icon" href="../pic/logos.png" type="image/icon type">
		
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<?php

include 'style.php';
 
include 'conn.php';
?>
	</head>
	<body>
		<div id="menu-bar">
			<div id="menu" onclick="onClickMenu()">
				<div id="bar1" class="bar"></div>
				<div id="bar2" class="bar"></div>
				<div id="bar3" class="bar"></div>
			</div>
			<ul class="nav" id="nav">
				<li><a href="index.php">Home</a></li>
				<li><a href="addauthor.php">Add author</a></li>
				<li><a href="books.php">Books</a></li>
				<li><a href="bookorders.php">Books Orders </a></li>
				<li><a href="orderstatus.php">Order Status </a></li>
				
			</ul>
		</div>
		<div class="menu-bg" id="menu-bg"></div>
		<script>
 		function onClickMenu(){
		document.getElementById("menu").classList.toggle("change");
		document.getElementById("nav").classList.toggle("change");
	
		document.getElementById("menu-bg").classList.toggle("change-bg");
}
		</script>
		<div class="">
		<h1 class="hed">Admin Panel<img src="../pic/logos.png" class="log"><h1></div>
		<hr color="white">
<?php session_start(); 
 if(isset($_SESSION['name'])==false)
 { ?><div class="text-center">
  <h1><a href="../login/login.php" style="color:red;">Please Login First</a></h1></div><?php
 }
 else{
?>
<h4><a href="template/logout.php" style="float:right;padding-right:50px;">Logout</h4></a>
<a href="#add_b" class="btn btn-success btn-sm" style="float:right;margin-right:50px;">Add Author</a>
		<!----------------------------------------------------------------->
		<div class="container">
    <div class="text-center">
        <h2 style="margin-top: 0px; padding-top: 0; padding-left: 5px;color:white; ">Update your Book</h2>
    </div>
    <br>
	
	<!----------------------------------------------------------------------------->
	   
   <table class="table table-hover" style="border: 2px solid #fff;">

<tr> <td >Id</td> <td>Name</td> <td>Biography</td> <td >Publisher</td> <td>Remove</td><td>Action</td></tr>
<?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
	
	$stmt= $db->query("select * from author");
	while($row=$stmt->fetch()){	
?>
<tr> <td><?php echo $row['id']." " ?></td>
     <td><?php echo $row['fname']." ".$row['lname'] ?></td>
	<td><?php echo $row['bio']." " ?></td>
	<td><?php echo $row['publisher']." " ?></td>
	<td> 
	<form action="template/AuthorremoveQuery.php" method="post">
	<input type="hidden" name="remove_a" value="<?php echo $row['id']; ?>" style="color:black"/>

	<button type="submit" value="submit" class="btn btn-danger" name="remove_btn">Remove</button>	</form></td>
	<td><a href="view.php?id=<?php echo $row['fname']." ".$row['lname']  ?>" class="btn btn-info btn-sm">View Author books</a></td>

	</tr>
<?php
	}
?>

</table><br><br>
	<!----------------------------------------------------------------------------->
	 
<div class="text-center">
        <h2 style="margin-top: 0px; padding-top: 0; padding-left: 5px;color:white; ">Add author</h2>
    </div><hr color="white">

	 <form action="template/AuthorinsertQuery.php" id="add_b" method="POST" enctype="multipart/form-data"> 
 
  <div class="form-row" >
 
    <div class="form-group col-md-6">
      <label >First Name</label>
      <input type="text" class="form-control"  name="fname" required />
    </div>
    
	<div class="form-group col-md-6">
      <label >Last Name</label>
      <input type="text" class="form-control" name="lname"  required />
    </div>

	<div class="form-group col-md-6">
      <label >Biography</label>
      <textarea name="bio" id="" class="form-control" cols="30" rows="3"></textarea>
    </div>

	<div class="form-group col-md-6">
      <label >Publisher</label>
      <input type="text" class="form-control" name="publisher"  required />
    </div>

	



  </div>

  <button type="submit" name="submit" value="submit" class="btn btn-primary"/>Add</button>&nbsp;<button type="reset" class="btn btn-primary" value="clear" >Reset</button>
</form>

<?php } ?></body>
</html>