<?php
include 'koneksi.php';


$koneksi->query("DELETE FROM proposal WHERE proposal_id='$_GET[id]'");

echo "<script>alert('Proposal deleted');</script>";
echo "<script>location='applied.php';</script>";
?>