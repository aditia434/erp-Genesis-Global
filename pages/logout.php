<?php
// Hapus semua session
session_unset();

// Hancurkan session
session_destroy();

// Redirect ke halaman login setelah logout
header("Location: index.php?page=login");
exit;
