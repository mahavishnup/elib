<?php
include "database.php";
session_start();
$sql="delete from book where BID={$_GET["id"]}";
$db->query($sql);
echo"<script>window.open('view_books.php?mes=Data Deleted....','_self');</script>";
?>