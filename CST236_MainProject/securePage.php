<?php

include_once 'header.php';

if (isset($_SESSION['principle']) == false || $_SESSION[principle] == null || $_SESSION['principle'] == false) {
    header("Location: login.html");
}