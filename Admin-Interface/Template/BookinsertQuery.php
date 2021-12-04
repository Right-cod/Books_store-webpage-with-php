	 <?php
	try{
	$db= new PDO('mysql:host=localhost;dbname=bookstore;charset=utf8','root','');
	
	}
	catch(Exception $e){
		
		echo "Error has Occured";
	}
	
 	 
 
$genre=$_POST['genre'];
 $title=$_POST['title'];
 $price=$_POST['price'];
 $author=$_POST['author'];
 $publisher=$_POST['publisher'];
 $published=$_POST['published'];
 $description=$_POST['description'];
 $file=$_FILES['photo'];
 //PRINT_R( $file);
 
 $filename= $file['name'];
 $filepath= $file['tmp_name'];
 $fileerror= $file['error'];
 if($fileerror == 0){
 $destfile= '../../pic/book/'.$filename;
 //ECHO  $destfile;
 
 move_uploaded_file($filepath, $destfile);
 } 
 $stmt=$db->prepare("INSERT INTO `product`(`id`, `genre`, `title`, `price`, `description`, `author`, `publisher`, `year_published`, `copies_sold`, `image`, `createOn`, `display`, `rating`) VALUES 
                                                              (null,'$genre','$title', $price , '$description','$author','$publisher','$published',0,'$filename',now(),'YES',1)");
 $stmt->execute();
 
header("location:../books.php");
exit();
?>