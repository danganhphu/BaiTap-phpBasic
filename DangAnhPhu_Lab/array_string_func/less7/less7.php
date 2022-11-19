<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 7</title>
</head>
<body>
    <?php
        $arrCan = [
            "Quý", "Giáp", "Ất", "Bính", "Đinh", "Mậu", "Kỷ", "Canh", "Tân", "Nhâm"
        ];
        $arrChi = [
            "Hợi", "Tý", "Sửu", "Dần", "Mão", "Thìn", "Tỵ", "Ngọ", "Mùi", "Thân", "Dậu", "Tuất"
        ];
        $arrImg = [
            "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-12.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-1.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-2.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-3.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-4.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-5.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-6.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-7.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-8.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-9.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-10.jpg", "https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-11.jpg"
        ];

        if(isset($_POST["submit"]))
        {
            $namDuong = $nam_duong = $_POST["namDuong"];
            if(isset($namDuong) && is_numeric($namDuong))
            {
                $namDuong = $namDuong - 3;
                $can = $namDuong % 10;
                $chi = $namDuong % 12;
                $namAm = $arrCan[$can];
                $namAm = $namAm ." ".$arrChi[$chi];
                $srcImg = $arrImg[$chi];
            }
        }
    ?>
    <form action="" method="post">
        <table align="center" style="background-color: #F5D5AE;">
            <thead>
                <tr>
                    <th colspan="3" style="background-color: #FFE15D; font-size: 22px; font-weight: bold">Tính năm âm lịch</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Năm dương lịch</td>
                <td></td>
                <td>Năm âm lịch</td>
                </tr>
                <tr>
                    <td><input type="text" name="namDuong" value="<?php if(isset($nam_duong)) echo $nam_duong; else echo ""; ?>"></td>
                    <td><button type="submit" name="submit"> =></button></td>
                    <td><input type="text" disabled value="<?php if(isset($namAm)) echo $namAm; else echo ""; ?>" ></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; padding-top:20px">
                        <img src="<?php if(isset($srcImg)) echo $srcImg; else echo "";?>" onerror=" this.src = 'https://img.meta.com.vn/Data/image/2021/12/24/hinh-anh-12-con-giap-6.jpg';" width=300px height=200px alt="img con giáp">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>