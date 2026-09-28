<?php
include_once("ModelKaryawan.php");
include_once("ModelOffice.php");
include_once("ModelOfficeEmployee.php");

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once("Controller_employees.php");
include_once("Controller_offices.php");

if (!isset($_SESSION['office_employees'])) {
    $_SESSION['office_employees'] = array();
}

function createOfficeEmployee() {
    $officeEmployee = new OfficeEmployee();
    $officeEmployee->employeeName = $_POST['inputKaryawan'] ?? '';
    $officeEmployee->officeName   = $_POST['inputOffice'] ?? '';
    $officeEmployee->karyawanNama = $_POST['inputKaryawan'] ?? '';
    $officeEmployee->officeNama   = $_POST['inputOffice'] ?? '';
    
    array_push($_SESSION['office_employees'], $officeEmployee);
}

function getOfficeEmployees() {
    return $_SESSION['office_employees'];
}

// Fungsi Hapus Relasi
function deleteOfficeEmployee($index) {
    if (isset($_SESSION['office_employees'][$index])) {
        unset($_SESSION['office_employees'][$index]);
        // Re-index array agar urutan kunci tidak loncat
        $_SESSION['office_employees'] = array_values($_SESSION['office_employees']);
    }
}

// Proses jika form disubmit
if (isset($_POST['submit_office_employee'])) {
    createOfficeEmployee();
    header("Location: ViewOfficesEmployee.php");
    exit();
}

// Proses jika tombol Delete diklik
if (isset($_GET['deleteID'])) {
    deleteOfficeEmployee($_GET['deleteID']);
    header("Location: ViewOfficesEmployee.php");
    exit();
}

// Fitur Tambahan: Reset Session corrupt via URL (ViewOfficesEmployee.php?clear=true)
if (isset($_GET['clear'])) {
    unset($_SESSION['office_employees']);
    header("Location: ViewOfficesEmployee.php");
    exit();
}
?>