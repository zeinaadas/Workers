<?php
include_once 'files/header.php';
?>


<div class="title">متابعة طلبات التشغيل الواردة</div>


<?php


if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'approve') 
{



	$order_id = $_GET['id'];


	
		
	 $insert_sql="UPDATE `orders` SET is_approved= not is_approved WHERE 1 AND orders.id=$order_id";

	//echo $insert_sql;

    $update = mysqli_query($connect, $insert_sql);
            

  
    
}



?>



<table class="table" width="98%">
    <tr class="firstTR">
        <th width="3%"></th>
        <th>المهنة</th>
        <th>المكان</th>
        
        
        <th>التاريخ</th>
        
        <th>اسم المشغل</th>
         
        <th width="20%">موافقة</th>
        <th width="20%">التقييم</th>

 
    </tr>
    <?php
    
	$max_rows_in_page=50; 
    
	$where_career_type="";
	$where_career_place="";

	if(isset($_POST['career_type_id'])&&$_POST['career_type_id']!='*') $where_career_type=" AND worker_free_time_schedule.career_type_id=".$_POST['career_type_id'];
	if(isset($_POST['career_place_id'])&&$_POST['career_place_id']!='*') $where_career_place=" AND worker_free_time_schedule.career_place_id=".$_POST['career_place_id'];



    
	$sql="SELECT 
	        orders.id as order_id,
	        concat(clients.fname,' ',clients.lname) as clients_name,
	        career_type.career_type_name,
	        orders.*,
	        worker_free_time_schedule.*,
	        orders.work_date,
	        orders.assessment,
	        orders.is_approved,
          career_place.*, 
	        clients.id as client_id,
	        clients.* 
	        FROM orders 
	        LEFT JOIN clients ON orders.clients_id=clients.id 
	        LEFT JOIN worker_free_time_schedule ON orders.worker_free_time_schedule_id=worker_free_time_schedule.id 
	        LEFT JOIN career_type ON career_type.id=worker_free_time_schedule.career_type_id
	        LEFT JOIN career_place ON worker_free_time_schedule.career_place_id=career_place.id 
	        WHERE 1  
	        AND worker_free_time_schedule.worker_id=".$_SESSION['sessionidworker']."
	        AND worker_free_time_schedule.to_date>CURDATE() ORDER BY orders.id DESC ";
    
    
    //echo $sql;
    
     if (isset($_GET['page_number'])) {
        $currentPage = $_GET['page_number'];
    } else {
        $currentPage = 1;
    }

    $prevPage = $currentPage - 1;
    $nextPage = $currentPage + 1;
    $perPage = $max_rows_in_page;
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
        $id = $row['order_id'];
        $row_number=$row_number+1;


        $career_place_name = $row['career_place_name'];
        
		    $career_name = $row['career_name'];
		    $career_type_name = $row['career_type_name'];
		    
		    $work_date = $row['work_date'];
		    
		    $assessment = $row['assessment'];

        $clients_name = $row['clients_name'];
        $client_id = $row['client_id'];


        ?>
        <tr>
            <td><?php echo $row_number; ?></td>

            <td><span style="color:blue"><?php echo $career_type_name; ?></span></td>
            <td><span style="color:blue"><?php echo $career_place_name; ?></span></td>
            
            <td><?php echo $work_date; ?></td>
            
            <td><a href="clients.php?client_id=<?php echo $client_id; ?>" ><?php echo $clients_name; ?></a></td>


             <td>
 
            
           		<a href="?action=approve&id=<?php echo $id; ?>"><img height=66 src="resources/icons/response_<?php echo $row['is_approved'];?>.png" title=""/></a>

           
              </td>
              
               <td  style="opacity:0.3;"><img width=25 src="resources/icons/assessment_<?php echo $assessment;?>.png" title=""/></td>
               

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






