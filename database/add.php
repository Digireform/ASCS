<?php
	// Start the session.
	session_start();
	// Capture the table mappings.
	include('table_columns.php');

	// Capture the table name.
	$table_name = $_SESSION['table'];
	$columns = $table_columns_mapping[$table_name];


 

	// Loop through the columns
	$db_arr = [];
	$user = $_SESSION['user'];
	foreach($columns as $column){
		if(in_array($column, ['created_at', 'updated_at'])) $value = date('Y-m-d H:i:s');
		else if ($column == 'created_by') $value = $user['id'];
        else if ($column == 'password') $value = password_hash($_POST[$column], PASSWORD_DEFAULT);
		else $value = isset($_POST[$column]) ? $_POST[$column] : '';
        
		$db_arr[$column] = $value;
	}

    $table_properties = implode(", ",   array_keys($db_arr));
	$table_placeholders = ':' . implode(", :", array_keys($db_arr));
 

   

	// Adding the record to main table.
	try {			
		$sql = "INSERT INTO 
								$table_name($table_properties) 
							VALUES 
								($table_placeholders)";

		include('connection.php');

		$stmt = $conn->prepare($sql);
		$stmt->execute($db_arr);



		$response = [
			'success' => true,
			'message' =>  ' Successfully added to the system. '
		];
	} catch (PDOException $e) {
		$response = [
			'success' => false,
			'message' => $e->getMessage()
		];
	}

	$_SESSION['response'] = $response;
	header('location: ../'  . $_SESSION['redirect_to']);

?>