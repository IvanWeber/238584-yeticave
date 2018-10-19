<?php
session_start();
$_SESSION = [];
header("Location: /index.php?page=1");
die();