<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 9 - Index page</title>
    <style>
        nav {
            margin: 27px auto 0;

            position: relative;
            width: 590px;
            height: 50px;
            background-color: #34495e;
            border-radius: 8px;
            font-size: 0;
        }
        nav a {
            line-height: 50px;
            height: 100%;
            font-size: 15px;
            display: inline-block;
            position: relative;
            z-index: 1;
            text-decoration: none;
            text-transform: uppercase;
            text-align: center;
            color: white;
            cursor: pointer;
        }
        nav .animation {
            position: absolute;
            height: 100%;
            top: 0;
            z-index: 0;
            transition: all .5s ease 0s;
            border-radius: 8px;
        }
        a:nth-child(1) {
            width: 100px;
        }
        a:nth-child(2) {
            width: 110px;
        }
        a:nth-child(3) {
            width: 100px;
        }
        a:nth-child(4) {
            width: 160px;
        }
        a:nth-child(5) {
            width: 120px;
        }
        nav .start-home, a:nth-child(1):hover~.animation {
            width: 100px;
            left: 0;
            background-color: #1abc9c;
        }
        nav .start-about, a:nth-child(2):hover~.animation {
            width: 110px;
            left: 100px;
            background-color: #e74c3c;
        }
        nav .start-blog, a:nth-child(3):hover~.animation {
            width: 100px;
            left: 210px;
            background-color: #3498db;
        }
        nav .start-contact, a:nth-child(4):hover~.animation {
            width: 160px;
            left: 310px;
            background-color: #9b59b6;
        }
        nav .start-forum, a:nth-child(5):hover~.animation {
            width: 120px;
            left: 470px;
            background-color: #e67e22;
        }

        body {
            font-size: 12px;
            font-family: sans-serif;
            background: #2c3e50;
        }
        h1 {
            text-align: center;
            margin: 40px 0 40px;
            text-align: center;
            font-size: 20px;
            color: #D6E4E5;
            text-shadow: 2px 2px 4px #000000;
            font-family: 'Cherry Swash', cursive;
        }

    </style>
</head>
<body>
    <nav>
        <a href="?page=trangchu">Trang chủ</a>
        <a href="?page=gioithieu">Giới thiệu</a>
        <a href="?page=tintuc">Tin tức</a>
        <a href="?page=lienhe">Liên hệ</a>
        <a href="?page=diendan">Diễn đàn</a>
        <div class="animation start-home"></div>
    </nav>
 <?php 

	if(isset($_GET['page']))
	{
		$page = $_GET['page'];
		switch ($page) 
		{    
			case 'trangchu':
				include './trangchu.php';
				break;
            case 'gioithieu':
                include './gioithieu.php';
                break;	
			case 'tintuc':
				include './tintuc.php';
				break;
            case 'lienhe':
                include './lienhe.php';
                break;	
            case 'diendan':
                include './diendan.php';
                break;                   			
			default:
				break;
		}
	}
 ?>
</body>

</html>