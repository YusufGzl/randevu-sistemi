<?php
require_once("bag.php");
error_reporting(0);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Güncelleme formu gönderilmiş mi?
    if (isset($_POST['submit'])) {
        // Formdan gelen yeni veriler
        $ad = $_POST['ad'];
        $sifre = $_POST['sifre'];
        $durum = $_POST['durum'];

        // Basit doğrulama (boş bırakmayalım)
        if ($ad != "" && $sifre != "" && $durum != "") {
            // Güncelleme sorgusu
            $guncelle = $db->prepare("UPDATE uyeler SET ad = ?, sifre = ?, durum = ? WHERE id = ?");
            $guncelle->execute([$ad, $sifre, $durum, $id]);

            if ($guncelle->rowCount() > 0) {
                echo "<script>alert('Güncelleme başarılı.'); window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Herhangi bir değişiklik yapılmadı.');</script>";
            }
        }
    }

    // Üye bilgilerini veritabanından çek
    $sorgu = $db->prepare("SELECT * FROM uyeler WHERE id = ?");
    $sorgu->execute([$id]);
    $uye = $sorgu->fetch(PDO::FETCH_ASSOC);

    if (!$uye) {
        echo "<script>alert('Üye bulunamadı.'); window.location.href='index.php';</script>";
        exit;
    }
} else {
    echo "<script>alert('ID belirtilmedi.'); window.location.href='index.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Üye Güncelle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5 w-50">
    <h2 class="mb-4">Üye Güncelle</h2>

    <form method="post">
        <div class="mb-3">
            <label for="ad" class="form-label">Ad</label>
            <input type="text" class="form-control" id="ad" name="ad" value="<?= htmlspecialchars($uye['ad']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="sifre" class="form-label">Şifre</label>
            <input type="text" class="form-control" id="sifre" name="sifre" value="<?= htmlspecialchars($uye['sifre']) ?>" required>
        </div>
        <div class="mb-3">
            <label for="durum" class="form-label">Üyelik Durumu</label>
			<input type="text" name="durum" class="form-control" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Güncelle</button>
        <a href="index.php" class="btn btn-secondary">İptal</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
