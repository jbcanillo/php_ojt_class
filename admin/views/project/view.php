<?php
include '../header.php';
require_once '../../models/Project.php';

$id = $_GET['id'] ?? 0;
if ($id <= 0) {
    echo '<div class="container"><p>Invalid project ID.</p></div>';
    include '../footer.php';
    exit;
}

$project = new Project();
$row = $project->show($id);
if (!$row) {
    echo '<div class="container"><p>Project not found.</p></div>';
    include '../footer.php';
    exit;
}
?>

<div class="container">
    <nav>
        <ul>
            <h4>View Project</h4>
        </ul>
        <ul>
            <li><a href="<?= BASE_URL ?>admin/views/project/list.php" role="button" class="secondary">Go back</a></li>
        </ul>
    </nav>
    <section class="project-view">
        <h2><?= $row['title'] ?? 'Untitled Project' ?></h2>
        <div class="project-meta" style="margin-bottom:1rem;">
            <?php if (!empty($row['description'])): ?>
                <article class="project-description">
                    <h6>Description</h6>
                    <p><?= nl2br($row['description']) ?></p>
                </article>
            <?php endif; ?>
            <?php if (!empty($row['link'])): ?>
                <p><strong>Project Link:</strong> <a href="<?= htmlspecialchars($row['link']) ?>" target="_blank" rel="noopener"><?= htmlspecialchars($row['link']) ?></a></p>
            <?php endif; ?>
            <?php if (!empty($row['created_at'])): ?>
                <p><strong>Created On:</strong> <?= date('F j, Y', strtotime($row['created_at'])) ?></p>
            <?php endif; ?>
            <?php if (!empty($row['created_by'])): ?>
                <p><strong>Created By:</strong> <?= $row['created_by'] ?></p>
            <?php endif; ?>
            <?php if (!empty($row['updated_at'])): ?>
                <p><strong>Last Updated:</strong> <?= date('F j, Y', strtotime($row['updated_at'])) ?></p>
            <?php endif; ?>
        </div>
    </section>
</div>

<?php include '../footer.php'; ?>