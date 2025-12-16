<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">

<?php

require_once("bag.php");
$sorgu = $db->query("SELECT * FROM uyeler");
?>

<div class="container mt-5">
  <h2 class="text-center mb-4">Üye Listesi</h2>

  <table class="table w-75 mx-auto">
    <thead class="table-dark">
      <tr>
        <th>Id</th>
        <th>Ad</th>
        <th>Şifre</th>
        <th>Üyelik Durumu</th>
        <th>Üyelik İşlemleri</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($sorgu as $yaz) 
		{ 
		?>
        <tr>
          <td><?= $yaz["id"] ?></td>
          <td><?= $yaz["ad"] ?></td>
          <td><?= $yaz["sifre"] ?></td>
          <td><?= $yaz["durum"] ?></td>
          <td>
            <!-- Silme bağlantısı (düzeltilmiş) -->
            <a href="sil.php?id=<?= $yaz["id"] ?>" class="btn btn-danger">Sil</a>

            <!-- Ekle bağlantısı -->
            <a href="ekle.php" class="btn btn-primary">Kayıt Ekle</a>

            <!-- Güncelle bağlantısı -->
            <a href="guncelle.php?id=<?= $yaz["id"] ?>" class="btn btn-success">Güncelle</a>
          </td>
        </tr>
      <?php
				} 
		?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
