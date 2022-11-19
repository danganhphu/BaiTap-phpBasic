<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 3</title>
</head>
<?php
    if(isset($_POST['submit'])){
        $tenChuHo = $_POST['tenChuHo'];
        $chiSoCu = $_POST['chiSoCu'];
        $chiSoMoi = $_POST['chiSoMoi'];
        $donGia = $_POST['donGia'];
        if (isset($chiSoCu) && isset($chiSoMoi) && is_numeric($chiSoCu) && is_numeric($chiSoMoi) && $chiSoCu > 0 && $chiSoMoi > 0 && $chiSoCu < $chiSoMoi)
        {
            $tien = ($chiSoMoi-$chiSoCu)*$donGia;
        }
        else {
            $chiSoCu = "Nhập sai chỉ số cũ";
            $chiSoMoi = "Nhập sai chỉ số mới";
        }
    }
    if(isset($_POST['reset'])){
        $tenChuHo = "";
        $chiSoCu = "";
        $chiSoMoi = "";
    }
?>
<body>
    <form action="" method="post">
        <table align="center" style="background-color: #F5D5AE;">
            <thead>
                <tr>
                    <th colspan="3" style="background-color: #3A8891; color: #D6E4E5">THANH TOÁN TIỀN ĐIỆN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tên chủ hộ:</td>
                    <td><input type="test" required value="<?php if (isset($tenChuHo)) echo$tenChuHo; else echo"";?>" name="tenChuHo"></td>
                </tr>
                <tr>
                    <td>Chỉ số cũ:</td>
                    <td><input type="text" value="<?php if (isset($chiSoCu)) echo$chiSoCu; else echo"";?>" name="chiSoCu"></td>
                    <td>(Kw)</td>
                </tr>
                <tr>
                    <td>Chỉ số mới:</td>
                    <td><input type="text" value="<?php if (isset($chiSoMoi)) echo$chiSoMoi; else echo "";?>" name="chiSoMoi"></td>
                    <td>(Kw)</td>
                </tr>
                <tr>
                    <td>Đơn giá:</td>
                    <td><input type="text" value="2000" name="donGia" readonly></td>
                    <td>(VNĐ)</td>
                </tr>
                <tr>
                    <td>Số tiền thanh toán:</td>
                    <td><input type="text" value="<?php if (isset($tien)) echo $tien; else echo "";?> " name="tien" disabled></td>
                    <td>(VNĐ)</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center">
                        <button type="submit" name="submit">Tính</button>
                        <button type="submit" name="reset">Reset</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</body>

</html>