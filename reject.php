<?php
include 'koneksi.php';


$koneksi->query("UPDATE proposal SET status='Rejected' WHERE proposal_id='$_GET[id]'");

echo "<script>alert('Proposal Rejected');</script>";
echo "<script>location='applicants.php';</script>";
?>