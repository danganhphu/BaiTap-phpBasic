<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2.1</title>
    <style>
        .app {
            display: flex;
        }
        table {
            margin: auto;
        }
        table, th, td {
            border: 1px ridge #84a98c;
        }
    </style>
</head>
<body>
    <div class="app">
        <table>
            <thead>
                <tr>
                    <th>Mã HS</th>
                    <th>Tên hãng sữa</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
<?php
    require('../../db_helper/DB_driver.php');
    $DB = new DB_driver();
    $hangSuaList = $DB->get_list('SELECT * FROM hang_sua');
    foreach ($hangSuaList as $hangSua){
        echo '
            <tr> 
                <td>'.$hangSua['Ma_hang_sua'].'</td>
                <td>'.$hangSua['Ten_hang_sua'].'</td>
                <td>'.$hangSua['Dia_chi'].'</td>
                <td>'.$hangSua['Dien_thoai'].'</td>
                <td>'.$hangSua['Email'].'</td>
            </tr>
        ';
    }
?>
            </tbody>
        </table>
    </div>
</body>
</html>
