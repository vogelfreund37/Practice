<?php

// PHP Control Structures
// Create the Object
$UserFunctions = new UserFunctions();

// Add some Users with different grades
$UserFunctions->AddUserToMap("Alice", 2);
$UserFunctions->AddUserToMap("Bob", 3);


echo "Current Map:\n";
print_r($UserFunctions->GetMapArray());

// Remove Bob if existant.
if (!isset($UserFunctions->GetMapArray()["Bob"])) {
    echo "Bob not found!\n";
    print_r($UserFunctions->GetMapArray());
} else {
    $UserFunctions->RemoveUserFromMap("Bob");
    echo "Removed Bob from array!\n";
    print_r($UserFunctions->GetMapArray());
}

$UserFunctions->AddUserToMap("Bob", 3);
$UserFunctions->AddUserToMap("SYN", 1);
$UserFunctions->AddUserToMap("SYN-ACK", 2);
$UserFunctions->AddUserToMap("ACK", 3);

// Incrementing i and irretating until the array has no more index avaliable.
$mapArray = $UserFunctions->GetMapArray();
$array_index = array_keys($mapArray);

// for
// Schleife, bedingung, inkrementation
for ($i = 0; $i < count($array_index); $i++) {
    $user = $array_index[$i];
    echo "Entry: $user, Value: " . $mapArray[$user] . "\n";
}

// while
// Do something while the condition is not satisfied.
while (count($mapArray) > 2) {
    $lastindex = array_key_last($mapArray);
    $removedValue = $mapArray[$lastindex];
    unset($mapArray[$lastindex]);
    $UserFunctions->RemoveUserFromMap($lastindex);
    echo "Removed: $lastindex with value $removedValue\n";
}
echo "Condition is now satisfied:\n";
print_r($UserFunctions->GetMapArray());

// foreach
// Lets increment the stored value by 1 using foreach
foreach ($UserFunctions->GetMapArray() as $user => $value) {
    $UserFunctions->IncrementUserValue($user);
}
echo "Incrementation done:\n";
print_r($UserFunctions->GetMapArray());



class UserFunctions
{

    private $map_array;

    function __construct()
    {
        $this->map_array = array();
    }

    function AddUserToMap($user, $value)
    {
        $this->map_array[$user] = $value;
        echo "Added $user to the map with value $value.\n";
        return $user;
    }

    function RemoveUserFromMap($user)
    {
        if (isset($this->map_array[$user])) {
            unset($this->map_array[$user]);
            echo "Removed $user from the map.\n";
        } else {
            echo "$user not found in the map.\n";
        }
    }

    function IncrementUserValue($user)
    {
        if (isset($this->map_array[$user])) {
            $this->map_array[$user]++;
            echo "Incremented value of $user.\n";
        } else {
            echo "$user not found in the map.\n";
        }
    }

    function GetMapArray()
    {
        return $this->map_array;
    }
}
