<?php
include 'koneksi.php';


$koneksi->query("UPDATE proposal SET status='Approved' WHERE proposal_id='$_GET[id]'");

echo "<script>alert('Proposal Approved');</script>";
echo "<script>location='applicants.php';</script>";
?>