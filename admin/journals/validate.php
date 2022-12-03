<?php

session_start();
include("../../core/functions.php");

if (!isset($_GET['id'])) {
  header('Location: ./index.php');
}
update("journals", [
  "id" => $_GET['id'],
  "status" => $_GET['status'],
]);

flash("{$journals['title']} berhasil divalidasi!", "success");
header("Location: ./index.php");
