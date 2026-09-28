<?php
include_once("ModelKaryawan.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['karyawan'])) {
    $_SESSION['karyawan'] = array();
} 

function createKaryawan(){
    $karyawan = new karyawan();
    $karyawan->nama = $_POST['inputNama'];
    $karyawan->jabatan = $_POST['inputJabatan'];
    $karyawan->usia = $_POST['inputUsia'];
    array_push($_SESSION['karyawan'], $karyawan);
} 

function getKaryawan(){
    return $_SESSION['karyawan'];
}

function deleteKaryawan($karyawanIndex){
    unset($_SESSION['karyawan'][$karyawanIndex]);
}

if (isset($_POST['submit'])) {
    createKaryawan();
    header("Location: ViewEmployees.php");
}

if (isset($_GET['deleteID'])) { 
    deleteKaryawan($_GET['deleteID']);
    header("Location: ViewEmployees.php");
}
?>