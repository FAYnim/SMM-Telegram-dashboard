<?php
header('Content-Type: application/json');

require_once __DIR__.'/../include/db.php';
$db = new Database();
$conn = $db->getConnection();

$auth_token = $_POST['auth_token'] ?? '';

if(empty($auth_token)){
    http_response_code(400);
    echo json_encode(["error" => "Auth token needed!"]);
    exit;
}

$sql = $db->select("smm_admin_sessions", "*", ["token" => $auth_token]);
if($sql) {
    $result = $sql[0];
    $expired = $result["expired_at"];

    if(strtotime($expired) < time()) {
        http_response_code(401);
        echo json_encode(["error" => "Auth token expired"]);
        exit;
    }
} else {
    http_response_code(401);
    echo json_encode(["error" => "Auth token not found"]);
}

$r = [
    "returncode" => 200,
];
echo json_encode($r);

?>