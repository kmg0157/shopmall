<tr>
    <th></span>아 이 디</th>
    <td><input type="text" name="cust_id" size="10" value="<?=$tuple['cust_id'];?>"readonly></td>
</tr>

<tr>
    <th>비밀번호</th>
    <td><input type="text" name="cust_pw" size="10" value="<?=$tuple['cust_pw'];?>"readonly></td>
</tr>

<tr>
    <th>이 &nbsp; 름 &nbsp;&nbsp;</th>
    <td><input type="text" name="cust_name" size="10" value="<?=$tuple['cust_name'];?>"readonly></td>
</tr>
<tr>
    <th>전화번호</th>
    <td><select name="tel_no_gubun" disabled>
        <?php
            $cust_tel_no[0]=explode("-",$tuple["cust_tel_no"],3);
            
            if($cust_tel_no[0]=="010"){
                echo '<option selected value="010">010</option>';
            }elseif($cust_tel_no[0]=="011"){
                echo '<option selected value="011">011</option>';
            }elseif($cust_tel_no[0]=="016"){
                echo '<option selected value="016">016</option>';
            }elseif($cust_tel_no[0]=="017"){
                echo '<option selected value="017">017</option>';
            }elseif($cust_tel_no[0]=="018"){
                echo '<option selected value="018">016</option>';
            }elseif($cust_tel_no[0]=="019"){
                echo '<option selected value="019">019</option>';
            }else{
                echo '<option selected value="">서비스구분</option>';
            }
        ?>
        </select>
        <input type="text" name="tel_no_guk" size="5" value="<?=$cust_tel_no[1];?>"readonly>-
        <input type="text" name="tel_no_seq" size="5" value="<?=$cust_tel_no[2];?>"readonly>
    </td>
</tr>

<tr>
    <th>주 &nbsp; 소 &nbsp;&nbsp;</th>
    <td><input type="text" name="cust_addr" size="50" value="<?=$tuple['cust_addr'];?>">readonly</td>
</tr>

<tr>
    <th>성 &nbsp; 별 &nbsp;&nbsp; </th>
    <td>
        <?php
            if($tuple["cust_gender"]=="M"){
                echo'<input type="radio" name="cust_gender" value="M" checked disabled>남자&nbsp;
                <input type="radio" name="cust_gender" value="F" disabled>여자</td>';
            }elseif($tuple["cust_gender"]=="F"){
                echo'<input type="radio" name="cust_gender" value="M" disabled>남자&nbsp;
                <input type="radio" name="cust_gender" value="F" checked disabled>여자</td>';
            }else{
                echo'<input type="radio" name="cust_gender" value="M" disabled>남자&nbsp;
                <input type="radio" name="cust_gender" value="F" disabled>여자</td>';
            }
        ?>
</tr>
<tr>
    <th>이 메 일</th>
    <td>
        <?php
            if(empty($tuple['cust_email'])){
                $cust_email[0]="";
                $cust_email[1]="";
            }else{
                $cust_email=explode("@",$tuple['cust_email'],2);
            }
        ?>
        <input type="text" name="cust_email_1" size="15" value="<?=$cust_email[0];?>"readonly>@
        <input type="text" name="cust_email_2" size="20" value="<?=$cust_email[1];?>"readonly>
    </td>
</tr>
<tr>
    <th><span style="color:red;">가 입 일</span></th>
    <td><input type="text" name="cust_join_date" size="10" value="<?=$tuple['cust_join_date'];?>"readonly></td>
</tr>