<?php
include_once 'files/header.php';
?>
<div class="title">بيانات تسجيل الدخول </div>
<?php



if (isset($_POST['editAdmin']) && $_POST['editAdmin'] == 'حفظ البيانات') {
    $p_name = $_POST['adminName'];
    $p_adminPass = MD5(sha1($_POST['adminPass']));

    $sql="UPDATE admin SET
			name_admin='" . $p_name . "',
			pass_admin='" . $p_adminPass . "'
			WHERE name_admin='" . $_SESSION['sessionname'] . "'
			";
		//echo $sql;	
    $updt = mysqli_query($connect, $sql);
			
}






$update = mysqli_query($connect, "SELECT * FROM admin WHERE name_admin='".$_SESSION['sessionname']."'");
$rowu = mysqli_fetch_array($update);

?>
<form method="post">
    <table width="40%" class="table">
        <tr class="firstTR"><td colspan="2">تعديل بيانات الدخول</td></tr>
        <tr>
            <td>اسم المستخدم</td>
            <td><input type="text" name="adminName" required="required" value="<?php echo $rowu['name_admin'] ?>"/></td>
        </tr>
        <tr>
            <td>الرقم السري</td>
            <td><input type="password" name="adminPass" required="required" autocomplete="off" /><br/><span style="color:orange;" >يجب كتابة كلمة المرور </span></td>
        </tr>
        
        <tr>
            <td colspan="2"> 
                <input type="submit" name="editAdmin" value="حفظ البيانات"/><br>
                <?php
                if($updt){
		              echo "تم حفظ التعديلات";
		            }
		            ?>
            </td>
        </tr>
    </table>
</form>







