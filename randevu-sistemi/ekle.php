<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Üye Ekle</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php
error_reporting(0);
require_once("bag.php");

// Form gönderilmişse işle
if ($_POST) {
    $ad = $_POST["ad"];
    $sifre = $_POST["sifre"];
    $durum = $_POST["durum"];

    // Hatalı girişleri engelle
    if ($ad != "" && $sifre != "" && $durum != "") {
        // PDO ile hazırlanan sorgu
        $ekle = $db->prepare("INSERT INTO uyeler (ad, sifre, durum) VALUES (?, ?, ?)");
        $ekle->execute([$ad, $sifre, $durum]);

        if ($ekle) {
            echo '<div class="alert alert-success text-center w-50 mx-auto">Üye başarıyla eklendi.</div>';
        } else {
            echo '<div class="alert alert-danger text-center mt-3">Hata oluştu!</div>';
        }
    } else {
        echo '<div class="alert alert-warning text-center mt-3">Lütfen tüm alanları doldurunuz.</div>';
    }
}
?>

<div class="container mx-auto w-50">
  <h2 class="text-center mb-4">Yeni Üye Ekle</h2>
  <form method="post">
    <div class="mb-3">
      <label class="form-label">Ad</label>
      <input type="text" name="ad" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Şifre</label>
      <input type="password" name="sifre" class="form-control" required>
    </div>
    <div class="mb-3">
      <label class="form-label">Durum</label>
		<input type="text" name="durum" class="form-control" required>
    </div>
    <div class="d-grid gap-2">
      <button type="submit" class="btn btn-primary">Ekle</button>
      <a href="index.php" class="btn btn-secondary">Listeye Dön</a>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
