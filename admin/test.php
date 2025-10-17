<?php
require_once __DIR__ . '../../admin/models/Project.php';

$project = new Project();

$project_all = $project->all();
echo "<ul>";
foreach ($project_all as $proj) {
    echo "<li>" . $proj['title'] . "</li>";
}
echo "</ul>";
