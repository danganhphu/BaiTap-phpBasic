<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>
    <style>
        h2 {
            width: 400px;
            height : 50px;
            text-align: center;
            background-color: #FF9F9F;
            margin-left: 480px;
            line-height: 50px;
            border-radius: 50px;
        }
        .back {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        .back > button {
            background-color: #D6E4E5;
            border: 1px solid #A9AF7E;
        }
        .back > button > a {
            text-decoration: none;
            color: #393E46;
            font-size: 16px;
            font-weight: 500;
        }
        .content {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        table, th, td {
            border: 1px groove #D3E4DB;
        }
        .content-table {
            max-width: 700px;
            
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
        <h2>Kết quả tìm kiếm</h2>
        <div class="back">
            <button><a href="./lab2_9.php">Trở về trang tìm kiếm</a></button>
        </div>
        <div class="content">
            
            
    <?php
        if (isset($_REQUEST['submit_search'])) {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);

            if (empty($search)) {
                echo '<h3>Chưa nhập từ khóa tìm kiếm</h3>';
            } else {
                require('../../db_helper/DB_driver.php');
                $DB = new DB_driver();
                $rowPerPage = 2;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;

                $offset = ($page - 1) * $rowPerPage;
                $query = "SELECT Ma_sua, Hinh, Ten_sua, Ten_hang_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich
                FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua WHERE Ten_sua LIKE '%$search%'";
                $result = $DB->get_list($query);
                $numRow = count($result);

                $query= "SELECT Ma_sua, Hinh, Ten_sua, Ten_hang_sua, Trong_luong, Don_gia, TP_Dinh_Duong, Loi_ich
                FROM sua inner join hang_sua on sua.Ma_hang_sua = hang_sua.Ma_hang_sua WHERE Ten_sua LIKE '%$search%' 
                LIMIT $offset, $rowPerPage";
                $result = $DB->get_list($query);
                // var_dump($result);
                $maxPage = ceil($numRow / $rowPerPage);

                if ($numRow > 0 && $search != '') {
                    echo '
                    <table class="content-table">
                        <thead>
                            <tr>
                                <th colspan="2">Có '.$numRow.' sản phẩm được tìm thấy với từ khóa '.$search.'</th>
                            </tr>
                        </thead>
                    ';

                    foreach ($result as $value) {
                        echo'
                        <tbody>
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
                } else
                    echo '<h3>Không tìm thấy kết quả</h3>';
            }
        }
    ?>
                </tbody>
            </table>
        </div>
        <div class="pagination">
            <?php
                if (isset($search) && $search != '' && $numRow > 0) {
                    $firstPage = 1;
                    $prePage = $page - 1;
                    echo "<a href=".$_SERVER ['PHP_SELF']."?search=".$search."&submit_search=&page=".$firstPage.">&laquo;</a>"; 
                    if($prePage === 0)
                        $prePage = $maxPage;
                    echo "<a href=".$_SERVER ['PHP_SELF']."?search=".$search."&submit_search=&page=".$prePage.">&lsaquo;</a>";

                    for($i = 1; $i <= $maxPage; $i++ ){
                        $class  = ( $page == $i ) ? "active" : "";
                        echo "<a href=".$_SERVER ['PHP_SELF']."?search=".$search."&submit_search=&page=".$i." class=".$class."> ".$i." </a>";
                    }
                    
                    $nextPage = $page + 1;
                    if($nextPage == $maxPage+1)
                        $nextPage = 1;
                    echo "<a href=".$_SERVER ['PHP_SELF']."?search=".$search."&submit_search=&page=".$nextPage.">&rsaquo; </a>"; 
                    $lastPage = $maxPage;
                    echo "<a href=".$_SERVER ['PHP_SELF']."?search=".$search."&submit_search=&page=".$lastPage.">&raquo;</a>";
                }          
            ?>
        </div>
    </div>
</body>
</html>