<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset="utf-8">
<title>php web application</title>
</<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" ="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2H" crossorigin="anonymous">
<link rel="stylesheet" href="libs/bootstrap.min.css" >
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="kg.css">
</head>
<body>
<h1 id="main_title">crud application</h1>
<div class="container">
<div class="box1">
<h2>ALL STUDENTS</h2>
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENTS</button>
</div>
<table class="table table-hover table-bordered table-striped">
<thead>
<tr>
<th>id</th>
<th>name</th>
<th>age</th>
<th>class</th>
<th>update</th>
<th>delete<th>
</tr>
</thead>
<tbody>
<?php include('connection.php'); ?>

<?php
$query = "select * from students";
$result = mysqli_query ($conn, $query);
if(!$result){
die("query failed".mysqli_error());
}
else{
while($row = mysqli_fetch_assoc($result)){
?>

<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['age']; ?></td>
<td><?php echo $row['class']; ?></td>
<td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">update</a></td>
<td><a href="delete_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">delete</a></td>
</tr>
<?php
}
}
?>

</tbody>

</table>
<?php
if(isset($_GET['message'])){
echo "<h7>".$_GET['message']."</h7>";
}
?>

 <?php
 if(isset($_GET['insert_msg'])){
 echo "<h7>".$_GET['insert_msg']."</h7>";
 }
?>

<?php
if(isset($_GET['delete_msg'])){
echo "<h7>".$_GET['delete_msg']."</h7>";
}
?>


<form action="insert_data.php" method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
<div class="form-group">
<label for="name">name</label>
<input type="text" name="name" class="form-control">
</div>
<div class="form-group">
<label for="age">age</label>
<input type="text" name="age" class="form-control">
</div>
<div class="form-group">
<label for="class">class</label>
<input type="text" name="class" class="form-control">
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_students" value="ADD">
      </div>
    </div>
  </div>
</div>
</form>
</div>
</body>
</html>
