<?php
require_once __DIR__ . "../../../config/init.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.css" />
</head>
<header class="container">
    <h1>Admin Dashboard</h1>
    <div class="grid">
        <div>
            <p>This is the admin dashboard to manage your portfolio website.</p>
        </div>
        <div class="pull-right-inline">
            <a href="<?= BASE_URL ?>website/projects.php">View on website</a>
        </div>
    </div>
</header>