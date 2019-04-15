<?php

include_once '../../../header.php';

if (!isset($_SESSION['principle']) || $_SESSION['principle'] == NULL || $_SESSION['principle'] == false){
    session_destroy();
    header("Location: login.php");
}