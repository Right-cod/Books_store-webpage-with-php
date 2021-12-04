<?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
 	 
 
if(isset($_POST["remove_btn"]))
	{
		$id=$_POST["remove_a"];	
	    echo $id;
	}

 $n1=$id;
 $stmt=$db->prepare("Delete from author where id=$n1 ");
 
 $stmt->execute();
header("location:../addauthor.php");
exit();

?>