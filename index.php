<?php 



include 'db_connector.php';
require __DIR__ . '/vendor/autoload.php';
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$logger = new Logger('TaskManagerLogger');
$log = new Logger('HerokuLogger');

$logger->pushHandler(new StreamHandler(__DIR__.'/app.log', Logger::DEBUG));
$log->pushHandler(new StreamHandler('php://stderr', Logger::DEBUG));


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Task Manager Application!</title>
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.5.9/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

  </head>

  <body>
  
  
<div class="container">
  
    		<h1 class="title">Welcome to Task Manager</h1>
  
  			<h3 class="subtitle">Enter a task below</h3>
  
  
			<?php 
			try {
			    
			    $logger->info("Entering Form to Add Task" );
			    $log->info("Entering Form to Add Task" );
			    ?>
			    
  	<div style="text-align:center">
  		<form method="post" action="index.php">
			<div class="addTaskDiv">
				<input type="text" name="task" class="task_input">
				<button type="submit" class="btn btn-primary btn-sm" name="submit">Add Task</button>
			</div>
		</form>
	</div>	
			    
			    
			<?php   
			
			if(isset($_POST['submit'])) {
			    
			    $logger->info("Exit form with task successfully added to DB");
			    $log->info("Exit form with task successfully added to DB");

			} else if($error){
			    
			    $logger->info("Exit form with task failed to add to DB");
			    $log->info("Exit form with task failed to add to DB");
			    
			}
			
			
			} catch (Exception $e) {
			    
			    $logger->error("Exception: ", array("message" => $e->getMessage()));
			    $log->error("Exception: ", array("message" => $e->getMessage()));
			    
			}


			?>
	
	



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
