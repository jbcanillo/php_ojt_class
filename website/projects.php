<?php include 'header.php'; ?>

<body>
  <main class="container">
    <?php
    require_once __DIR__ . '../../admin/models/Project.php';
    $project = new Project();
    $rows = $project->all();
    ?>
    <div class="grid">
      <?php if (empty($rows)): ?>
        <div>
          <article>
            <h4>
              <center>No projects found.</center>
            </h4>
          </article>
        </div>
      <?php else: ?>
        <?php foreach ($rows as $ctr => $r): ?>
          <div>
            <article>
              <header>
                <h4><?= htmlspecialchars($r['title']) ?></h4>
              </header>
              <p><?= nl2br(htmlspecialchars($r['description'])) ?></p>
              <?php if (!empty($r['link'])): ?>
                <a href="<?= htmlspecialchars($r['link']) ?>" target="_blank" rel="noopener" class="contrast">View Project Link</a>
              <?php endif; ?>
            </article>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </main>
</body>
<?php include 'footer.php'; ?>