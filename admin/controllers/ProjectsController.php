<?php
require_once __DIR__ . '../../../admin/models/Project.php';

$project = new Project();

$action = $_GET['action'] ?? null;

switch ($action) {
    case 'create':
        create($project);
        break;
    case 'update':
        update($project);
        break;
    case 'delete':
        delete($project);
        break;
    case 'show':
        show($project);
        break;
    default:
        http_response_code(400);
        echo json_encode(['error' => 'Unknown action']);
        exit;
}

// --- CRUD FUNCTIONS ---

function create($project)
{   
    $data = [
        'title'       => $_POST['title'] ?? 'no title',
        'description' => $_POST['description'] ?? null,
        'link'        => $_POST['link'] ?? null,
        'created_by'  => $_POST['created_by'] ?? null,
        'is_active'   => isset($_POST['is_active']) ? 1 : 0,
    ];

    $project->create($data);

    if (!empty($_SERVER['HTTP_REFERER'])) {
        $ref = str_replace(["\r", "\n"], '', $_SERVER['HTTP_REFERER']);
        header('Location: ' . $ref);
    } else {
        header('Location: ../index.php');
    }
    exit;
}

function update($project)
{
    header('Content-Type: application/json');

    $data = [
        'id'          => $_POST['id'] ?? null,
        'title'       => $_POST['title'] ?? null,
        'description' => $_POST['description'] ?? null,
        'link'        => $_POST['link'] ?? null,
        'is_active'   => isset($_POST['is_active']) ? 1 : 0,
    ];

    if (!$data['id']) {
        echo json_encode(['error' => 'Missing project ID']);
        exit;
    }

    $project->update($data);
    echo json_encode(['success' => true]);
    exit;
}

function delete($project)
{
    header('Content-Type: application/json');

    $id = $_POST['id'] ?? null;
    if (!$id) {
        echo json_encode(['error' => 'Missing project ID']);
        exit;
    }

    $project->delete($id);
    echo json_encode(['success' => true]);
    exit;
}

function show($project)
{
    header('Content-Type: application/json');

    $id = $_GET['id'] ?? null;
    if (!$id) {
        echo json_encode(['error' => 'Missing project ID']);
        exit;
    }

    echo json_encode(['data' => $project->show($id)]);
    exit;
}
