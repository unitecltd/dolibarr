<?php
require '../../main.inc.php';
require_once DOL_DOCUMENT_ROOT.'/cakecreator/class/cakecreatorproduct.class.php';

header('Content-Type: application/json');

$cake = new CakeCreatorProduct($db);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cakes = $cake->fetchAll();
    echo json_encode($cakes);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if (!is_array($data)) $data = $_POST;

    $cake->ref = isset($data['ref']) ? $data['ref'] : '';
    $cake->label = isset($data['label']) ? $data['label'] : '';
    $cake->description = isset($data['description']) ? $data['description'] : '';
    $cake->stuffing = isset($data['stuffing']) ? $data['stuffing'] : '';
    $cake->soaking = isset($data['soaking']) ? $data['soaking'] : '';
    $cake->cake_color = isset($data['cake_color']) ? $data['cake_color'] : '';
    $cake->photo_weight = isset($data['photo_weight']) ? $data['photo_weight'] : 0;
    $cake->weight = isset($data['weight']) ? $data['weight'] : 0;
    $cake->tiers = isset($data['tiers']) ? $data['tiers'] : '';
    $cake->coverage = isset($data['coverage']) ? $data['coverage'] : '';
    $cake->decoration_type = isset($data['decoration_type']) ? $data['decoration_type'] : '';
    $cake->image_url = isset($data['image_url']) ? $data['image_url'] : '';

    if ($cake->create($user)) {
        echo json_encode(array('status' => 'ok'));
    } else {
        echo json_encode(array('status' => 'error', 'error' => $db->lasterror()));
    }
    exit;
}

echo json_encode(array('error' => 'Unsupported method'));
