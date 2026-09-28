<?php
include_once("ModelOffice.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['kantor'])) {
    $_SESSION['kantor'] = array();
} 

function createKantor(){
    $kantor = new Office();
    $kantor->Office_nama = $_POST['inputOfficeName'];
    $kantor->Address = $_POST['inputAddress'];
    $kantor->City = $_POST['inputCity'];
    $kantor->Phone = $_POST['inputPhone'];
    array_push($_SESSION['kantor'], $kantor);
} 

function getKantor(){
    return $_SESSION['kantor'];
}

function deleteKantor($kantorIndex){
    unset($_SESSION['kantor'][$kantorIndex]);
}

if (isset($_POST['submit'])) {
    createKantor();
    header("Location: ViewOffices.php");
}

if (isset($_GET['deleteID'])) { 
    deleteKantor($_GET['deleteID']);
    header("Location: ViewOffices.php");
}
?>