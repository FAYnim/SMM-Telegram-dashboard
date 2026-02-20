<?php
header('Content-Type: application/json');

require_once __DIR__.'/../include/db.php';
$db = new Database();
$conn = $db->getConnection();

$returncode = 200;

$result = [];

// Fetch all settings from smm_settings table
$settings = $db->select('smm_settings');

if ($settings !== false) {
    $result = $settings;
} else {
    $returncode = 500;
}

$r = [
    "returncode" => $returncode,
    "result" => $result
];
echo json_encode($r);
?>