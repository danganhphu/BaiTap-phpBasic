<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 1</title>
</head>
<body>
<?php
    if(isset($_POST["submit"]))
        $n = $_POST["n"];     
?>
    <form action="" method="post">
        <table align="center" style="background-color: #F5D5AE;">
            <thead>
                <tr>
                    <th colspan="2" style="background-color: #FFE15D">Kiểm tra một số</th>
                </tr>
            </thead>
           <tbody>
                <tr>
                        <td>Nhập n:</td>
                        <td><input type="text" name="n" value="<?php if(isset($_POST["n"])) if(isset($_POST["reset"])) echo ""; else echo $n;?>" required></td>
                </tr>
                <tr>
                        <td></td>
                        <td><button type="submit" name="submit">Thực hiện</button>
                        <button type="submit" name="reset">Reset</button></td>
                </tr>
           </tbody> 
        </table>
    </form>
    <?php
        if(isset($_POST["submit"]))
        {
            if(isset($n))
            {
                if($n > 0 )
                {
                    $arr = [];
                    for($i = 0; $i < $n; $i++){
                        $arr[$i] = rand(-10, 10);
                    }
                    echo "Mảng phát sinh là: ";
                    for($i = 0; $i < $n; $i++){
                        echo "$arr[$i], ";
                    }
                    echo "<br>Số Chẵn: ";
                    echo countEven($arr);
                    echo "<br>Số lẻ: ";
                    echo countLessValueOneHundred($arr);
                    echo "<br>Tổng số âm: ";
                    echo sumNegatives($arr);
                    echo "<br>Vị trí số âm: ";
                    findIndexValueZero($arr);
                    sapXepTang($arr, $n);
                    echo " <br> Đã sắp xếp:";
                    foreach ($arr as $value) {
                        echo "$value ";
                    }
                }
            }
        }

        function countEven($arr){
            $dem= 0;
            foreach ($arr as $value) {
                if ($value %2 == 0 && $value != 0)
                    $dem++;
            }
            return $dem;
        }
        function countLessValueOneHundred($arr){
            $dem= 0;
            foreach ($arr as $value) {
                if ($value < 100)
                    $dem++;
            }
            return $dem;
        }

        function sumNegatives($arr){
            $sum= 0;
            foreach ($arr as $value) {
                if ($value < 0)
                    $sum += $value;
            }
            return $sum;
        }

        function findIndexValueZero($arr){
            $dem = 0;
            foreach ($arr as $key => $value) {
                if ($value === 0) {
                    $dem++;
                    echo "$key, ";
                }
            }
            if($dem == 0)
            {
                echo "Không có số 0 trong mảng";
            }
        }
        function swap(&$i, &$j)
        {
            $tam = $i;
            $i = $j;
            $j = $tam;
        }
        function sapXepTang(&$arr, $n){
            for($i = 0; $i < $n; $i++)
            {
                for($j = $i+1; $j < $n; $j++)
                {
                    if ($arr[$j] < $arr[$i])
                    swap($arr[$i], $arr[$j]);
                }
            }
        }
    ?>
</body>
</html>