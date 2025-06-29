<?php
if (!isset($_SESSION)) session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8" />
  <title>Sistem HRD</title>
  <link rel="stylesheet" href="<?= BASE ?>assets/style.css" />
</head>
<body>
  <nav class="topnav">
    <div class="nav-left">
      <span class="logo">👔 HRD</span>
      <?php if (isset($_SESSION['user'])): ?>
        <a href="<?= BASE ?>index.php?page=dashboard">🏠 Dashboard</a>
        <a href="<?= BASE ?>index.php?page=apply">📤 Input CV</a>
        <a href="<?= BASE ?>index.php?page=input_nilai">📝 Nilai</a>
        <a href="<?= BASE ?>index.php?page=export">📄 Export</a>
      <?php endif; ?>
    </div>
    <?php if (isset($_SESSION['user'])): ?>
      <div class="nav-right">
        <a href="<?= BASE ?>index.php?page=logout">🚪 Logout (<?= $_SESSION['user']['username'] ?>)</a>
      </div>
    <?php endif; ?>
  </nav>

  <div class="container">
