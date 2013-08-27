<?php
	//declare variable data, will be use in storing validation message, error message and status of the request
	$data = array('message' => NULL, 'status' => NULL, 'error' => NULL);
	
	//get email and password from the $_POST array, generated after form submission
	$email	= $_POST['email'];
	$password	= $_POST['password'];
			
	//validation of email and password
	if(filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		$data['message'] = "Valid email. ";
		$data['status']	= true;
	}
	else
	{
		$data['message'] = "Invalid email. ";
		$data['status'] = false;
	}
	
	if(strlen($password) > 6)
	{
		// the .= is for concatination \n\n means move to next line.
		$data['message'] .= "<br/>Valid password. ";
		$data['status']	= true;
	}
	else
	{
		$data['message'] .= "<br/>Password is too short. ";
		$data['status'] = false;
	}

	//return $data in json format
	echo json_encode($data);
?>

