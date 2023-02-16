<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>홈 페이지(index.php)</title>
    <link rel="stylesheet" href="../common/CSS/home.css">
</head>
<body>
    <div id="out_box">

    <div id="header">
        <b>header</b>
    </div>

    <div id="body_left">
        <form name="login-form" method="POST" action="./login_ses_create.php">
            <table>
                <tr>
                    <th>아 이 디</th>
                <td><input type="text" name="cust_id" size="10" maxlength="10" required autofocus> </td>
                </tr>
                <tr>
                <th>비밀번호</th>
                <td><input type="password" name="cust_pw" size="11" maxlength="10" required></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                    <?php
                        if(empty($_SESSION)){
                            echo "<input type='submit' value='로그인'>
                                    <input type='button' value='회원가입'
                                    onClick=location.href='../DML/customer/customer_insert_form.php'></td>";
                        }else{
                            echo "<input type='submit' value='로그인' disabled>
                                    <input type='button' value='회원가입' disabled></td>";
                        }
                    ?>
                </tr>
            </table>

        </form>
    </div>

    <div id="body_middle">
        <ul id="menu_ul">
            <?php
                if(empty($_SESSION)){
                    ?>
                    <li><a href='../DML/customer/customer_insert_form.php' target='_parent'>회원가입</a></li>
                    <?php
                }else{
                    ?>
                    <li><a href='../DML/customer/customer_update_retrieval_db.php?cust_id=<?=$cust_id;?> 
                    &cust_pw=<?=$cust_pw;?>' target='_parent'>회원정보 갱신</a></li>
                    <?php
                }
                ?>
                <li><a href="../DML/order_sale/.php" target="_blank">상품검색</a></li>
                <li><a href="../DML/board_auto/.php" target="_blank">게시판</a></li>
                <li><a href="../DML/notice/.php" target="_blank">공지사항</a></li>
        </ul>
    </div>

    <div id="body_right">
        <?php
            if(empty($_SESSION)){
                echo "로그인 하십시요!";
            }else{
                echo "(".$_SESSION["ses_name"].")님 로그인 중...
                    <input type='button' value='로그아웃' onClick=location.href='./login_ses_destroy.php'>";
            }
            ?>
    </div>

    <div id="footer">
        <b>footer</b>
        <span style='color:green'>Copyright &copy since ~ </span>
    </div>
</body>
</html>