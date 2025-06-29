<?php
require_once __DIR__ . '/../config/config.php';
$msg = ''; // Menyimpan pesan sukses/gagal

// Cek jika form dikirim (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Ambil data dari form
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $no_hp = $_POST['no_hp'];
  $posisi = $_POST['posisi'];
  $pendidikan = $_POST['pendidikan'];
  $cv_link = $_POST['cv_link'];

  // Kirim data ke Supabase
  $data = [
    'nama' => $nama,
    'email' => $email,
    'no_hp' => $no_hp,
    'posisi' => $posisi,
    'pendidikan' => $pendidikan,
    'cv_link' => $cv_link
  ];
  $result = sb_request('POST', 'kandidat', $data); // Menggunakan API untuk menyimpan ke Supabase

  // Jika data berhasil disimpan, tampilkan pesan sukses
  if ($result) {
    $msg = '✅ Data kandidat berhasil dikirim!';
  } else {
    $msg = '❌ Gagal mengirim data kandidat.';
  }
}

require_once __DIR__ . '/../partials/header.php';
?>

<h2>📤 Form Input CV Kandidat</h2>

<!-- Tampilkan pesan sukses/gagal -->
<?php if ($msg): ?>
  <p style="color: <?= strpos($msg, 'Gagal') === false ? 'green' : 'red' ?>"><?= $msg ?></p>
<?php endif; ?>

<!-- Form input kandidat -->
<form method="POST">
  <label>Nama</label>
  <input type="text" name="nama" required><br><br>

  <label>Email</label>
  <input type="email" name="email" required><br><br>

  <label>No HP</label>
  <input type="text" name="no_hp" required><br><br>

  <label>Posisi Dilamar</label>
  <input type="text" name="posisi" required><br><br>

  <label>Pendidikan Terakhir</label>
  <input type="text" name="pendidikan" required><br><br>

  <label>Link Google Drive CV</label>
  <input type="url" name="cv_link" placeholder="https://drive.google.com/..." required><br><br>

  <button type="submit">Kirim Data</button>
</form>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
