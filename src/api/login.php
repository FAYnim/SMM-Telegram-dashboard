<?php
header('Content-Type: application/json');

require_once __DIR__.'/../include/db.php';
$db = new Database();
$conn = $db->getConnection();

$user = $_POST['username'] ?? ''; 
$pass = $_POST['password'] ?? '';

if(empty($user) || empty($pass)) {
    http_response_code(400);
    echo json_encode(["error" => "Fill all the inputs!"]);
    exit;
}

$user = trim($user);
$user = htmlspecialchars($user, ENT_QUOTES, 'UTF-8');
$pass = trim($pass);
$pass = htmlspecialchars($pass, ENT_QUOTES, 'UTF-8');

// JWT Practice
$header = json_encode([
    'alg' => 'HS256',
    'typ' => 'JWT'
]);

$sql = $db->select('smm_admins', '*', ["username" => "$user", "chatid" => "$pass"]);
if ($sql) {
    $result = $sql[0];

    // $token = bin2hex(random_bytes(16));

    // // cek token
    // $sql = $db->select('smm_admin_sessions', '*', ["username" => "$user"]);
    // if($sql) {
    //     $db->update('smm_admin_sessions', ["token" => $token, "expired_at" => date("Y-m-d H:i:s", strtotime("+7 days"))], ["username" => "$user"]);
    // } else {
    //     $data = [
    //         "token" => $token,
    //         "username" => $user,
    //         "expired_at" => date("Y-m-d H:i:s", strtotime("+7 days"))
    //     ];
    //     $db->insert('smm_admin_sessions', $data);
    // }

    // JWT Practice
    $payload = json_encode([
        'user' => $user,
        'loggedIn' => true,
        'exp' => time() + 60 * 60 * 24 * 7
    ]);

    // Signature (tanda tangan)
    $base64Header = base64_encode($header);
    $base64Payload = base64_encode($payload);

    $signature = hash_hmac('sha256', $base64Header.'.'.$base64Payload, 'secret_key_faydev');

    $jwt = $base64Header.'.'.$base64Payload.'.'.$signature;
} else {
    http_response_code(401);
    echo json_encode(["error" => "user not found"]);
    exit;
}

$r = [
    "returncode" => 200,
    "token" => $jwt
];
echo json_encode($r);
?>