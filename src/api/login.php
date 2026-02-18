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

$sql = $db->select('smm_admins', '*', ["username" => "$user", "chatid" => "$pass"]);
if ($sql) {
    $result = $sql[0];

    $token = bin2hex(random_bytes(16));

    // cek token
    $sql = $db->select('smm_admin_sessions', '*', ["username" => "$user"]);
    if($sql) {
        $db->update('smm_admin_sessions', ["token" => $token, "expired_at" => date("Y-m-d H:i:s", strtotime("+7 days"))], ["username" => "$user"]);
    } else {
        $data = [
            "token" => $token,
            "username" => $user,
            "expired_at" => date("Y-m-d H:i:s", strtotime("+7 days"))
        ];
        $db->insert('smm_admin_sessions', $data);
    }
} else {
    http_response_code(401);
    echo json_encode(["error" => "user not found"]);
    exit;
}

$r = [
    "returncode" => 200,
    "token" => $token
];
echo json_encode($r);
?>