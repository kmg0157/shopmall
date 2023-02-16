<?php
    $cust_pw=trim($_POST["cust_pw"]);
    $cust_name=$_POST["cust_name"];

    $tel_no_gubun=$_POST["tel_no_gubun"];
    $tel_no_guk=$_POST["tel_no_guk"];
    $tel_no_seq=$_POST["tel_no_seq"];
    $cust_tel_no=$tel_no_gubun."-".$tel_no_guk."-".$tel_no_seq;

    $cust_addr=$_POST["cust_addr"];
    $cust_gender=$_POST["cust_gender"];

    $cust_email_1=$_POST["cust_email_1"];
    $cust_email_2=$_POST["cust_email_2"];

    if(empty($cust_email_1)&&empty($cust_email_2)){
        $cust_email="";
    }else{
        $cust_email=$cust_email_1."@".$cust_email_2;
    }
?>