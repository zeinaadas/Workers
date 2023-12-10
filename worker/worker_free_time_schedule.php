<?php
include_once 'files/header.php';
?>


<div class="title">اوقات الفراغ التي يمكن ان يعمل بها</div>


<?php


if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete') {
    $gidDel = intval($_GET['id']);
    if ($gidDel) {
        $del = mysqli_query($connect, "DELETE FROM `worker_free_time_schedule` WHERE 1 AND id='$gidDel'");
        
    }
}



if (isset($_POST['action']['edit_row'])) 
{


	  $daily_cost = $_POST['daily_cost'];
	  $career_place_id = $_POST['career_place_id'];
	  $career_type_id = $_POST['career_type_id'];

	  $from_date = $_POST['from_date'];
	  $to_date = $_POST['to_date'];
	  $act = $_POST['act'];
	  $gide = $_POST['worker_free_time_schedule_id'];
	  

    $update = mysqli_query($connect, "UPDATE worker_free_time_schedule SET 

      daily_cost='$daily_cost',
      career_place_id='$career_place_id',
      career_type_id='$career_type_id',

      from_date='$from_date',
      to_date='$to_date',
      act='$act'
	  WHERE 1 AND id='$gide' ");


}




if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
    $gidEdit = intval($_GET['id']);
    if ($gidEdit) {
        $sql = mysqli_query($connect, "SELECT * FROM worker_free_time_schedule WHERE id='$gidEdit'");
        $rowEdit = mysqli_fetch_array($sql);
        


		    $daily_cost = $rowEdit['daily_cost'];
		    $career_place_id = $rowEdit['career_place_id'];
		    $career_type_id = $rowEdit['career_type_id'];

		    $from_date = $rowEdit['from_date'];
		    $to_date = $rowEdit['to_date'];
		    $act = $rowEdit['act'];
		    
		    

        ?>
        <form method="post" enctype="multipart/form-data">
            <table dir="rtl" width="50%" class="tablein">
                
                


		        <tr>
		            <td>مكان العمل</td>
		            <td>
		                <select name="career_place_id" required="required">
		                    <option value="">الرجاء إختيار المكان</option>
		                    <?php
		                    $query1 = mysqli_query($connect, "SELECT `id`, `career_place_name` FROM `career_place` WHERE 1 ORDER BY `id` DESC");
		                    while ($row1 = mysqli_fetch_array($query1)) {
		                    	$selected='';
		                    	if($row1['id']==$career_place_id){
		                    		$selected='selected';
		                    	}
		                        ?>
		                        <option value="<?php echo $row1['id'] ?>"     <?php echo $selected ?>><?php echo $row1['career_place_name'] ?></option>
		                    <?php }
		                    ?>
		                </select>
		            </td>
		        </tr>
		      
		        
		        <tr>
		            <td>المهنة</td>
		            <td>
		                <select name="career_type_id" required="required">
		                    <option value="">الرجاء إختيار المكان</option>
		                    <?php
		                    $query1 = mysqli_query($connect, "SELECT `id`, `career_type_name` FROM `career_type` WHERE 1 ORDER BY `id` DESC");
		                    while ($row1 = mysqli_fetch_array($query1)) {
		                    	$selected='';
		                    	if($row1['id']==$career_type_id){
		                    		$selected='selected';
		                    	}
		                        ?>
		                        <option value="<?php echo $row1['id'] ?>"     <?php echo $selected ?>><?php echo $row1['career_type_name'] ?></option>
		                    <?php }
		                    ?>
		                </select>
		            </td>
		        </tr>
            
            
                <tr>

                </tr>


                <tr>
                    <td>الحالة</td>
                    <td>
                        <select name="act" required="required">
                            <?php
                            $act = $rowEdit['act'];
                            if ($act == 1) {
                                ?>
                                <option value="1">نشر</option>
                                <option value="2">عدم النشر</option>
                                <?php
                            } else {
                                ?>
                                <option value="2">عدم النشر</option>
                                <option value="1">نشر</option>
                            <?php }
                            ?>
                        </select>
                    </td>
                </tr>
                



		        <tr>
		            <td>من تاريخ</td>
		            <td><input type="date" name="from_date" value="<?php echo $from_date ?>" /></td>
		        </tr>
		        
		        <tr>
		            <td>حتى تاريخ</td>
		            <td><input type="date" name="to_date" value="<?php echo $to_date ?>"/></td>
		        </tr>
		        
		        
            
            
                
                <tr>
                    <td>تكلفة اليومية</td>
                    <td><input name="daily_cost" value="<?php echo $daily_cost ?>" /></td>
                </tr>





                <tr>
                    <td colspan="2">
                        <input type="submit" name="action[edit_row]" value="تعديل البيانات"/>
                        <input type="hidden" name="worker_free_time_schedule_id" value="<?php echo $rowEdit['id']; ?>"/>
                    </td>
                </tr>
            </table>
        </form>
        <?php
    }
    exit;
}



if (isset($_POST['action']['add_career'])) 
{







	$daily_cost = $_POST['daily_cost'];
	$career_place_id = $_POST['career_place_id'];
	$career_type_id = $_POST['career_type_id'];

	$from_date = $_POST['from_date'];
	$to_date = $_POST['to_date'];
	$act = $_POST['act'];
	
		



	 $insert_sql="INSERT INTO worker_free_time_schedule "
            . "(daily_cost,career_place_id,career_type_id,from_date,to_date,act,worker_id	) "
            . "VALUES "
            . "('$daily_cost','$career_place_id','$career_type_id','$from_date','$to_date', '$act','".$_SESSION['sessionidworker']."')";

	//echo $insert_sql;

    $insert = mysqli_query($connect, $insert_sql);
            

}
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'add_career') {
    ?>
    <form method="post" enctype="multipart/form-data">
        <table dir="rtl" width="50%" class="tablein">
            
            



            <tr>
                <td>مكان الوظيفة</td>
                <td>
                    <select name="career_place_id" required="required">
                        <option value="">الرجاء إختيار المكان</option>
                        <?php
                        $query1 = mysqli_query($connect, "SELECT `id`, `career_place_name` FROM `career_place` WHERE 1 ORDER BY `id` DESC");
                        while ($row1 = mysqli_fetch_array($query1)) {
                            ?>
                            <option value="<?php echo $row1['id'] ?>"><?php echo $row1['career_place_name'] ?></option>
                        <?php }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
            
            
            
            
            
             <tr>
                <td>مجال الوظيفة</td>
                <td>
                    <select name="career_type_id" required="required">
                        <option value="">الرجاء إختيار المجال</option>
                        <?php
                        $query1 = mysqli_query($connect, "SELECT `id`, `career_type_name` FROM `career_type` WHERE 1 ORDER BY `id` DESC");
                        while ($row1 = mysqli_fetch_array($query1)) {
                            ?>
                            <option value="<?php echo $row1['id'] ?>"><?php echo $row1['career_type_name'] ?></option>
                        <?php }
                        ?>
                    </select>
                </td>
            </tr>
            
            
            
            <tr>



            </tr>

            <tr>
                <td>الحالة</td>
                <td>
                    <select name="act" required="required">
                        <option value="">الرجاء الإختيار</option>
                        <option value="1" selected>نشر</option>
                        <option value="2">عدم النشر</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td>من تاريخ</td>
                <td><input type="date" name="from_date" required/></td>
            </tr>
            
            <tr>
                <td>حتى تاريخ</td>
                <td><input type="date" name="to_date" required/></td>
            </tr>
 
            <tr>
                <td>تكلفة اليومية</td>
                <td><input name="daily_cost" value="" required/></td>
            </tr>
            
           
           
           
            
            <tr>
                <td colspan="2"><input type="submit" name="action[add_career]" value="اضافة الوظيفة"/></td>
            </tr>

     

            
        </table>
    </form>
    <?php
    exit;
}
?>
<center><div class="add"><a href="?action=add_career">اضافة أوقات فراغ</a></div></center>
<table class="table" width="98%">
    <tr class="firstTR">
        <th width="3%"></th>


        <th >تكلفة اليومية</th>
        
        
        <th>المكان</th>
 
        <th>المجال</th>
        
        <th>من تاريخ</th>
        <th>الى تاريخ</th>
        
        <th>الحالة</th>
        <th width="5%">تعديل</th>
        <th width="5%">حذف</th>
 
    </tr>
    <?php
    
    
	$rows_per_page=20;
    
    
    $worker_id=$_SESSION['sessionidworker'];
    $where_worker_id=" AND worker_free_time_schedule.worker_id='$worker_id' ";
    
    
    $sql="SELECT 
    worker_free_time_schedule.id as worker_free_time_schedule_id,
    worker_free_time_schedule.*,
    career_type.*,
    career_place.* 
    FROM 
    worker_free_time_schedule 
    LEFT JOIN career_type ON worker_free_time_schedule.career_type_id=career_type.id  
    LEFT JOIN career_place ON worker_free_time_schedule.career_place_id=career_place.id 
    WHERE 1 
    $where_worker_id ORDER BY worker_free_time_schedule.id, worker_free_time_schedule.career_place_id, worker_free_time_schedule.career_type_id DESC";
 
     //echo $sql;
      
     if (isset($_GET['page_number'])) {
        $currentPage = $_GET['page_number'];
    } else {
        $currentPage = 1;
    }

    $prevPage = $currentPage - 1;
    $nextPage = $currentPage + 1;
    $perPage = $rows_per_page;
    $start = ($currentPage - 1) * $perPage;

    $totalRows = mysqli_num_rows(mysqli_query($connect, $sql));
    if ($totalRows > 0) {
        $lastPage = ceil($totalRows / $perPage);

        if ((@$_GET['page']) > $lastPage) {
            die("<div id='error'>لقد طلبت صفحة خاطئة</div>");
        }
       
########################################

	$sql = $sql." LIMIT $start,$perPage";##
  
  
      
         
    $query = mysqli_query($connect, $sql);
    
    $row_number=0;
    while ($row = mysqli_fetch_array($query)) 
    {
        $id = $row['worker_free_time_schedule_id'];
        $row_number=$row_number+1;
        $act = $row['act'];
        
        if ($act == 1) {
            $acti = "<span style='color:green'>تم النشر</span>";
        } else {
            $acti = "<span style='color:red'>لم ينشر</span>";
        }


		    $daily_cost = $row['daily_cost'];
		    $career_place_name = $row['career_place_name'];
		    $career_type_name = $row['career_type_name'];

		    $from_date = $row['from_date'];
		    $to_date = $row['to_date'];


        ?>
        <tr>
            <td><?php echo $row_number; ?></td>


            <td><span style="color:red"><?php echo $daily_cost; ?></span></td>
 


            <td><?php echo $career_place_name; ?></td>
            <td><?php echo $career_type_name; ?></td>

            <td><?php echo $from_date; ?></td>
            <td><?php echo $to_date; ?></td>
            
            
            <td><?php echo $acti; ?></td>
            
            <td><a href="?action=edit&id=<?php echo $id; ?>"><img width=25 src="resources/icons/update.png" title="تعديل معلومات الوظيفة"/></a></td>
            <td><a href="?action=delete&id=<?php echo $id; ?>"><img width=25 src="resources/icons/delete.png" title="حذف الوظيفة" onclick="return confirm('هل تريد بالتأكيد حذف السجل ')"/></a></td>

        </tr>
    <?php }} ?>
</table>








<?php

echo '<div class="clear"></div><br/><center><div id="pagination">';
echo "<a class='pagers'>" . $currentPage . "|" . $lastPage . "</a>";


if ($currentPage == 1) {
    echo'';
} else {


}

for ($i = $currentPage - 3; $i <= $currentPage + 5; $i++) {
    if ($i > 0 && $i <= $lastPage) {
        if ($currentPage != $i) {
            echo"<a class='pager pagin' href='$url_page_go_href?page_number=" . $i . "'>" . $i . "</a>";
        } else {
            echo"<a class='pagers'>" . $i . "</a>";
        }
    }
}

if ($currentPage == $lastPage) {
    echo'';
} else {


}
echo"</div></center>";
?>







