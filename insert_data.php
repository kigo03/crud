<?php
include ('connection.php');
if(isset($_POST['add_students'])){

$name = $_POST['name'];
$age = $_POST['age'];
$class = $_POST['class'];

if($name == "" || empty($name)){
header('location:index.php?message=you need to fill the name!');
}

else{

$query = "insert into students (name, age, class) values ('$name', '$age', '$class')";

$result = mysqli_query($conn,$query);

if(!$result){
die("query failed".mysqli_error()); 
}

else{
	header('location:index.php?insert_msg=data added successfully');
		}
	}
}	
?>




