<?php
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM job WHERE id='$_GET[id]'");

$koneksi->query("DELETE FROM job WHERE id='$_GET[id]'");

echo "<script>alert('Job deleted');</script>";
echo "<script>location='manage-jobs.php';</script>";
?>