<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab2.4</title>
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
        .table-item_phai {
            text-align: center;
        }
        .content-table tbody tr:nth-of-type(odd) {
            background-color: #B3D0C7;
        }       
        /* pagination  */
        .pagination {
            
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -40%);
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
                    <th>Số TT</th>
                    <th>Tên sữa</th>
                    <th>Hãng sữa</th>
                    <th>Loại sữa</th>
                    <th>Trọng lượng</th>
                    <th>Đơn giá</th>
                </tr>
            </thead>
            <tbody>
    <?php
        require('../../db_helper/DB_driver.php');
        $DB = new DB_driver();
        $rowPerPage = 7;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;

        $offset = ($page - 1) * $rowPerPage;
        $query = "SELECT Ma_sua, Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia
        FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
        inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua";
        $result = $DB->get_list($query);
        $numRow = count($result);

        $query= "SELECT Ten_sua, Ten_hang_sua, Ten_Loai, Trong_luong, Don_gia
            FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua 
            inner join loai_sua on sua.Ma_loai_sua = loai_sua.Ma_loai_sua
            LIMIT $offset, $rowPerPage";
        $result = $DB->get_list($query);
        $maxPage = ceil($numRow / $rowPerPage);
        $dem = 1;
        $soTT = ($page * $rowPerPage) - ($rowPerPage - $dem) ;
        foreach ($result as $value) {
            echo '
                <tr> 
                    <td>'.$soTT++.'</td>
                    <td>'.$value['Ten_sua'].'</td>
                    <td>'.$value['Ten_hang_sua'].'</td>
                    <td>'.$value['Ten_Loai'].'</td>
                    <td>'.$value['Trong_luong'].'</td>
                    <td>'.$value['Don_gia'].'</td>
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