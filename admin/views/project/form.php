<?php include '../header.php'; ?>

<body>
    <div class="container">
        <h4>Add a Project</h4>
        <form action="<?= BASE_URL?>admin/controllers/ProjectsController.php?action=create" method="POST">
            <fieldset>
                <label>Title <input name="title" required></label>
                <label>Description <textarea name="description"></textarea></label>
                <label>Link <input name="link" type="url"></label>
                <label>Created By <input name="created_by" required></label>
                <label><input type="checkbox" name="is_active" checked> Active</label>
            </fieldset>
            <input type="submit" value="Save"/>
        </form>
    </div>
</body>

<?php include '../footer.php'; ?>