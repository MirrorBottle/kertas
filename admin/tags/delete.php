<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$tags = find("tags", $_GET['id']);
$result = delete("tags", $_GET['id']);

flash("{$tags['title']} berhasil dihapus!", "success");
header("Location: ./index.php");
