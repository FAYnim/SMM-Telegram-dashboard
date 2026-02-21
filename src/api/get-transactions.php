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
$total_transactions = $db->count('smm_wallet_transactions') ?: 0;

$sum_stmt = $conn->prepare("
    SELECT
        SUM(CASE WHEN type = 'deposit'     THEN amount ELSE 0 END) AS deposit,
        SUM(CASE WHEN type = 'task_reward' THEN amount ELSE 0 END) AS task_reward,
        SUM(CASE WHEN type = 'withdraw'    THEN amount ELSE 0 END) AS withdraw
    FROM smm_wallet_transactions
");
$sum_stmt->execute();
$sum = $sum_stmt->fetch();
$total_deposit     = (float) ($sum['deposit']     ?? 0);
$total_task_reward = (float) ($sum['task_reward'] ?? 0);
$total_withdraw    = (float) ($sum['withdraw']    ?? 0);

$r = [
    "returncode" => $returncode,
    "result" => $result,
    "total_transactions" => $total_transactions,
    "total_deposit"     => $total_deposit,
    "total_task_reward" => $total_task_reward,
    "total_withdraw"    => $total_withdraw,
];
echo json_encode($r);
?>
