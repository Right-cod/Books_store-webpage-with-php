	 <?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
 	 
 
$fname=$_POST['fname'];
 $lname=$_POST['lname'];
 $bio=$_POST['bio'];
 $publisher=$_POST['publisher'];

 $stmt=$db->prepare("INSERT INTO `author`(`id`, `fname`, `lname`, `bio`, `publisher`) VALUES
                            (null,'$fname','$lname', '$bio' , '$publisher')");
 $stmt->execute();
 
header("location:../addauthor.php");
exit();
?>