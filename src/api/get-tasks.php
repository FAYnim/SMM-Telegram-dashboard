<?php
header('Content-Type: application/json');

require_once __DIR__.'/../include/db.php';
$db = new Database();
$conn = $db->getConnection();

// Get filter parameters
$search = isset($_GET['search']) ? $_GET['search'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$dateFrom = isset($_GET['date_from']) ? $_GET['date_from'] : '';
$dateTo = isset($_GET['date_to']) ? $_GET['date_to'] : '';

// Build WHERE clause (only status filter supported directly)
$where = [];

if (!empty($status)) {
    $where['status'] = $status;
}

// Fetch tasks
$sql = $db->select('smm_tasks', '*', $where, 'id ASC', 50);

// Fetch all proofs
$proofs = $db->select('smm_task_proofs', '*', [], 'id ASC', 100);

// Create proof lookup by task_id
$proofMap = [];
if ($proofs) {
    foreach ($proofs as $proof) {
        $proofMap[$proof['task_id']] = $proof;
    }
}

// Merge proof data into tasks
if ($sql) {
    $result = [];
    foreach ($sql as $task) {
        $taskId = $task['id'];
        
        // Add proof data if exists
        if (isset($proofMap[$taskId])) {
            $task['proof_image_path'] = $proofMap[$taskId]['proof_image_path'];
            $task['proof_admin_notes'] = $proofMap[$taskId]['admin_notes'];
            $task['proof_created_at'] = $proofMap[$taskId]['created_at'];
        } else {
            $task['proof_image_path'] = null;
            $task['proof_admin_notes'] = null;
            $task['proof_created_at'] = null;
        }
        
        // Filter by date range (in PHP since we can't use JOIN)
        $taskDate = isset($task['created_at']) ? $task['created_at'] : '';
        $dateFromMatch = true;
        $dateToMatch = true;
        
        if (!empty($dateFrom) && !empty($taskDate)) {
            $taskDateObj = new DateTime($taskDate);
            $fromDateObj = new DateTime($dateFrom . ' 00:00:00');
            $dateFromMatch = $taskDateObj >= $fromDateObj;
        }
        
        if (!empty($dateTo) && !empty($taskDate)) {
            $taskDateObj = new DateTime($taskDate);
            $toDateObj = new DateTime($dateTo . ' 23:59:59');
            $dateToMatch = $taskDateObj <= $toDateObj;
        }
        
        if (!$dateFromMatch || !$dateToMatch) {
            continue;
        }
        
        // Filter by search (campaign_id or worker_id)
        if (!empty($search)) {
            $searchMatch = false;
            $campaignId = strval($task['campaign_id']);
            $workerId = strval($task['worker_id'] ?? '');
            if (stripos($campaignId, $search) !== false || stripos($workerId, $search) !== false) {
                $searchMatch = true;
            }
            if (!$searchMatch) {
                continue;
            }
        }
        
        $result[] = $task;
    }
    $returncode = 200;
} else {
    $returncode = 204;
    $result = [];
}

// Count total tasks
$sql = $db->count('smm_tasks');
$total_tasks = $sql ? $sql : 0;

// Count pending review
$sql_pending = $db->count('smm_tasks', ['status' => 'pending_review']);
$total_pending = $sql_pending ? $sql_pending : 0;

$r = [
    "returncode" => $returncode,
    "result" => $result,
    "total_tasks" => $total_tasks,
    "total_pending" => $total_pending
];
echo json_encode($r);
?>
