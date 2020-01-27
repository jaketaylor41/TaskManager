<?php 

$servername = "gx97kbnhgjzh3efb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$username = "jywzdhdgnw64mykz";
$password = "mapj2a8swag0lpkv";
$dbname = "zgsgeqqwdvbys6j6";

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








$conn->close();



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Task Manager Application</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

  </head>

  <body>
  
  
  <div class="container">
  
    <h1 class="title">Welcome to Task Manager</h1>
  
  <h3 class="subtitle">Enter a task below</h3>
  
  
  <div style="text-align:center">
  	<form method="post" action="index.php">
	
	<?php 
	if(isset($errors)){ ?>
	
	<p><?php echo $errors;?></p>
	    
	<?php }?>
	
	
	<div class="addTaskDiv">
		<input type="text" name="task" class="task_input">
		<button type="submit" class="btn btn-primary btn-sm" name="submit">Add Task</button>
	</div>
		
	
	</form>
  
  </div>


<div style="text-align: center;">

	<div style="display: inline-block; padding-right: 50px; margin-top:50px;">
		<p>View New Tasks</p>
			<a href="newTasks.php">New Tasks</a>
	</div>
	
	<div style="display: inline-block;">
		<p>View All Tasks</p>
			<a href="allTasks.php">All Tasks</a>
	</div>

</div>
	
  
  
  
  </div>


	
	
	
    
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/js/mdb.min.js"></script>
    
  </body>
</html>
