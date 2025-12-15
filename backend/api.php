<?php
// ===== CORS =====
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// ===== CONNECT DB =====
$conn = new mysqli(
    "sql101.byethost7.com",
    "b7_40497878",
    "*tNy9MXc/j&EN5d",
    "b7_40497878_db_demo"
);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

// ===== QUERY =====
$result = $conn->query("SELECT id, name FROM users");

$data = [];
while ($row = $result->fetch_assoc()) {
    $data[] = $row;
}

// ===== RESPONSE =====
echo json_encode([
    "status" => "success",
    "data" => $data
]);
