<?php 
    require_once __DIR__ . "../../config/init.php"; 
?>
<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>My Portfolio Website</title>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css" />
      <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.css" />
  </head>
  <header class="container">
      <h1>Welcome to My Portfolio</h1>
      <p>This is a simple portfolio website.</p>
      <nav>
          <ul>
              <li><a href="<?= BASE_URL ?>">Home</a></li>
              <li><a href="<?= BASE_URL ?>website/projects.php">My Projects</a></li>
          </ul>
          <ul>
              <li><a href="<?= BASE_URL ?>admin">Admin</a></li>
          </ul>
      </nav>
  </header>