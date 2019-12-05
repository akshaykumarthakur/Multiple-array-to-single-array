<?php

	$arraytest=array();
	$arraytest["first"] = array(
					0 => array(
							"second1"=>"Title1",
							"second2"=>"Subtitle1",
							"second3" => array(
										0 => array(
												"third300"=>"title", 
												"third301"=>"sub title"
												),
										1 => array(
												0 => array(
															"fourth100"=>"title", 
															"fourth101"=>"sub title"
															),
												1 => array(
															"fourth110"=>"title", 
															"fourth111"=>"sub title"
															)
												)
												
							)
					),
					1 => array(
							"second10"=>"Title2",
							"second11"=>"Subtitle2"
					)
	);

	
	function single_array($array) {

	   $return = array();
	   foreach ($array as $key => $value) {
		   if (is_array($value)){ $return = array_merge($return, single_array($value));}
		   else {$return[$key] = $value;}
	   }
	   return $return;

	}
	$result = single_array($arraytest);
	echo "<pre>";
	print_r($result);
	
	
	
	
	
	
	function categoryTree($parent_id = 0, $ar = array())
	{
		global $db;
		
		$query = $db->query("select emp_code from emp_info where emp_repo_to='".$parent_id."'");
	   
		if($query->num_rows > 0){
			while($row = $query->fetch_assoc()){
				
				$ar[]=$row['emp_code'];
				$ar = array_merge(categoryTree($row['emp_code']), $ar); 
			}
		}
		return $ar;
	}

/* $data=categoryTree('D305');
print_R($data); */
?>

