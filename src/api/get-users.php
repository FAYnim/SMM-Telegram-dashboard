<?php
header('Content-Type: application/json');

require_once __DIR__.'/../include/db.php';
$db = new Database();
$conn = $db->getConnection();

$sql = $db->select('smm_users', '*', [], [], 10);
if ($sql) {
    $returncode = 200;
    $result = $sql;
} else {
    $returncode = 204;
    $result = [];
}

// count user
$sql = $db->count('smm_users');
$total_user = $sql ? $sql : 0;

$r = [
    "returncode" => $returncode,
    "result" => $result,
    "total_user" => $total_user
];
echo json_encode($r);
?>