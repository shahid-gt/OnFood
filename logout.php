<?php
session_start();
include('functions.php');
unset($_SESSION['LOGIN']);
redirect('index.php');
?>