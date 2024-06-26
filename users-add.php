<?php
	// Start the session.
	session_start();
	if(!isset($_SESSION['user'])) header('location: login.php');	
	$_SESSION['table'] = 'users';
	$_SESSION['redirect_to'] = 'users-add.php';

	$show_table = 'users';
	$user = $_SESSION['user'];
	$users = include('database/show.php')



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User - Automted Stock Control System - ASCS</title>
    
	<?php include('partials/app-header-script.php'); ?>

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



 <?php include('partials/app-scripts.php'); ?>

</body>
</html>