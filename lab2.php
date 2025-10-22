<?php
// Step 2: Declare a JSON string
$json_string = '{"name":"Maria","age":21,"email":"maria@example.com"}';

// Step 3: Decode as object and array
$obj = json_decode($json_string);
$arr = json_decode($json_string, true);

// Step 4: Display values
echo "Object: " . $obj->name . "<br>";
echo "Array: " . $arr["email"];
?>
