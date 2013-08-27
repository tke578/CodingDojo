<?php
	//declare variable data, will be use in storing validation message, error message and status of the request
	$data = array('message' => NULL, 'status' => NULL, 'error' => NULL);
	
	//check if there is a form submission
	if(!empty($_POST))
	{	
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
			$data['error'] = "Invalid email. ";
			$data['status'] = false;
		}
		
		if(strlen($password) > 6)
		{
			// the .= is for concatination \n\n means move to next line.
			$data['message'] .= "\n\nValid password. ";
			$data['status']	= true;
		}
		else
		{
			$data['error'] .= "\n\nPassword is too short. ";
			$data['status'] = false;
		}
	}
	else
	{
		$data['error'] .= "No values submitted ";
		$data['status'] = false;
	}
	
	//return $data in json format
	echo json_encode($data);
	
	/* Basic implementation of ajax by John S. Supsupin, Village88.com 2012
	 * jsupsupin@village88.com, skype: johndavid9991, facebook: narusaku09@yahoo.com 
	 * thanks for joining village88.com contact me for bugs of this tutorial
	 */
?>

