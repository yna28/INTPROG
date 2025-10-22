<?php
// Set the content type header to tell the client the response will be JSON
header('Content-Type: application/json');

// Ensure the request is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode(["status" => "error", "message" => "Only POST requests are accepted."]);
    exit;
}

// 1. Read the raw JSON data sent in the request body
$json_data = file_get_contents('php://input');

// 2. Decode the JSON data into a PHP associative array
$data = json_decode($json_data, true);

// Check if decoding was successful and required data exists
if ($data === null || !isset($data['username']) || !isset($data['password'])) {
    http_response_code(400); // Bad Request
    echo json_encode(["status" => "error", "message" => "Invalid or incomplete JSON data received."]);
    exit;
}

// Get the values
$username = trim($data['username']);

// 3. Process the data and create a response array
if (strtolower($username) ) {
    // Success scenario
    $response = [
        "status" => "success",
        "message" => "Welcome, " . $username . "!"
    ];
} else {
    // Failure/other user scenario
    $response = [
        "status" => "error",
        "message" => "User " . $username . " not authorized."
    ];
    http_response_code(401); // Unauthorized
}

// 4. Encode the PHP array back into JSON and send the response
echo json_encode($response);
?>
