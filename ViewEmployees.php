<?php require ("controller_employees.php"); ?>   
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>Membership</title>
</head>

<style>
    .kotak {
        width: 200px;
        height: 200px;
        border: 2px solid black;
        background-color: lightblue;
        padding: 20px;
        margin: 10px;
    }
</style>

<body>
    <div class="container p-3" style="border: 2px solid black; margin-top: 15px;">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="ViewEmployees.php">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ViewOffices.php">Office</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ViewOfficesEmployee.php">Office-Employees</a>
                    </li>
                </ul>

                <h1 style="text-align: center;">List Karyawan</h1>
                <table class="table table-dark table-striped" style="margin-bottom: 15px;">
                    <thead style="border: 2px white;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Usia</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 0;
                        $allkaryawan = getKaryawan();
                        foreach ($allkaryawan as $index => $karyawan) {
                            $counter++;
                        ?>
                        <tr>
                            <th scope="row"><?=$counter?></th>
                            <td><?=$karyawan->nama?></td>
                            <td><?=$karyawan->jabatan?></td>
                            <td><?=$karyawan->usia?></td>
                            <td>
                                <a href="Controller_employees.php?deleteID=<?=$index?>">
                                <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                        <?php 
                        } 
                        ?>
                    </tbody>
                </table>

                <h1 style="text-align: center;">Tambah Karyawan</h1>
                <form method="POST" action="Controller_employees.php" class="row g-3" style="margin-bottom: 15px;">
                <div class="col-12">
                    <label for="inputNama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="inputNama" placeholder="Masukkan Nama Anda">
                </div>
                <div class="col-12">
                    <label for="inputJabatan" class="form-label">Jabatan</label>
                    <input type="text" class="form-control" name="inputJabatan" placeholder="Masukkan Jabatan Anda">
                </div>
                <div class="col-12">
                    <label for="inputUsia" class="form-label">Usia</label>
                    <input type="text" class="form-control" name="inputUsia" placeholder="Masukkan Usia Anda">
                </div>
                <div class="col-12" style="text-align: center;">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>