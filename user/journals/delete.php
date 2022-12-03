<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}

$articles = find("articles", $_GET['id']);
$result = delete("articles", $_GET['id']);

flash("{$articles['title']} berhasil dihapus!", "success");
header("Location: ./index.php");
