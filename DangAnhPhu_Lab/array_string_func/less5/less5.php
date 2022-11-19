<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5</title>
</head>
<body>
    <?php
        function thayThe($arr, $number_replace, $num_rep)
        {
            $newArr = [];
            foreach ($arr as $key => $value) {
                if ($value == $number_replace)
                    $newArr[$key] = $num_rep;
                else
                    $newArr[$key] = $value;
            }
            return $newArr;
        }

        if(isset($_POST["submit"]))
        {
            $arr = $_POST["array"];
            $number_replace = $_POST["number_replace"];
            $num_rep = $_POST["num_rep"];
            if(isset($arr)){
                $arr = trim($arr);
                $arrStr = explode(",", $arr);
                if(isset($number_replace) && isset($num_rep))
                {
                    $newArr = thayThe($arrStr, $number_replace, $num_rep);
                }
            }
        }
    ?>
    <form action="" method="post">
        <table align="center" style="background-color: #F5D5AE;">
            <thead>
                <tr>
                    <th colspan="2" style="background-color: #FFE15D">Thay thế</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nhập các phần tử:</td>
                    <td><input type="text" name="array" value="<?php if(isset($arr)) echo "$arr"; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td>Giá trị cần thay thế:</td>
                    <td><input type="text" name="number_replace" value="<?php if(isset($number_replace)) echo "$number_replace"; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td>Giá trị thay thế:</td>
                    <td><input type="text" name="num_rep" value="<?php if(isset($num_rep)) echo "$num_rep"; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" name="submit">Thay thế</button></td>
                </tr>
                <tr>
                    <td>Mảng cũ:</td>
                    <td><input type="text" disabled value="<?php if(isset($arrStr)) foreach($arrStr as $value)
                    echo "$value "; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td>Mảng mới sau thay thế:</td>
                    <td><input type="text" disabled value="<?php if(isset($newArr)) foreach($newArr as $value)
                    echo "$value "; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2">(<label style="color:red">Ghi chú:</label> Các phần tử trong mảng ngăn cách nhau bởi dấu ",")</td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>