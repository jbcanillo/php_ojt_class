<?php include '../header.php'; ?>
<div class="container">
  <nav>
    <ul>
      <h4>Manage Projects</h4>
    </ul>
    <ul>
      <li><a href="<?= BASE_URL ?>admin/views/project/form.php" role="button" class="primary">Add</a></li>
      <li><a href="<?= BASE_URL ?>admin/index.php" role="button" class="secondary">Go back</a></li>
    </ul>
  </nav>
</div>
<div class="overflow-auto">
  <table role="grid">
    <thead>
      <tr>
        <th></th>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th>Link</th>
        <th>Active</th>
        <th style="text-align:center">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      require_once '../../models/Project.php';
      $project = new Project();
      $rows = $project->all();
      ?>
      <?php if (empty($rows)): ?>
        <tr>
          <td colspan="7">
            <center>No projects found.</center>
          </td>
        </tr>
      <?php endif; ?>
      <?php foreach ($rows as $ctr => $r): ?>
        <tr data-id="<?= $r['id'] ?>">
          <td></td>
          <td contenteditable="false"><?= $ctr + 1 ?></td>
          <td contenteditable="true" class="editable" data-field="title"><?= htmlspecialchars($r['title']) ?></td>
          <td contenteditable="true" class="editable" data-field="description"><?= htmlspecialchars($r['description']) ?></td>
          <td contenteditable="true" class="editable" data-field="link"><?= htmlspecialchars($r['link']) ?></td>
          <td><input type="checkbox" class="toggle-active" <?= $r['is_active'] ? 'checked' : '' ?>></td>
          <td style="text-align:center">
            <button class="update-btn outline" data-id="<?= $r['id'] ?>">Save</button>
            <a href="<?= BASE_URL ?>admin/views/project/view.php?id=<?= $r['id'] ?>" role="button" class="secondary outline">View</a>
            <button class="delete-btn outline contrast" data-id="<?= $r['id'] ?>">Delete</button>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', () => {
    const deleteButtons = document.querySelectorAll('.delete-btn');
    const updateButtons = document.querySelectorAll('.update-btn');

    // Delete button handler
    deleteButtons.forEach(button => {
      button.addEventListener('click', async event => {
        const id = event.target.dataset.id;
        if (!confirm('Delete this project?')) return;

        try {
          const response = await fetch('<?= BASE_URL?>admin/controllers/ProjectsController.php?action=delete', {
            method: 'POST',
            body: new URLSearchParams({
              id
            })
          });

          const result = await response.json();
          if (result.success) {
            event.target.closest('tr')?.remove();
          }
        } catch (error) {
          console.error('Delete failed:', error);
        }
      });
    });

    // Update button handler
    updateButtons.forEach(button => {
      button.addEventListener('click', async event => {
        const row = event.target.closest('tr');
        const id = row?.dataset.id;

        const data = {
          id,
          title: row?.querySelector('[data-field="title"]')?.innerText.trim() || '',
          description: row?.querySelector('[data-field="description"]')?.innerText.trim() || '',
          link: row?.querySelector('[data-field="link"]')?.innerText.trim() || '',
          is_active: row?.querySelector('.toggle-active')?.checked ? 1 : 0
        };

        try {
          const response = await fetch('<?= BASE_URL?>admin/controllers/ProjectsController.php?action=update', {
            method: 'POST',
            body: new URLSearchParams(data)
          });

          const result = await response.json();
          if (result.success) alert('Project is Updated!');
        } catch (error) {
          console.error('Update failed:', error);
        }
      });
    });
  });
</script>
<?php include '../footer.php'; ?>