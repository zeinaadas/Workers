<?php
include_once 'files/header.php';
?>
<div style="text-align:center;width:100%;font-weight:bold;font-size:1.1em;text-shadow:1px 1px 3px #555;">البيانات الشخصية للمشغل</div>






<?php

$sql = mysqli_query($connect, "SELECT * FROM clients WHERE id='".$_GET['client_id']."'");

$rowEdit = mysqli_fetch_array($sql);


		
?>

<br>
<form method="post" enctype="multipart/form-data">
    <table dir="rtl" width="70%" class="tablein" style="padding:11px;min-height:520px;">
        
        <tr>
            <td>الإسم الأول<br><input value="<?php echo $rowEdit['fname'] ?>" type="text" name="fname" required="required"/></td>
            <td>الإسم الأخير<br><input value="<?php echo $rowEdit['lname'] ?>" type="text" name="lname" required="required"/></td>
        </tr>
        <tr>
            <td>المدينة<br><input type="text" value="<?php echo $rowEdit['city'] ?>" name="city" required="required"/></td>
            <td>العنوان<br><input type="text" value="<?php echo $rowEdit['address'] ?>" name="address" required="required"/></td>
        </tr>
        <tr>

            <td>رقم الهاتف<br><input type="text" value="<?php echo $rowEdit['tel'] ?>" name="tel"/></td>

            <td>البريد الإلكتروني<br><input type="email" name="email" value="<?php echo $rowEdit['email'] ?>" required="required"/></td>
            
        </tr>


      
    </table>
</form>

