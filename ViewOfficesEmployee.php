<?php
include_once("ModelKaryawan.php");
include_once("ModelOffice.php");
include_once("ModelOfficeEmployee.php");
include_once("ControllerOfficeEmployee.php");

$daftarKaryawan = getKaryawan();
$daftarKantor   = getKantor();
$daftarRelasi   = getOfficeEmployees();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Office Employees</title>
    <style>
        * { box-sizing: border-box; font-family: Arial, sans-serif; margin: 0; padding: 0; }
        body { background: #f4f4f4; display: flex; justify-content: center; padding-top: 20px; }
        .container { width: 380px; background: #fff; border: 1.5px solid #000; padding-bottom: 25px; }
        
        /* Navbar Header */
        .navbar { background: #bce3fa; border-bottom: 1.5px solid #000; padding: 8px 12px; font-size: 13px; font-weight: bold; }
        .navbar a { color: #000; text-decoration: none; }
        
        /* Judul */
        h1 { text-align: center; color: #3f4791; font-size: 26px; font-weight: normal; margin: 20px 0; }
        
        /* Tabel */
        .table-container { padding: 0 35px; margin-bottom: 25px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #7f7f7f; padding: 8px 10px; font-size: 14px; text-align: left; }
        th { background: #9fe0ff; font-weight: normal; }
        
        .form-container { display: flex; flex-direction: column; align-items: center; }
        .form-group { display: flex; align-items: center; justify-content: center; width: 100%; margin-bottom: 0; }
        .form-group label { width: 90px; font-size: 14px; text-align: left; }
        
        .select-wrapper { position: relative; width: 170px; }
        .select-wrapper select { 
            width: 100%; 
            padding: 8px 30px 8px 10px; 
            font-size: 14px; 
            border: 1px solid #7f7f7f; 
            background: #fff; 
            appearance: none; 
            -webkit-appearance: none;
            cursor: pointer;
            margin-top: -1px; /* Membuat border menyatu atas-bawah */
        }
        
        /* Panah Segitiga Dropdown */
        .select-wrapper::after { 
            content: ""; 
            position: absolute; 
            right: 12px; 
            top: 50%; 
            transform: translateY(-50%); 
            border-left: 7px solid transparent; 
            border-right: 7px solid transparent; 
            border-top: 10px solid #333; 
            pointer-events: none; 
        }
        
        /* Tombol Save */
        .btn-save { 
            margin-top: 20px; 
            background: #9fe0ff; 
            border: 1.5px solid #333; 
            border-radius: 8px; 
            padding: 6px 30px; 
            font-size: 14px; 
            cursor: pointer; 
        }
        .btn-delete { background: #ff4d4d; color: #fff; text-decoration: none; padding: 3px 6px; font-size: 11px; border-radius: 4px; }
    </style>
</head>
<body>

<div class="container">
    <div class="navbar">
        <a href="ViewEmployees.php">Employee</a> | 
        <a href="ViewOffices.php">Office</a> | 
        <a href="ViewOfficesEmployee.php">Office-Employees</a>
    </div>

    <h1>Office Employees</h1>

    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th style="width: 40%;">Employee</th>
                    <th style="width: 40%;">Office</th>
                    <th style="width: 20%; text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($daftarRelasi)): ?>
                    <?php foreach ($daftarRelasi as $index => $item): ?>
                        <?php if (is_string($item)) continue; ?>
                        <tr>
                            <td><?= htmlspecialchars($item->karyawanNama ?? $item->employeeName ?? '-'); ?></td>
                            <td><?= htmlspecialchars($item->officeNama ?? $item->officeName ?? '-'); ?></td>
                            <td style="text-align: center;">
                                <a href="ControllerOfficeEmployee.php?deleteID=<?= $index; ?>" class="btn-delete" onclick="return confirm('Hapus baris ini?')">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="3" style="text-align: center; color: #666;">Belum ada data relasi.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <form action="ControllerOfficeEmployee.php" method="POST" class="form-container">
        <div class="form-group">
            <label for="inputKaryawan">Employee</label>
            <div class="select-wrapper">
                <select name="inputKaryawan" id="inputKaryawan" required>
                    <option value="" disabled selected>Pilih Employee</option>
                    <?php foreach ($daftarKaryawan as $k): ?>
                        <option value="<?= htmlspecialchars(is_object($k) ? $k->nama : $k); ?>">
                            <?= htmlspecialchars(is_object($k) ? $k->nama : $k); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputOffice">Office</label>
            <div class="select-wrapper">
                <select name="inputOffice" id="inputOffice" required>
                    <option value="" disabled selected>Pilih Office</option>
                    <?php foreach ($daftarKantor as $o): ?>
                        <option value="<?= htmlspecialchars(is_object($o) ? $o->Office_nama : $o); ?>">
                            <?= htmlspecialchars(is_object($o) ? $o->Office_nama : $o); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <button type="submit" name="submit_office_employee" class="btn-save">SAVE</button>
    </form>
</div>

</body>
</html>