<?php
require_once __DIR__ . '/../config/config.php';
if(!isset($_SESSION['user'])) header("Location: ".BASE."index.php?page=login");

if($_SERVER['REQUEST_METHOD']==='POST'){
  sb_request('PATCH',"kandidat?id=eq.$_POST[id]",[
    'nilai_interview'=>(int)$_POST['nilai_interview'],
    'nilai_psikotest'=>(int)$_POST['nilai_psikotest']
  ]);
}
$kandidat = sb_request('GET','kandidat?select=id,nama');
require_once __DIR__ . '/../partials/header.php';
?>
<h2>📝 Input Nilai</h2>
<form method="POST">
  <select name="id" required>
    <option value="">--Pilih kandidat--</option>
    <?php foreach($kandidat as $k): ?>
      <option value="<?= $k['id']?>"><?= $k['nama']?></option>
    <?php endforeach;?>
  </select><br><br>
  <input type="number" name="nilai_interview" placeholder="Nilai Interview 0‑100" required><br><br>
  <input type="number" name="nilai_psikotest" placeholder="Nilai Psikotest 0‑100" required><br><br>
  <button>Simpan</button>
</form>
<?php require_once __DIR__ . '/../partials/footer.php'; ?>
