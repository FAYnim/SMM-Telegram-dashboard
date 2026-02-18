<?php
header('Content-Type: application/json');

require_once __DIR__.'/../include/db.php';
$db = new Database();
$conn = $db->getConnection();

$sql = $db->select('smm_withdrawals', '*', [], 'id DESC', 10);
if ($sql) {
    $returncode = 200;
    $result = $sql;
} else {
    $returncode = 204;
    $result = [];
}

// count withdrawal
$sql = $db->count('smm_withdrawals');
$total_withdrawal = $sql ? $sql : 0;

// count pending
$sql_pending = $db->count('smm_withdrawals', ['status' => 'pending']);
$total_pending = $sql_pending ? $sql_pending : 0;

$r = [
    "returncode" => $returncode,
    "result" => $result,
    "total_withdrawal" => $total_withdrawal,
    "total_pending" => $total_pending
];
echo json_encode($r);
?>
