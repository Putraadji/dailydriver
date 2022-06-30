<?php
include 'koneksi.php';


$koneksi->query("UPDATE proposal SET status='Pending' WHERE proposal_id='$_GET[id]'");

echo "<script>alert('Proposal Pending');</script>";
echo "<script>location='applicants.php';</script>";
?>