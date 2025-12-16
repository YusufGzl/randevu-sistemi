<?php
require_once("bag.php");
error_reporting(0);

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    if (is_numeric($id)) {
        $sil = $db->prepare("DELETE FROM uyeler WHERE id = ?");
        $sil->execute([$id]);

        if ($sil->rowCount() > 0) {
            echo "<script>alert('Üye silindi.'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Üye bulunamadı veya silinemedi.'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Geçersiz ID.'); window.location.href='index.php';</script>";
    }
} else {
    echo "<script>alert('ID belirtilmedi.'); window.location.href='index.php';</script>";
}
?>