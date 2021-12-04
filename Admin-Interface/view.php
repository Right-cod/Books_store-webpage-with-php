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
 $idp=$_GET['id'];
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
<a href="#add_book" class="btn btn-success btn-sm" style="float:right;margin-right:50px;">Add book</a>
		<!----------------------------------------------------------------->
		<div class="container">
    <div class="text-center">
        <h2 style="margin-top: 0px; padding-top: 0; padding-left: 5px;color:white; ">Update your Book</h2>
    </div>
    <br>
	
	<!----------------------------------------------------------------------------->
	   
   <table class="table table-hover" style="border: 2px solid #fff;">

<tr> <td >Id</td> <td>Genre</td> <td>Title</td> <td >Price</td> <td colspan="2">Description</td> <td> Author</td> <td> Publisher</td> <td> Year Published</td> <td> Copied sold</td>  <td> CreateOn</td><td>Display</td>
<td>Update</td><td>Remove</td></tr>
<?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
	
	$stmt= $db->query("select * from product where author='$idp'");
	while($row=$stmt->fetch()){	
?>
<tr> <td><?php echo $row['id']." " ?></td>
     <td><?php echo $row['genre']." " ?></td>
	<td><?php echo $row['title']." " ?></td>
	<td><?php echo $row['price']." " ?></td>
	<td colspan="2"><?php echo  substr( $row['description'], 0, 60) . '...'; ?></td>
	<td><?php echo $row['author']." " ?></td>
	<td><?php echo $row['publisher']." " ?></td>
	<td><?php echo $row['year_published']." " ?></td>
	<td><?php echo $row['copies_sold']." copies" ?></td>
	<td><?php echo $row['createOn']." " ?></td>
	<td><?php echo $row['display']." " ?></td>
	<td> 
	<form action="UpdatePage.php" method="post">
	<input type="hidden" name=" edit_id" value="<?php echo $row['id']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-success" name="edit_btn">Edit</button>	</form></td>
	<td> 
	<form action="template/BookremoveQuery.php" method="post">
	<input type="hidden" name="remove_id" value="<?php echo $row['id']; ?>" style="color:black"/>
	<button type="submit" value="submit" class="btn btn-danger" name="remove_btn">Remove</button>	</form></td>
	
	</tr>
<?php
	}
?>

</table><br><br>
	<!----------------------------------------------------------------------------->

<?php } ?></body>
</html>