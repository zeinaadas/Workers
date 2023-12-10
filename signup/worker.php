<?php
include_once 'files/header.php';
include "../upload-function/file_upload.php";
?>

<div align="middle" style="width:100%">
<?php


if (isset($_POST['addworker']) && $_POST['addworker'] == 'انشاء حساب') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $act = 2;
    $city = $_POST['city'];
    
    
    $loginname = $_POST['loginname'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    $pass = $_POST['password'];
    $password = MD5(sha1($_POST['password']));
    $password2 = MD5(sha1($_POST['password2']));
    $infoUpdated = 1;
    //echo 1;
    
    
    #---------------------------------------------------------------------------
    if (!empty($_FILES["confirm_worker_file"]['name'])) 
    {
      $datafile=array();
      $datafile['element_name']="confirm_worker_file";
      $datafile['upload_folder_location']="../confirm-worker-files/";
      $file_name_dst=file_upload($datafile);
    }
    #---------------------------------------------------------------------------
    
    //echo 2;



    $sql = mysqli_query($connect, "SELECT loginname FROM worker WHERE loginname='$loginname'");
    $num = mysqli_num_rows($sql);

    $sel2 = mysqli_query($connect, "SELECT email FROM worker WHERE email='$email' and email!=NULL");
    $num2 = mysqli_num_rows($sel2);

    if ($password !== $password2) {
        echo '<div class="error">الرجاء كتابة كلمة مرور متطابقة</div>';
    } elseif ($num > 0) {
        echo '<div class="error">الرجاء اختيار اسم دخوول أخر</div>';
    } elseif ($num2 > 0) {
        echo '<div class="error">البريد الإلكتروني موجود مسبقا</div>';
    } else {
    
        $sql="INSERT INTO worker 
                (fname,lname,loginname, password, email,tel,act,city, address, confirm_worker_file) 
                VALUES('$fname','$lname', '$loginname','$password','$email','$tel', '$act','$city', '$address', '$file_name_dst')";
        //echo $sql;        
        $insert = mysqli_query($connect, $sql);
        $lid = mysqli_insert_id($connect);

		
		}



    if ($insert) {
        ?>

        <meta http-equiv="refresh" content="0;url=worker.php?finish=1"/>
        <?php
        exit;
    }
    
}
if (1) {
    ?>
    
        <br></br>
    <form method="post" enctype="multipart/form-data">
        <table dir="rtl" width="400px" class="tablein">
            <tr class="tr_title">
              <td colspan="2" style="padding-bottom:5px;">انشاء حساب عامل (مهني)</td>
            </tr>
            <tr>
              <td colspan=2><hr></td>
            </tr>
            <tr>
                <td>الإسم الأول<br><input type="text" name="fname" required="required"/></td>
                <td>الإسم الأخير<br><input type="text" name="lname" /></td>
            </tr>
            <tr>
                <td>المدينة<br><input type="text" name="city" /></td>
                <td>العنوان<br><input type="text" name="address" /></td>
            </tr>
            <tr>

			    <td>رقم الهاتف<br><input type="text" name="tel"  /></td>

                <td>البريد الإلكتروني<br><input type="email" name="email" /></td>

            </tr>
            <tr>
              <td colspan=2><hr></td>
            </tr>
            <tr>
                <td>اسم الدخول<br><input type="text" name="loginname" required="required"/></td>
                <td>اثبات عمل<br><input type="file" name="confirm_worker_file" required="required"/></td>
            </tr>
            <tr>
                <td>كلمة المرور<br><input type="password" name="password" required="required"/></td>
            </tr>
            <tr>
                <td>اعاده كلمة المرور<br><input type="password" name="password2" required="required"/></td>
            </tr>

            
            <tr>
                <td colspan="4" align="middle"><input type="submit" name="addworker" value="انشاء حساب"/></td>
            </tr>
        </table>
    </form>
    <?php
}


if (isset($_GET['finish']) && $_GET['finish'] == 1) {

?>

<div style="color:green;">تم انهاء التسجيل ... انتظر عدة دقائق ليتم تفعيل الحساب والتاكد من بياناتك</div>


<?php

}

?>

<?php
include_once 'files/footer.php';
?>
