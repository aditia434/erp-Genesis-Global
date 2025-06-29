<?php
require_once __DIR__ . '/../config/config.php';
if(!isset($_SESSION['user'])) header("Location: ".BASE."index.php?page=login");
$kandidat = sb_request('GET','kandidat?select=*');
require_once __DIR__ . '/../partials/header.php';
?>
<h2>📋 Dashboard Kandidat</h2>
<table border="1" cellpadding="6">
  <tr><th>Nama</th><th>Posisi</th><th>Status</th></tr>
  <?php foreach($kandidat as $k): ?>
  <tr>
    <td><?= htmlspecialchars($k['nama']) ?></td>
    <td><?= htmlspecialchars($k['posisi']) ?></td>
    <td><?= htmlspecialchars($k['status']) ?></td>
  </tr>
  <?php endforeach;?>
</table>
<?php require_once __DIR__ . '/../partials/footer.php'; ?>
