<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>로그인 인증 - 세션변수 설정</title>
</head>
<body>
    <?php
    include "../common/include/connect_login_db_check.php";
    include "../common/include/inc_idpw_REQUEST_check.php";

    $cust_id=$_POST["cust_id"];
    $cust_pw=$_POST["cust_pw"];
    
    $sql="SELECT * FROM customer WHERE (cust_id='$cust_id') and (cust_pw='cust_pw')";

    $result=mysqli_query($conn,$sql);
    $tuple=mysqli_fetch_array($result);

    if($cust_id === $tuple["cust_id"] && $cust_pw === $tuple["cust_pw"]){
        $_SESSION["ses_id"]=$tuple["cust_id"];
        $_SESSION["ses_name"]=$tuple["cust_name"];
    }else{
        echo "<script>alert('존재하지 않는 아이디와 비밀번호입니다!');
                history.back();
                </script>";
    }
    echo "<script>alert('홈 페이지 방문을 환영합니다!');
            location.href='./index.php';
            </script>";
    ?>
</body>
</html>