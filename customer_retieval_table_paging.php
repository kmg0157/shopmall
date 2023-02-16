<!DOCTYPE html>
<html>
<head>
    <title>고객정보 테이블 검색(페이지 제어)</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../../common/CSS/table_100.css">
</head>
<?php
    define("LINE_PER_PAGE",2);
    $line_per_page=2;
    define("PAGE_PER_BLOCK",3);

    include "../../common/include/connect_login_db_check.php";
    $sql="SELECT * FROM customer ORDER BY cust_id ASC";
    $result=mysqli_query($conn,$sql);

    $nbr_of_row=mysqli_num_rows($result);
    $nbr_of_page=ceil($nbr_of_row/LINE_PER_PAGE);

    if(empty($_GET["pageno"])){
        $_GET["pageno"]=1;
    }elseif($nbr_of_page<$_GET["pageno"]){
        $_GET["pageno"]=$nbr_of_page;
    }
    $cur_page_no=$_GET["pageno"];
    $start_pointer=($cur_page_no -1)*LINE_PER_PAGE;

    $query="SELECT * FROM customer ORDER BY cust_join_date DESC LIMIT $start_pointer, $line_per_page";
    $result=mysqli_query($conn,$query) or die("고객테이블 검색 실패!!");
?>
<body>
<form name="customer_form_table">
        <table>
            <caption>고객정보 검색</caption>
            <caption style='text-align:right; font-size:15px'>현재 고객 수 
            <?=$nbr_of_row;?>명&nbsp;(전체<?=number_format($nbr_of_page); ?>쪽 중&nbsp;현재<?=$cur_page_no;?>쪽)</caption>
            <tr>
                <th>아이디</th>
                <th>비밀번호</th>
                <th>이름</th>
                <th>전화번호</th>
                <th>주소</th>
                <th>성별</th>
                <th>이메일</th>
                <th>가입일</th>
            </tr>
            
            <?php
                while($customer=mysqli_fetch_array($result)){
            ?>

                    <tr>
                        <td><?php echo $customer["cust_id"];?></td>
                        <td><?=$customer["cust_pw"];?></td>
                        <td><?=$customer["cust_name"];?></td>
                        <td><?=$customer["cust_tel_no"];?></td>
                        <td><?=$customer["cust_addr"];?></td>
                    <?php
                    if($customer["cust_gender"=="M"]){
                        $customer["gender"]="남자";
                    }else{
                        $customer["gender"]="여자";
                    }
                    ?>
                    <td><?=$customer["cust_gender"]."(".$customer['gender'].")";?></td>
                    <td><?=$customer["cust_email"];?></td>
                    <td><?=$customer["cust_join_date"];?></td>
                    </tr>
            <?php
                }
                $nbr_of_block=ceil($cur_page_no/PAGE_PER_BLOCK);
                $block_startpage_no=(($nbr_of_block -1)*PAGE_PER_BLOCK)+1;
                $block_endpage_no=($block_startpage_no+PAGE_PER_BLOCK)-1;

                echo"<tr>
                    <td  colspan='8' style='text-align:center;'>";
                
                if($nbr_of_block>1){
                    echo "&nbsp[<a href='./customer_retrieval_table_paging.php?pageno=1'>";
                    echo    "맨 처음</a>]&nbsp";
                    $previous_block_start_pageno=$block_startpage_no-PAGE_PER_BLOCK;
                    echo "&nbsp[<a href='./customer_retrieval_table_paging.php?pageno=";
                    echo    "$previous_block_start_pageno'>이전</a>]&nbap";
                }

                for($pgn=$block_startpage_no;$pgn<=$block_endpage_no;$pgn++){
                    if($pgn>$nbr_of_page){
                        break;
                    }
                    if($pgn==$cur_page_no){
                        echo "&nbsp".$pgn."&nbsp";
                    }else{
                        echo "&nbsp["."<a href='./customer_retrieval_table_paging.php?pageno=";
                        echo    "$pgn'>$pgn</a>"."]&nbsp";
                    }
                }

                if($block_endpage_no<$nbr_of_page){
                    $next_block_start_pageno=$block_endpage_no+1;
                    echo "&nbsp[<a href='./customer_retrieval_table_paging.php?pageno=";
                    echo    "$next_block_start_pageno'>다음</a>]&nbsp";
                    echo    "&nbsp[<a href='./customer_retrieval_table_paging.php?pageno=";
                    echo    "$nbr_of_page'>맨 끝</a>]&nbsp";
                }

                echo "
                    </td>
                    </tr>";
                echo "
                    </table>
                </form>
            </body>
        </html>";
        mysqli_free_result($result);
        mysqli_close($conn);
        ?>

        <input type="button" value=" 고객정보 관리" onClick="location.href='./customer_maintenance.php';">