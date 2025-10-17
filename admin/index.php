<?php include 'views/header.php'; ?>
<?php
    require_once 'models/Project.php';
    $project = new Project();
    $project_count = count($project->all());
?>
<body>
    <main class="container">
        <div class="grid">
            <article>
                <header>
                    <h4>No. of Projects: <?= $project_count ?></h4>
                </header>
                <a href="<?= BASE_URL ?>admin/views/project/list.php" role="button" class="secondary">Manage Projects</a>
            </article>
            <article>
                <header>
                    <h4>No. of Users: 0</h4>
                </header>
                <a href="<?= BASE_URL ?>admin/views/user/list.php" role="button" class="secondary">Manage Users</a>
            </article>
        </div>
    </main>
</body>

<?php include 'views/footer.php'; ?>