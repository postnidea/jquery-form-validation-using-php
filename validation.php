<?php 
// Class Defination starts here. 
include('connection.php');
// above class include for connect datbase connection


class validator{
		
	var $array_to_validate = "";
	var $email = "";
	var $required = "";
	var $numeric = "";
	var $positive_numeric = "";
	var $positive_integer = "";
	var $url = "";
	var $alpha = "";
	var $alphanumeric = "";
	var $unique_from_table = "";
	var $compare = "";
	var $min_character_limit = "";
	var $max_character_limit = "";
	var $photo = "";
	var $upload="";
	
	// Error Array. 
	var $error_array = array();
		
		
	// INITIALIZER
	function initialize( $params = array() )
	{
		if (count($params) > 0)
		{
			foreach ($params as $key => $val)
			{
				if (isset($this->$key))
				{
					$this->$key = $val;
				}
			}
		}
	}

	// CONSTRUCTOR
	function validator( $params = array() )
	{
		
		if (count($params) > 0)
		{
			$this->initialize($params);
		
		}
	}
	
	// REQUIRED FIELD
	function validate_for_required()
	{
		$required_array = array();
		if(trim($this->required)!="")
		{
			$required_array = explode(',',$this->required);
		}
	
		foreach($required_array as $required_element)
		{	
			if(trim($required_element)!='')
			{
				$value_to_check = mysql_real_escape_string(trim($this->array_to_validate[trim($required_element)]));
				if(trim($value_to_check)=="")
				{
					$this->error_array[] = array(
									'error_field'	=> trim($required_element),
									'error' 		=> "Field should not be empty"
								); 
				}
			}
		}
	}
	
	
	// EMAIL VALIDATION
	function validate_for_email()
	{
		$required_array = array();
		if(trim($this->email)!="")
		{
			$required_array = explode(',',$this->email);
		}
		foreach($required_array as $required_element)
		{
			if(trim($required_element)!='')
			{
				$value_to_check =mysql_real_escape_string(trim($this->array_to_validate[trim($required_element)])); 
				if($value_to_check!='')
				{
					if(!filter_var($value_to_check, FILTER_VALIDATE_EMAIL))
					{
						$this->error_array[] = array(
										'error_field'	=> trim($required_element),
										'error' 		=> "Field should be an valid email"
									); 
					}
				}
			}
		}
	}
	
	
	// NUMERIC FIELD VALIDATION
	function validate_for_numeric()
	{
		$required_array = array();
		if(trim($this->numeric)!="")
		{
			$required_array = explode(',',$this->numeric);
		}
		foreach($required_array as $required_element)
		{
			if(trim($required_element)!='')
			{
				$value_to_check = mysql_real_escape_string(trim($this->array_to_validate[trim($required_element)]));
				if($value_to_check!='')
				{
					if(!is_numeric($value_to_check))
					{ 
						$this->error_array[] = array(
										'error_field'	=> trim($required_element),
										'error' 		=> "Field should be numeric"
									);
					}
				}
			}
		}
	}
	
	// POSITIVE INTEGER FIELD VALIDATION
	function validate_for_positive_integer()
	{
		$required_array = array();
		if(trim($this->positive_integer)!="")
		{
			$required_array = explode(',',$this->positive_integer);
		}
		foreach($required_array as $required_element)
		{
			if(trim($required_element)!='')
			{
				$value_to_check = mysql_real_escape_string(trim($this->array_to_validate[trim($required_element)]));
				if($value_to_check!='')
				{
					//check number for float
					if($value_to_check != round($value_to_check))
					{ 
						$this->error_array[] = array(
							'error_field'	=> trim($required_element),
							'error' 		=> "Field should be integer number"
						);
					}
				}
			}
		}
	}

	// POSITIVE NUMERIC FIELD VALIDATION
	function validate_for_positive_numeric()
	{
		$required_array = array();
		if(trim($this->positive_numeric)!="")
		{
			$required_array = explode(',',$this->positive_numeric);
		}
		
		foreach($required_array as $required_element)
		{
			if(trim($required_element)!='')
			{
				$value_to_check = mysql_real_escape_string(trim($this->array_to_validate[trim($required_element)]));
				if($value_to_check!='')
				{
					if($value_to_check<0)
					{ 
						$this->error_array[] = array(
							'error_field'	=> trim($required_element),
							'error' 		=> "Field should be positive number"
						);
					}
				}
			}
		}
	}
	
	// URL VALIDATION
	function validate_for_url()
	{
		$required_array = array();
		if(trim($this->url)!="")
		{
			$required_array = explode(',',$this->url);
		}

		foreach($required_array as $required_element)
		{
			if(trim($required_element)!='')
			{
				$value_to_check =$this->array_to_validate[trim($required_element)];
				if($value_to_check!='')
				{
					if(!preg_match('/((((?:http|https|ftp):\/\/)|(www\.))(?:[A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?[^\s\"\']+)/i',$value_to_check))
					{
						$this->error_array[] = array(
										'error_field'	=> trim($required_element),
										'error' 		=> "Field should be URL"
									);
					}
				}
			}
		}
	}
	
	
	// ALPHA VALIDATION FOR LETTERS ONLY
	function validate_for_alpha()
	{
		$required_array = array();
			if(trim($this->alpha)!="")
		{
				$required_array = explode(',',$this->alpha);
		}

	
		foreach($required_array as $required_element)
		{
			if(trim($required_element)!='')
			{
				$value_to_check = mysql_real_escape_string(trim($this->array_to_validate[trim($required_element)]));
				if($value_to_check!='')
				{
					if(!preg_match("/^[a-zA-Z ]+$/",$value_to_check))
					{
						$this->error_array[] = array(
										'error_field'	=> trim($required_element),
										'error' 		=> "Please use only letters (a-z)"
									);
					}
				}
			}
		}
	}
	
	
	// ALPHANUMERIC VALIDATION FOR LETTERS,NUMBERS AND PERIODS ONLY
	function validate_for_alphanumeric()
	{
		$required_array = array();
	
		if(trim($this->alphanumeric)!="")
		{
			$required_array = explode(',',$this->alphanumeric);
		}
		
		foreach($required_array as $required_element)
		{
			if(trim($required_element)!='')
			{
				$value_to_check = mysql_real_escape_string(trim($this->array_to_validate[trim($required_element)]));
				if($value_to_check!='')
				{
					if(!preg_match('/^[a-zA-Z0-9]+$/',$value_to_check))
					{
						$this->error_array[] = array(
										'error_field'	=> trim($required_element),
										'error' 		=> "Please use alphanumeric"
									);
					}
				}
			}
		}
	}
	
	
	// UNIQUE FROM TABLE
	function validate_for_unique_from_table()
	{
		$required_array = array();
		
		if(!empty($this->unique_from_table))
		{
			$required_array = $this->unique_from_table;
		}
		
		foreach($required_array as $unique)
			{	
				$table_name = $unique['table_name'];
				$table_field = $unique['table_field'];
				$field_name = $unique['field_name'];
				$extra_field_name = isset($unique['extra_field_name'])?$unique['extra_field_name']:"";
				$extra_field_name_edit = isset($unique['extra_field_name_edit'])?$unique['extra_field_name_edit']:"";
				$extra_table_field = isset($unique['extra_table_field'])?$unique['extra_table_field']:"";
				$value_to_check = mysql_real_escape_string(trim($this->array_to_validate[$unique['field_name']]));
				$value_to_check_alt = isset($unique['extra_field_name'])?mysql_real_escape_string(trim($this->array_to_validate[$unique['extra_field_name']])):"";
				$value_to_check_alt_edit = isset($unique['extra_field_name_edit'])?mysql_real_escape_string(trim($this->array_to_validate[$unique['extra_field_name_edit']])):"";

				if($value_to_check!='')
				{	
					if($extra_field_name=='')
					{
						$query = mysql_query("select * from $table_name where $table_field ='$value_to_check'") or die(mysql_error());
						if( mysql_num_rows($query) )
						{
							$this->error_array[] = array(
								'error_field'	=> trim($field_name),
								'error' 		=> ucfirst(str_replace("_",' ',trim($field_name)))." Already Exist."
							); 						
						}
					}
					else
					{
						if($value_to_check_alt_edit=='')
						{
							$query = mysql_query("select * from $table_name where $table_field ='$value_to_check' and $extra_table_field = '$value_to_check_alt'") or die(mysql_error());
							if( mysql_num_rows($query) )
							{
								$this->error_array[] = array(
									'error_field'	=> trim($field_name),
									'error' 		=> ucfirst(str_replace("_",' ',trim($field_name)))." Already Exist."
								); 						
							}
						}
						else
						{
							$query = mysql_query("select * from $table_name where $table_field ='$value_to_check' and $extra_table_field = '$value_to_check_alt' and $extra_field_name_edit!='$value_to_check_alt_edit'") or die(mysql_error());
							if( mysql_num_rows($query) )
							{
								$this->error_array[] = array(
									'error_field'	=> trim($field_name),
									'error' 		=> ucfirst(str_replace("_",' ',trim($field_name)))." Already Exist."
								); 						
							}
						}
					}
				}
			}	
	}
	
	
	// COMPARE FIELDS
	function validate_for_compare()
	{
		$required_array = array();
		if(!empty($this->compare))
		{
			$required_array = $this->compare;
		}
		
		foreach($required_array as $required_element)
		{
			if(!empty($required_element))
			{
				$field_name = $required_element['field_name'];
				$compare_field_name = $required_element['compare_field_name'];
				$value_to_check = trim($this->array_to_validate[$field_name]); 
				if($value_to_check!='')
				{
					$compare_value_to_check = trim($this->array_to_validate[$compare_field_name]);
					
					if($value_to_check != $compare_value_to_check)
					{
						$this->error_array[] = array(
										'error_field'	=> trim($compare_field_name),
										'error' 		=> "Does not match with '".ucfirst(str_replace("_",' ',trim($field_name)))."' field"
									);
					}
				}
			}
		}
	}
	
	// LIMIT THE NO OF CHARACTER FIELDS
	function min_character_limit()
	{
		$required_array = array();
		if(!empty($this->min_character_limit))
		{
			$required_array = $this->min_character_limit;
		}
		
		foreach($required_array as $required_element)
		{
			if(!empty($required_element))
			{
				$field_name = $required_element['field_name'];
				$no_of_character = trim($required_element['no_of_character']);
				$value_to_check = trim($this->array_to_validate[$field_name]); 
				if($value_to_check!='')
				{	
					$no_of_character_value = $no_of_character;
					if(strlen($value_to_check) < $no_of_character_value)
					{
						$this->error_array[] = array(
										'error_field'	=> trim($field_name),
										'error' 		=> "Minimum of ".$no_of_character_value." characters required."
									);
					}
				}
			}
		}
	}
	
	
	// LIMIT THE MAX NO OF CHARACTER FIELDS
	function max_character_limit()
	{
		$required_array = array();
		if(!empty($this->max_character_limit))
		{
			$required_array = $this->max_character_limit;
		}
		
		foreach($required_array as $required_element)
		{
			if(!empty($required_element))
			{
				$field_name = $required_element['field_name'];
				$no_of_character = trim($required_element['no_of_character']);
				$value_to_check = trim($this->array_to_validate[$field_name]); 
				if($value_to_check!='')
				{	
					$no_of_character_value = $no_of_character;
					if(strlen($value_to_check) > $no_of_character_value)
					{
						$this->error_array[] = array(
										'error_field'	=> trim($field_name),
										'error' 		=> "Character Limit Exceeded.</n><br> You can enter only ".$no_of_character_value." characters."
									);
					}
				}
			}
		}
	}

	
	// REQUIRED FIELD
	function validate_for_photo()
	{
		$required_array = array();
		if(trim($this->photo)!="")
		{
			$required_array = explode(',',$this->photo);	
		}
	
		foreach($required_array as $required_element)
		{	
			if(trim($required_element)!='')
			{
				$value_to_check = mysql_real_escape_string(trim($this->array_to_validate[trim($required_element)]));
				if($value_to_check!='')
				{
					$path_parts = pathinfo(strtolower($value_to_check));
					if(!($path_parts['extension']=='jpg' || $path_parts['extension']=='jpeg' || $path_parts['extension']=='gif' || $path_parts['extension']=='png'))
					{
						$this->error_array[] = array(
										'error_field'	=> trim($required_element),
										'error' 		=> "Field should be jpg,jpeg,gif,png."
									); 
					}
				}
			}
		}
	}
	
	
	function validate_for_upload()
	{
		$required_array = array();
		if(!empty($this->upload))
		{
			$required_array = $this->upload;
		}
	
		foreach($required_array as $required_element)
		{	
			$field_name = $required_element['field_name'];
			if(!empty($required_element['extensions']))
			{
				$extensions_field = $required_element['extensions'];
				$extensions = explode(',',$extensions_field);	
			}
			$file_name = mysql_real_escape_string(trim($this->array_to_validate[trim($field_name)]));
			if($file_name!='')
			{
				$path_parts = pathinfo(strtolower($file_name));

				if(!isset($path_parts['extension']) || !in_array($path_parts['extension'],$extensions))
				{
					$this->error_array[] = array(
						'error_field'	=> trim($field_name),
						'error' 		=> 'Field should be '.$extensions_field.'.',
					); 
				}
			}
		}
	}
	
	function process_validation()
	{
		$this->validate_for_required();
		$this->validate_for_email();
		$this->validate_for_numeric();
		$this->validate_for_positive_numeric();
		$this->validate_for_positive_integer();
		$this->validate_for_url();
		$this->validate_for_alpha();
		$this->validate_for_alphanumeric();
		$this->validate_for_unique_from_table();
		$this->validate_for_compare();
		$this->validate_for_upload();
		$this->min_character_limit();
		$this->max_character_limit();
		$this->validate_for_photo();
		if(count($this->error_array))
		{
			return $this->error_array;
		}
		else
		{
			return false;
		}
	
	}

}


	
	

/* 	
$config = array();
$config['array_to_validate'] 	= $_GET;
$config['email'] 				= "account_email,alternative_email";
$config['required']				= "username,lastname";
$config['numeric']				= "mobile";
$config['url']					= "url";
$config['alpha']				= "firstname";
$config['alphanumeric']			= "password";
$config['unique_from_table']	= array(
										array(
											'field_name' =>'',
											'table_name' =>'vt_users',
											'table_field'=>'username'
										),
										array(
											'field_name' =>'',
											'table_name' =>'vt_users',
											'table_field'=>'username'
										),
									);
$config['compare']					= array(
										array(
											'field_name' =>'username',
											'compare_field_name' =>'firstname',
										),
										array(
											'field_name' =>'lastname',
											'compare_field_name' =>'firstname'
										)
									);
$my_validator = new validator($config);
$error = $my_validator->process_validation();

if( $error == false )
{
	echo "No Error Found";
}
else
{
	echo "<pre>";
			print_r($error);
	echo "</pre>";
		
}   */
?>