<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 8 - Show information</title>
</head>
<body>
    <?php
        echo "Bạn đã nhập thành công, dưới đây là những thông tin bạn đã nhập: <br>";
        echo "Fullname: ", $_POST["fullname"];
        echo "<br>";
        echo "Address: ", $_POST["address"];
        echo "<br>";
        echo "Phone Number: ", $_POST["phone"];
        echo "<br>";
        echo "Gender: ", $_POST["gender"];
        echo "<br>";
        echo "Country: ", $_POST["country"];
        echo "<br>";
        echo "Study:";
        if(isset($_POST["Security"]))
        echo " ",$_POST["Security"];
        if(isset($_POST["CCNA"]))
        echo " ",$_POST["CCNA"];
        if(isset($_POST["ASP"]))
        echo " ",$_POST["ASP"];
        if(isset($_POST["PHP"]))
        echo " ",$_POST["PHP"];
        echo "<br>";
        echo "Note: ", $_POST["note"];
    ?>
</body>
</html>