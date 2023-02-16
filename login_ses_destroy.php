<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>로그아웃</title>
</head>
<body>
    <?php
        if(empty($_SESSION)){
            echo "<script>alert('등록된 세션 데이터가 없습니다!');
                    history.go(-1);
                    </script>";
            exit();
        }

        session_unset();
        session_destroy();

        echo "<script>alert('로그아웃 하셨습니다.');
                location.href='./index.php';
                </script>"
    ?>
</body>
</html>