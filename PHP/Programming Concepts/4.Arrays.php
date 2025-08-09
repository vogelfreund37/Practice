<?php

// PHP Hashmap Array

// Create the Object
$UserFunctions = new UserFunctions();

// Add some Users with different grades
$UserFunctions -> AddUserToMap("Alice", 2);
$UserFunctions -> AddUserToMap("Bob", 3);

print_r($UserFunctions->GetMapArray());




class UserFunctions{
	
	private $map_array;
	
	// Create a constructor to initiate a map
	function __construct(){
		$this->map_array = array(); 
	}

    function AddUserToMap($user, $value){
        $this->map_array[$user] = $value;
        echo "added " . $user ." to " . $this->map_array;
        return $user; // return the key (index) of the newly added element
    }
	
}
?>