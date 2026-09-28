<?php require ('Controller_offices.php'); ?>
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
                        <a class="nav-link" href="ViewEmployees.php">Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="ViewOffices.php">Office</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ViewOfficesEmployee.php">Office-Employees</a>
                    </li>
                </ul>

                <h1 style="text-align: center;">List Kantor</h1>
                <table class="table table-dark table-striped" style="margin-bottom: 15px;">
                    <thead style="border: 2px white;">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kantor</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Kota</th>
                            <th scope="col">No. Telepon</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $counter = 0;
                        $allkantor = getKantor();
                        foreach ($allkantor as $index => $kantor) {
                            $counter++;
                        ?>
                        <tr>
                            <th scope="row"><?=$counter?></th>
                            <td><?=$kantor->Office_nama?></td>
                            <td><?=$kantor->Address?></td>
                            <td><?=$kantor->City?></td>
                            <td><?=$kantor->Phone?></td>
                            <td>
                                <a href="Controller_offices.php?deleteID=<?=$index?>">
                                <button class="btn btn-danger">Delete</button>
                                </a>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

                <h1 style="text-align: center;">Tambah Kantor</h1>
                <form class="row g-3" style="margin-bottom: 15px;" action="Controller_offices.php" method="POST">
                <div class="col-12">
                    <label for="inputOfficeName" class="form-label">Nama Kantor</label>
                    <input type="text" class="form-control" name="inputOfficeName" placeholder="Masukkan Nama Kantor Anda">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Alamat</label>
                    <input type="text" class="form-control" name="inputAddress" placeholder="Masukkan Alamat Kantor Anda">
                </div>
                <div class="col-12">
                    <label for="inputCity" class="form-label">Kota</label>
                    <input type="text" class="form-control" name="inputCity" placeholder="Masukkan Kota Kantor Anda">
                </div>
                <div class="col-12">
                    <label for="inputPhone" class="form-label">No. Telepon</label>
                    <input type="text" class="form-control" name="inputPhone" placeholder="Masukkan No. Telepon Kantor Anda">
                </div>
                <div class="col-12" style="text-align: center;">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>