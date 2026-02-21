<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../include/db.php';
$db = new Database();
$conn = $db->getConnection();

$sql = $db->select('smm_wallet_transactions', '*', [], 'created_at DESC', 10);
if ($sql) {
    $returncode = 200;
    $result = $sql;
}
else {
    $returncode = 204;
    $result = [];
}

// count transactions
$sql_count = $db->count('smm_wallet_transactions');
$total_transactions = $sql_count ? $sql_count : 0;

$r = [
    "returncode" => $returncode,
    "result" => $result,
    "total_transactions" => $total_transactions
];
echo json_encode($r);
?>
