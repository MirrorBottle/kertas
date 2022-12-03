<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$journals = find("journals", $_GET['id']);
$result = delete("journals", $_GET['id']);

flash("{$journals['title']} berhasil dihapus!", "success");
header("Location: ./index.php");
