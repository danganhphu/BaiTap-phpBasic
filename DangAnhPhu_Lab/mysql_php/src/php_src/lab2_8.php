<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2.8</title>
    <style>
        
        .content {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        table, th, td {
            border: 1px groove #D3E4DB;
        }
        .content-table thead tr {
            color: #D10E4C;
            text-align: center;
            font-weight: bold;
        }
        
        .image-items {
            width: 100px;
            height: 100px;
        }
        .heading {
            margin-top: -20px;
        }
        .heading p {
            margin-top: -10px;
        }
        /* .content-table tbody tr:nth-of-type(odd) {
            background-color: #B3D0C7;
        }        */
        /* pagination  */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }
        
        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            
        }

        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }

        .pagination a:hover:not(.active) {
            background-color: #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class="app">
    <div class="content">
        <table class="content-table">
            <thead>
                <tr>
                    <th colspan="2">Thông tin chi tiết các loại sữa</th>
                </tr>
            </thead>
            <tbody>
    <?php
        require('../../db_helper/DB_driver.php');
        $DB = new DB_driver();
        $rowPerPage = 2;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $offset = ($page - 1) * $rowPerPage;
        $query = "SELECT Ma_sua, Hinh, Ten_sua, Ten_hang_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich
        FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua";
        $result = $DB->get_list($query);
        $numRow = count($result);

        $query= "SELECT Ma_sua, Hinh, Ten_sua, Ten_hang_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich
        FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua
        LIMIT $offset, $rowPerPage";
        $result = $DB->get_list($query);
        // var_dump($result);
        $maxPage = ceil($numRow / $rowPerPage);
        foreach ($result as $value) {
                   echo'
                    <tr style="background-color: #FFEEE6">
                        <td colspan="2" style ="text-align: center; font-size: 20px; color: #33434f; font-weight: 700;">'.$value['Ten_sua'].' - '.$value['Ten_hang_sua'].'</td>
                    </tr>
                    <tr>
                        <td><img src="../assets/images/'.$value['Hinh'].'" alt=""></td>
                        <td>
                            <h4>Thành phần dinh dưỡng</h4>
                            <span>'.$value['TP_Dinh_Duong'].'</span>
                            <p><b>Lợi ích:</b></p>
                            <span>'.$value['Loi_ich'].'</span>
                            <p><b>Trọng lượng:</b>
                                <span style="color: #eb3461">'.$value['Trong_luong'].' gr - </span><b>Đơn giá :</b><span style="color: #eb3461">'.$value['Don_gia'].' VNĐ </span>
                            </p>
                        </td>
                    </tr>
                   ';
        }
    ?>
            </tbody>
        </table>
    </div>
    <div class="pagination">
    <?php
        $firstPage = 1;
        echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$firstPage.">&laquo;</a>"; 
        $prePage = $page - 1;
        if($prePage === 0)
            $prePage = $maxPage;
        echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$prePage.">&lsaquo;</a>";

        for($i = 1; $i <= $maxPage; $i++ ){
            $class  = ( $page == $i ) ? "active" : "";
            echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$i." class=".$class."> ".$i." </a>";
        }
        
        $nextPage = $page + 1;
        if($nextPage == $maxPage+1)
            $nextPage = 1;
        echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$nextPage.">&rsaquo; </a>"; 
        $lastPage = $maxPage;
        echo "<a href=".$_SERVER ['PHP_SELF']."?page=".$lastPage.">&raquo;</a>";  
        
    ?>
    </div>
</div>
</body>
</html>