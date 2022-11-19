<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
</head>
<body>
    <form action="" method="get" style="width: 270px; margin: 0 auto;">
        <table style="background-color: #F5D5AE;">
            <thead>
                <tr><th colspan="2" style="background-color: #FFE15D">DIỆN TÍCH HÌNH CHỮ NHẬT</th></tr>
            </thead>
            <tbody>
                <tr>
                    <td>Chiều dài:</td>
                    <td><input type="test" required value="<?php if (isset($_GET['chieuDai']))
                    if(isset($_GET['reset']))
                    echo "";
                    else echo $_GET['chieuDai']; ?>" name="chieuDai"></td>
                </tr>
                <tr>
                    <td>Chiều rộng:</td>
                    <td><input type="test" value="<?php if (isset($_GET['chieuRong'])) 
                    if(isset($_GET['reset']))
                    echo "";
                    else echo $_GET['chieuRong']; ?>" name="chieuRong" required></td>
                </tr>
                <tr>
                    <td>Diện tích:</td>
                    <td><input type="text" value="<?php if(isset($_GET['reset']))
                    echo ""; else if (isset($_GET['chieuDai']) && isset($_GET['chieuRong'])) echo  $_GET['chieuDai'] * $_GET['chieuRong']; else echo ""?>" disabled></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit" name="value">Tính</button>
                        <button type="submit" name="reset">Reset</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form> 
</body>
</html>