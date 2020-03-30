<?php 


$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "TaskManager";

$errors = "";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])){
    $task = $_POST['task'];
    if(empty($task)){
        $errors = "Task must be entered";
    } else{
        $sql = "INSERT INTO tasks (task)
VALUES ('$task')";
        header('location: index.php');
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
}

// Delete task
if(isset($_GET['del_task'])){
    $id = $_GET['del_task'];
    mysqli_query($conn, "DELETE FROM tasks WHERE id=$id");
    header('location: index.php');
}


$tasks = mysqli_query($conn, "SELECT * FROM tasks");
$newTasks = mysqli_query($conn, "SELECT * FROM tasks ORDER BY id DESC LIMIT 1;");








$conn->close();










?>