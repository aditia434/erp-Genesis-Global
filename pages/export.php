<?php
require_once __DIR__ . '/../config/config.php';
$data = sb_request('GET','kandidat?select=*');
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=kandidat.xls");
echo "Nama\tEmail\tNoHP\tPosisi\tStatus\n";
foreach($data as $d){
  echo "{$d['nama']}\t{$d['email']}\t{$d['no_hp']}\t{$d['posisi']}\t{$d['status']}\n";
}
exit;
