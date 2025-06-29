<?php
if (!isset($_SESSION)) session_start();

// Masukkan API key Supabase kamu di sini
define('SUPABASE_URL', 'https://degruycamvxeorkzmbge.supabase.co');  // URL Supabase project kamu
define('SUPABASE_API_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImRlZ3J1eWNhbXZ4ZW9ya3ptYmdlIiwicm9sZSI6ImFub24iLCJpYXQiOjE3NTExMTczOTMsImV4cCI6MjA2NjY5MzM5M30.YVjl2_NqD2VbXWqINtIcci8dCEFF-oh7iBR37uC03Yk');  // Anon key kamu

define('BASE', '/'); // Ganti BASE sesuai jika menggunakan subfolder

function sb_request($method, $endpoint, $data = null) {
  $url = SUPABASE_URL . '/rest/v1/' . $endpoint;
  $headers = [
    'apikey: ' . SUPABASE_API_KEY,
    'Authorization: Bearer ' . SUPABASE_API_KEY,
    'Content-Type: application/json',
    'Accept: application/json',
    'Prefer: return=representation'
  ];
  $opts = ['http' => [
    'method' => strtoupper($method),
    'header' => implode("\r\n", $headers),
    'timeout' => 10
  ]];
  if ($data !== null) {
    $opts['http']['content'] = json_encode($data);
  }
  $context = stream_context_create($opts);
  $result = @file_get_contents($url, false, $context);
  return $result ? json_decode($result, true) : null;
}
?>
