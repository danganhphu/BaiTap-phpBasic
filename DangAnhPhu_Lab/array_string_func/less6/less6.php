<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 6</title>
</head>
<body>
    <?php
        function swap(&$i, &$j)
        {
            $tam = $i;
            $i = $j;
            $j = $tam;
        }

        function sortDESC($arr){
            for($i = 0; $i < count($arr); $i++)
            {
                for($j = $i+1; $j < count($arr); $j++)
                {
                    if ($arr[$j] < $arr[$i])
                    swap($arr[$i], $arr[$j]);
                }
            }
            $newArr = [];
            foreach ($arr as $key => $value)
                $newArr[$key] = $value;
            return $newArr;
        }

        function sortASC($arr){
            for($i = 0; $i < count($arr); $i++)
            {
                for($j = $i+1; $j < count($arr); $j++)
                {
                    if ($arr[$j] > $arr[$i])
                    swap($arr[$i], $arr[$j]);
                }
            }
            $newArr = [];
            foreach ($arr as $key => $value)
                $newArr[$key] = $value;
            return $newArr;
        }
        if(isset($_POST["submit"]))
        {
            $arr = $_POST["arr"];
            if(isset($arr)){
                $arr = trim($arr);
                $arrStr = explode(",", $arr);

                $arrDESC = sortDESC($arrStr);
                $arrASC = sortASC($arrStr);
            }
        }
    ?>
    <form action="" method="post">
        <table align="center" style="background-color: #F5D5AE;">
            <thead>
                <tr>
                    <th colspan="2" style="background-color: #FFE15D;">Sắp xếp mảng</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nhập mảng:</td>
                    <td><input type="text" name="arr" value="<?php if(isset($arr)) echo "$arr"; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan="2"><button type="submit" name="submit">Sắp xếp tăng dần / giảm dần</button></td>
                </tr>
                <tr>
                    <td colspan="2">Sau khi sắp xếp</td>
                </tr>
                <tr>
                    <td>Tăng dần:</td>
                    <td><input type="text" disabled value="<?php if(isset($arrDESC)) foreach($arrDESC as $value)
                    echo "$value "; else echo ""; ?>"></td>
                </tr>
                <tr>
                    <td>Giảm dần:</td>
                    <td><input type="text" disabled value="<?php if(isset($arrASC)) foreach ($arrASC as $value)
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