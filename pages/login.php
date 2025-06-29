<?php
require_once __DIR__ . '/../config/config.php';
$err = ''; // Menyimpan pesan kesalahan

// Cek jika form login dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $u = $_POST['username'];
    $p = $_POST['password'];

    // Cek data login di database Supabase
    $rows = sb_request('GET', "users?username=eq.$u&password=eq.$p&select=*");

    // Jika username dan password valid
    if ($rows && count($rows)) {
        $_SESSION['user'] = $rows[0];
        header("Location: index.php?page=dashboard");  // Arahkan ke halaman dashboard
        exit;
    } else {
        $err = "❌ Username / Password salah.";  // Pesan error jika login gagal
    }
}

require_once __DIR__ . '/../partials/header.php';
?>

<h2>🔐 Login Sistem HRD</h2>

<!-- Menampilkan pesan error jika ada -->
<?php if ($err): ?>
  <div class="error"><?= $err ?></div>
<?php endif; ?>

<form method="POST">
    <label>👤 Username</label>
    <input type="text" name="username" required><br><br>

    <label>🔑 Password</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
</form>

<?php require_once __DIR__ . '/../partials/footer.php'; ?>
