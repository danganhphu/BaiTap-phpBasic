<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 2</title>
</head>
<body>
    <?php
        if(isset($_POST["submit"]))
        {
            $tong = 0;
            $num = $_POST["num"];
            $numbers = trim($num);

            $arr = explode(",", $numbers);
            foreach($arr as $value)
            {
                $tong += $value;
            }
        }
    ?>
    <form action="" method="post">
        <table align="center" style="background-color: #F5D5AE;">
            <thead>
                <tr>
                    <th colspan="2" style="background-color: #FFE15D">Nhập và tính trên dãy số</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nhập dãy số:</td>
                    <td><input type="text" name="num" value="<?php if(isset($num)) echo "$num"; else echo ""; ?>"><label style="color:red">(*)</label></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" name="submit" style="background-color: #50577A; color: #D6E4E5">Tổng dãy số</button></td> 
                </tr>
                <tr>
                    <td>Tổng dãy số: </td>
                    <td><input type="text" value="<?php if(isset($tong)) echo $tong; else echo "";?>" disabled></td>
                </tr>
                <tr>
                <td colspan="2"><label style="color:red">(*)</label>Các số được nhập cách nhau bằng dấu ","</td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>