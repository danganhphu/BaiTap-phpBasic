<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 4</title>
</head>
<body>
    <?php
        function findX($arr, $number_search){
            foreach ($arr as $key => $value){
                if ($value == $number_search)
                    return $key;
            }
            return false;
        }
        if(isset($_POST["submit"]))
        {
            $arr = $_POST["arr"];
            $number_search = $_POST["numberSearch"];
            if(isset($arr)){
                $arr = trim($arr);
                $arrStr = explode(",", $arr);
                if(isset($number_search))
                {
                    if(findX($arrStr, $number_search))
                    {
                        $index = findX($arrStr, $number_search);
                        $result = "Tìm thấy $number_search tại vị trí thứ $index của mảng";
                    }
                    else $result = "Không tìm thấy số $number_search trong mảng ";
                }
            }
        }
    ?>
    <form action="" method="post">
        <table align="center" style="background-color: #F5D5AE;">
            <thead>
                <tr>
                    <th colspan="2" style="background-color: #FFE15D">Tìm kiếm</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nhập mảng:</td>
                    <td><input type="text" name="arr" value="<?php if(isset($arr)) echo "$arr"; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td>Nhập số cần tìm:</td>
                    <td><input type="text" name="numberSearch" value="<?php if(isset($num)) echo "$num"; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" name="submit">Tìm kiếm</button></td>
                </tr>
                <tr>
                    <td>Mảng: </td>
                    <td><textarea cols="25" rows="2" disabled><?php if(isset($arrStr)) foreach ($arrStr as $value) echo "$value "; else echo ""; ?>
                    </textarea></td>
                </tr>
                <tr>
                    <td>Kết quả tìm kiếm: </td>
                    <td><textarea cols="25" rows="2" disabled><?php if(isset($result)) echo $result; else echo ""?> 
                    </textarea></td>
                </tr>
                <tr>
                    <td colspan="2">(Các phần tử được ngăn cách nhau bởi dấu ",")</td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>