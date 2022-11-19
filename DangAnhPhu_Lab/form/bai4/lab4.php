<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
</head>
<?php
    if(isset($_POST['submit'])){
        $toan = $_POST['toan'];
        $ly = $_POST['ly'];
        $hoa = $_POST['hoa'];
        $diemChuan = $_POST['diemChuan'];
        if (isset($toan) && isset($ly) && isset($hoa) && isset($diemChuan) && is_numeric($hoa) && is_numeric($ly) && is_numeric($toan) &&is_numeric($diemChuan) && $toan >= 0 && $ly >= 0 && $hoa >= 0 && $diemChuan > 0)
        {
            $tong = round($toan + $ly + $hoa, 1);

            if($tong >= $diemChuan & $toan > 0 && $ly > 0 && $hoa > 0)
                $result = "Đậu";
            else
                $result = "Rớt";
        }
        else 
            $toan = $ly = $hoa =$diemChuan = "Nhập sai giá trị";
    }
    if(isset($_POST['reset'])){
        $toan = $ly = $hoa = $diemChuan = '';
    }
?>
<body>
    <form action="" method="post">
        <table align="center" style="background-color: #F5D5AE;">
            <thead>
                <tr>
                    <th colspan="2" style="background-color: #FFE15D">KẾT QUẢ THI ĐẠI HỌC</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Toán:</td>
                    <td><input type="test" required value="<?php if (isset($toan)) echo$toan; else echo"";?>" name="toan"></td>
                </tr>
                <tr>
                    <td>Lý:</td>
                    <td><input type="text" value="<?php if (isset($ly)) echo$ly; else echo"";?>" name="ly"></td>
                </tr>
                <tr>
                    <td>Hóa:</td>
                    <td><input type="text" value="<?php if (isset($hoa)) echo$hoa; else echo "";?>" name="hoa"></td>
                </tr>
                <tr>
                    <td>Điểm chuẩn:</td>
                    <td><input type="text" value="<?php if(isset($diemChuan)) echo $diemChuan; else echo ""?>" name="diemChuan" ></td>
                </tr>
                <tr>
                    <td>Tổng điểm:</td>
                    <td><input type="text" value="<?php if(isset($tong)) echo $tong; else echo ""?>" disabled></td>
                </tr>
                <tr>
                    <td>Kết quả thi:</td>
                    <td><input type="text" value="<?php if (isset($result)) echo $result; else echo "";?> " name="result" disabled></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center">
                        <button type="submit" name="submit">Xem kết quả</button>
                        <button type="submit" name="reset">Reset</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>