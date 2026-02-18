<?php
header('Content-Type: application/json');

require_once __DIR__.'/../include/db.php';
$db = new Database();
$conn = $db->getConnection();

// Get campaigns with user info (join to get username)
$sql = "SELECT c.*, u.username as client_username 
        FROM smm_campaigns c 
        LEFT JOIN smm_users u ON c.client_id = u.id 
        ORDER BY c.id DESC LIMIT 20";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

if ($result) {
    $returncode = 200;
} else {
    $returncode = 204;
    $result = [];
}

// Count total campaigns
$total_campaign = $db->count('smm_campaigns');

// Count by status
$sql_draft = $db->count('smm_campaigns', ['status' => 'draft']);
$total_draft = $sql_draft ? $sql_draft : 0;

$sql_active = $db->count('smm_campaigns', ['status' => 'active']);
$total_active = $sql_active ? $sql_active : 0;

$sql_paused = $db->count('smm_campaigns', ['status' => 'paused']);
$total_paused = $sql_paused ? $sql_paused : 0;

$sql_completed = $db->count('smm_campaigns', ['status' => 'completed']);
$total_completed = $sql_completed ? $sql_completed : 0;

$r = [
    "returncode" => $returncode,
    "result" => $result,
    "total_campaign" => $total_campaign,
    "total_draft" => $total_draft,
    "total_active" => $total_active,
    "total_paused" => $total_paused,
    "total_completed" => $total_completed
];
echo json_encode($r);
?>
