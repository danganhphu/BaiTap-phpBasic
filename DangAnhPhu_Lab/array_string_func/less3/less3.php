<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

    function createArray($n)
    {
        $arr = [];
        for($i = 0; $i < $n; $i++)
            $arr[$i] = rand(0,20);
        return $arr;
    }
    function showArray($arr)
    {
        foreach ($arr as $value)
            echo "$value ";
    }
    function findMin($arr)
    {
        $min = min($arr);
        return $min;
    }
    function findMax($arr)
    {
        $max = max($arr);
        return $max;
    }
    function sumArray($arr)
    {
        $sum = 0;
        foreach ($arr as $value)
            $sum += $value;
        return $sum;
    }
    if(isset($_POST["submit"]))
    {
        $n = $_POST["n"];

        if(isset($n))
        {
            $arr = createArray($n);
            $minArr = findMin($arr);
            $maxArr = findMax($arr);
            $sumArray = sumArray($arr);
        }
    }
?>
    <form action="" method="post">
        <table align="center" style="background-color: #F5D5AE;">
            <thead>
                <tr>
                    <th colspan="2" style="background-color: #FFE15D">PHÁT SINH MẢNG VÀ TÍNH TOÁN</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nhập số phần tử:</td>
                    <td><input type="text" name="n" value="<?php if(isset($n)) echo $n; else echo ""?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" name="submit">Phát sinh và tính toán</button></td>
                </tr>
                <tr>
                    <td>Mảng:</td>
                    <td><textarea name="arr" cols="30" rows="5" disabled ><?php if(isset($arr)) {
                    showArray($arr);
                    } else echo ""?></textarea></td>
                </tr>
                <tr>
                    <td>GTLN (Max) trong mảng:</td>
                    <td><input type="text" disabled value="<?php if(isset($maxArr)) echo $maxArr; else echo ""?>"> </td>
                </tr>
                <tr>
                    <td>GTNN (Min) trong mảng:</td>
                    <td><input type="text" disabled value="<?php if(isset($minArr)) echo $minArr; else echo ""?>"></td>
                </tr>
                <tr>
                    <td>Tổng mảng:</td>
                    <td><input type="text" name="sumArray" disabled value="<?php if(isset($sumArray)) echo $sumArray; else echo ""?>"></td>
                </tr>
                <tr>
                    <td colspan = "2">(<label style="color:red">Ghi chú:</label> các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</td>
                </tr>
            </tbody>
        </table>
    </form>
</body>
</html>