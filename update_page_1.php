<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="kg.css">
<body>
<?php include('connection.php');

// Check if 'id' is set and numeric
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    
    // Fetch student data
    $query = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if(!$result){
        die("Query failed: " . mysqli_error($conn));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}

// Update student data
if(isset($_POST['update_students'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $class = $_POST['class'];
    
    $query = "UPDATE students SET name = '$name', age = '$age', class = '$class' WHERE id = $id";
    $result = mysqli_query($conn, $query);
    
    if(!$result){
        die("Query failed: " . mysqli_error($conn));
    } else {
        header('location: index.php?update_msg=you have successfully updated.');
        exit(); // Ensure script stops here after redirection
    }
}
?>
<form action="update_page_1.php?id=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo isset($row['name']) ? $row['name'] : ''; ?>">
    </div><br>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="text" name="age" class="form-control" value="<?php echo isset($row['age']) ? $row['age'] : ''; ?>">
    </div><br>
    <div class="form-group">
        <label for="class">Class</label>
        <input type="text" name="class" class="form-control" value="<?php echo isset($row['class']) ? $row['class'] : ''; ?>">
    </div>
    <input type="submit" class="btn btn-success" name="update_students" value="UPDATE">
</form>
</body>
</html>

