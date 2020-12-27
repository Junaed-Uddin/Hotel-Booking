<?php
session_start();
unset($_SESSION["username"]);
header("location:Login(Admin).php");
?>