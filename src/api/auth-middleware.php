<?php
header('Content-Type: application/json');

require_once __DIR__.'/../include/db.php';
$db = new Database();
$conn = $db->getConnection();

$jwt = $_COOKIE['auth_token'];

if(empty($jwt)){
    http_response_code(400);
    echo json_encode(["error" => "Auth token needed!"]);
    exit;
}

// JWT Practice
list($header, $payload, $signature) = explode('.', $jwt);

// cek signature
$expectedSignature = hash_hmac('sha256', $header.'.'.$payload, 'secret_key_faydev');

if($signature !== $expectedSignature) {
    http_response_code(401);
    echo json_encode(["error" => "Auth token invalid"]);
    exit;
}

// decode payload
$payload = json_decode(base64_decode($payload), true);
$user = $payload['user'];
$loggedIn = $payload['loggedIn'];

// cek expired
if(time() > $payload['exp']) {
    http_response_code(401);
    echo json_encode(["error" => "Auth token expired"]);
    exit;
}

$r = [
    "returncode" => 200,
    "user" => $user,
    "loggedIn" => $loggedIn
];
echo json_encode($r);

?>