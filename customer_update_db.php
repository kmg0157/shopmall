<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>회원정보 DB 갱신</title>
</head>
<body>
    <?php
        include "../../common/include/inc_idpw_POST_check.php";

        include "../../common/include/connect_login_db_check.php";

        $cust_id=$_POST["cust_id"];

        include "../../common/include/inc_data_assign_ins_upd.php";

        $query="UPDATE customer SET cust_pw='$cust_pw',cust_name='$cust_name',cust_tel_no='$cust_tle_no',cust_addr='$cust_addr',cust_gender='$cust_gender',cust_email='cust_email'
                WHERE (cust_id='cust_id')";

        $result=mysqli_query($conn,$query);

        if($result){
            printf("고객테이블의 %d개 튜플 갱신 성공!<Br>",mysqli_affected_rows($conn));
        }else{
            printf("고객테이블의 튜플 갱신 실패!<Br>%s",mysqli_error($conn));
        }

        mysqli_close($conn);

        echo "<script>alert('회원정보가 갱신되었습니다!');
                location.href='./customer_maintenance.php';
                <script>";
        ?>
</body>
</html>