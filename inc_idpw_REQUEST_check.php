<?php

if (empty($_REQUEST["cust_id"]) || empty($_REQUEST["cust_pw"])) {
    echo "<script>alert('아이디와 비밀번호를 확인하시오!');
        history.back(-1);
    </script>";
    exit();
}
?>