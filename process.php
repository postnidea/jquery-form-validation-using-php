<?php
	include("validation.php");

	if(isset($_GET['case']) && $_GET['case']=="case1"){ 
		$config = array();
		$config['array_to_validate']	= $_POST;
		$config['required'] 			= "fname,username,password,password1";
		$config['unique_from_table']	= array(array('field_name' =>'username','table_name' =>'user','table_field'=>'username'));
		$config['compare']= array(array('field_name' =>'password','compare_field_name' =>'password1'));

		$validate = new validator($config);
		$error = $validate->process_validation();	
		
		if($error==false){
			$mesasge = array(array("error_field"=>"","error"=>"Your data saved successfully"));
			$modified_array= array("status"=>false,"data"=>$mesasge);
			
		} else {
			$username = mysql_real_escape_string($_POST['username']);
			$fullname = mysql_real_escape_string($_POST['fname']);
			$password = mysql_real_escape_string($_POST['password']);

			mysql_query("INSERT INTO `user` (`username`, `password`, `fullname`) VALUES ('".$username."', '".md5($password)."', '".$fullname."');");
			$modified_array= array("status"=>true,"data"=>$error);
			
		}
		echo json_encode($modified_array);
		die;
	}
	if(isset($_GET['case']) && $_GET['case']=="case2"){ 
		$config = array();
		$config['array_to_validate']	= $_POST;
		$config['required'] 			= "fname1,username1,password2,password3";
		$config['unique_from_table']	= array(array('field_name' =>'username1','table_name' =>'user','table_field'=>'username'));
		$config['compare']= array(array('field_name' =>'password2','compare_field_name' =>'password3'));

		$validate = new validator($config);
		$error = $validate->process_validation();	
		
		if($error==false){
			$mesasge = array(array("error_field"=>"","error"=>"Your data saved successfully"));
			$modified_array= array("status"=>false,"data"=>$mesasge);
			
		} else {
			$username = mysql_real_escape_string($_POST['username1']);
			$fullname = mysql_real_escape_string($_POST['fname1']);
			$password = mysql_real_escape_string($_POST['password2']);

			mysql_query("INSERT INTO `user` (`username`, `password`, `fullname`) VALUES ('".$username."', '".md5($password)."', '".$fullname."');");
			$modified_array= array("status"=>true,"data"=>$error);
			
		}
		echo json_encode($modified_array);
		die;
	}
	
	if(isset($_GET['case']) && $_GET['case']=="case3"){ 

		$config = array();
		$config['array_to_validate']	= $_POST;
		$config['required'] 			= "fname3,username3,password4,password5";
		$config['unique_from_table']	= array(array('field_name' =>'username3','table_name' =>'user','table_field'=>'username'));
		$config['compare']= array(array('field_name' =>'password4','compare_field_name' =>'password5'));

		$validate = new validator($config);
		$error = $validate->process_validation();	
		
		if($error==false){
			$mesasge = array(array("error_field"=>"","error"=>"Your data saved successfully"),array("error_field"=>"","link"=>"http://google.com"));
			$modified_array= array("status"=>false,"data"=>$mesasge);
			
		} else {
			$username = mysql_real_escape_string($_POST['username3']);
			$fullname = mysql_real_escape_string($_POST['fname3']);
			$password = mysql_real_escape_string($_POST['password4']);

			mysql_query("INSERT INTO `user` (`username`, `password`, `fullname`) VALUES ('".$username."', '".md5($password)."', '".$fullname."');");
			$modified_array= array("status"=>true,"data"=>$error);
			
		}
		echo json_encode($modified_array);
		die;


	}

?>