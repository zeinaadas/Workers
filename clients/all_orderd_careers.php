<?php
include_once 'files/header.php';
?>


<div class="title">جميع الطلبات المرسلة للعمال او المهنيين</div>


<?php


if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'assessment') 
{



	$order_id = $_GET['order_id'];


	
		
	 $sql="UPDATE `orders` SET assessment= not assessment WHERE 1 AND orders.id=$order_id";

	//echo $insert_sql;

    $update = mysqli_query($connect, $sql);
            

  
    
}



?>


<form method="post">
    <table class="barTab" style="font-weight: bold">


            <tr>


                <td>
                    <select name="career_place_id" class="stander_select_list" style="z-index:10;width:350px;border-radius:4px;" onchange="this.form.submit()">
                        <option value="*">مكان العمل</option>
                        <?php
                        $query1 = mysqli_query($connect, "SELECT `id`, `career_place_name` FROM `career_place` ORDER BY `id` DESC");
                        while ($row1 = mysqli_fetch_array($query1)) {
                            ?>
                            <option value="<?php echo $row1['id'] ?>" <?php if($row1['id']==$_POST['career_place_id'])echo "selected";?>><?php echo $row1['career_type_name'] ?><?php echo $row1['career_place_name'] ?></option>
                        <?php }
                        ?>
                    </select>
                </td>

            
 
 
                <td>
                    <select name="career_type_id" class="stander_select_list" style="z-index:10;width:350px;border-radius:4px;" onchange="this.form.submit()">
                        <option value="*">التخصص</option>
                        <?php
                        $query1 = mysqli_query($connect, "SELECT `id`, `career_type_name` FROM `career_type`  ORDER BY `id` DESC");
                        while ($row1 = mysqli_fetch_array($query1)) {
                            ?>
                            <option value="<?php echo $row1['id'] ?>" <?php if($row1['id']==$_POST['career_type_id'])echo "selected";?>><?php echo $row1['career_type_name'] ?></option>
                        <?php }
                        ?>
                    </select>
                </td>
                
               
                
                
            </tr>
            
</table>

</form>

<table class="table" width="98%">
    <tr class="firstTR">
        <th width="3%"></th>


        
        <th>العامل / المهني</th>
         
         
        <th>تكلفة اليومية</th>
        
        
        <th>المكان</th>
 
        <th>المجال</th>

        
        <th> تاريخ العمل</th>
        <th> الموافقة</th>
        <th> التقييم</th>
        

        
       
    </tr>
    <?php
    
	$rows_per_page=20; 
    
	$where_career_type="";
	$where_career_place="";

	if(isset($_POST['career_type_id'])&&$_POST['career_type_id']!='*') $where_career_type=" AND worker_free_time_schedule.career_type_id=".$_POST['career_type_id'];
	if(isset($_POST['career_place_id'])&&$_POST['career_place_id']!='*') $where_career_place=" AND worker_free_time_schedule.career_place_id=".$_POST['career_place_id'];



    
    $sql="SELECT 
      worker_free_time_schedule.id as worker_free_time_schedule_id,
      concat(worker.fname ,' ',worker.lname) as worker_name,
      worker.id as worker_id,
      worker_free_time_schedule.*,
      career_type.*,
      career_place.* 
      FROM 
      worker_free_time_schedule 
      LEFT JOIN career_type ON worker_free_time_schedule.career_type_id=career_type.id 
      LEFT JOIN career_place ON worker_free_time_schedule.career_place_id=career_place.id 
      LEFT JOIN worker ON worker_free_time_schedule.worker_id=worker.id 
      WHERE 1 
      $where_career_type 
      $where_career_place 
      AND worker_free_time_schedule.act =1 
      ORDER BY worker_free_time_schedule.id, worker_free_time_schedule.career_place_id, worker_free_time_schedule.career_type_id DESC ";
    
    
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
       

	$sql = $sql." LIMIT $start,$perPage";##
  
  
    
    $query = mysqli_query($connect, $sql);
    
    $row_number=0;
    while ($row = mysqli_fetch_array($query)) 
    {
    
        $id = $row['worker_free_time_schedule_id'];
        $row_number=$row_number+1;
			
		#-------------------------------------


		$clients_id = $_SESSION['sessionidclients'];
	
		$is_apply_sql="SELECT *  FROM `orders` WHERE 1 AND clients_id=$clients_id AND worker_free_time_schedule_id=$id";
		//echo $is_apply_sql;
		$q_order=mysqli_query($connect, $is_apply_sql);
		
		$is_apply = mysqli_num_rows($q_order);
		//echo $is_apply;
		if ($is_apply > 0) 
		{
		  $r_order=mysqli_fetch_array($q_order);
	    $work_date = $r_order['work_date'];
	    $order_id = intval($r_order['id']);
	    $is_approved = intval($r_order['is_approved']);
	    $assessment = intval($r_order['assessment']);
		#-------------------------------------            

		        
		

		    $act = $row['act'];
		    
		    if ($act == 1) {
		        $acti = "<span style='color:green'>فعال</span>";
		    } else {
		        $acti = "<span style='color:red'>غير فعال</span>";
		    }


			  $worker_name = $row['worker_name'];
			  $daily_cost = $row['daily_cost'];
			  $career_place_name = $row['career_place_name'];
			  $career_type_name = $row['career_type_name'];



		
		    $worker_id = $row['worker_id'];

		    ?>
		    <tr>
		        <td><?php echo $row_number; ?></td>


		        
            <td><a href="worker.php?worker_id=<?php echo $worker_id; ?>" ><?php echo $worker_name; ?></a></td>
		        
		        
		        <td><span style="color:red"><?php echo $daily_cost; ?></span></td>
	 


		        <td><?php echo $career_place_name; ?></td>
		        <td><?php echo $career_type_name; ?></td>


		        <td><?php echo $work_date; ?></td>
		        <td style="opacity:0.3;"><img height=66 src="resources/icons/response_<?php echo $is_approved;?>.png" title=""/></td>
		        
            <td><a href="?action=assessment&order_id=<?php echo $order_id; ?>"><img width=25 src="resources/icons/assessment_<?php echo $assessment;?>.png" title=""/></a></td>
           <?php
       		}
       		else{
       		

       		
       		}
           ?>
           
           



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















<?php
include_once 'files/footer.php';
?>
