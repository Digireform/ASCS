<?php
	// Start the session.
	session_start();
	if(!isset($_SESSION['user'])) header('location: login.php');
	$_SESSION['table'] = 'users';
	$user = $_SESSION['user'];

	$users = include('database/show.php')


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Automted Stock Control System - ASCS</title>
    <link rel="stylesheet" type="text/css" href="css/login.css?v=<?= time(); ?>">
    <script src="https://use.fontawesome.com/0c7a3095b5.js"></script>
</head>
<body>    

    <div id="dashboardMainContainer">
         
            <?php include('partials/app-sidebar.php') ?>

        
    
		<div class="dasboard_content_container" id="dasboard_content_container">

              <?php include('partials/app-topnav.php') ?>       

		    <div class="dashboard_content">
			    <div class="dashboard_content_main">

                    <div class="row">
				        <div class="column column-12">
						    <h1 class="section_header"><i class="fa fa-plus"></i> Register User</h1>




                            <form action="database/add.php" method="POST" class="appForm">
					            <div class="appFormInputContainer">
						            <label for="first_name">First Name</label>
						            <input type="text" class="appFormInput" id="first_name" name="first_name" required/>	
					            </div>
					            <div class="appFormInputContainer">
						            <label for="last_name">Last Name</label>
						            <input type="text" class="appFormInput" id="last_name" name="last_name" required />	
					            </div>
					            <div class="appFormInputContainer">
						            <label for="email">Email</label>
						            <input type="email" class="appFormInput " id="email" name="email" required/>
									
									
					            </div>
					            <div class="appFormInputContainer">
						            <label for="password">Password</label>
						            <input type="password" class="appFormInput" id="password" name="password" required/>	
					            </div>
					            <button type="submit" " class="appBtn"><i class="fa fa-plus"></i> Add User</button>
				           </form>	
                            <?php 
					            if(isset($_SESSION['response'])){												   
					    	        $response_message = $_SESSION['response']['message'];
						            $is_success = $_SESSION['response']['success'];
				            ?>
					            <div class="responseMessage">
				    	            <p class="responseMessage <?= $is_success ? 'responseMessage__success' : 'responseMessage__error' ?>" >
										<?= $response_message ?>
						            </p>
				                </div>
						    <?php unset($_SESSION['response']); }  ?>
		
				        	




					    </div>




						
				   </div>

                   

					


                </div>


			</div>
		</div>
	</div>

 <script src="js/script.js?v=<?= time(); ?>"></script>
 <script src="js/jquery/jquery-3.5.1.min.js"></script>
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/js/bootstrap-dialog.js" integrity="sha512-AZ+KX5NScHcQKWBfRXlCtb+ckjKYLO1i10faHLPXtGacz34rhXU8KM4t77XXG/Oy9961AeLqB/5o0KTJfy2WiA==" crossorigin="anonymous"></script>


</body>
</html>