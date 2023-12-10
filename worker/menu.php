<?php
include 'sessions.php';
?>
<html>
    <head>
        <title></title>
        <meta charset='utf-8'/>
        <link rel='stylesheet' type='text/css' href='resources/css/style.css'/>
        <script type='text/javascript' src='resources/js/jquery-1.9.1.min.js'></script>


    </head>
    <body class="sidebar" style="background-color:#F8F8FF;">


        <div style="color:#333;font-size:1.2em;text-align:center;text-shadow:1px 1px 3px #555;">
			  <?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='site_main_title';"))['value']; ?>
			  <br>
			  (حساب المهني)
				</div>     


        <div class='menu_block'>
            <div class="title top_right_menu"  >طلبات تشغيل واردة</div>
            <div class='content'>
                
                <a href='new_orderd_careers.php' target='home' style="font-size:1em;">طلبات جديده</a>


            </div>
        </div>
        
        
        <div class='menu_block'>
            <div class="title top_right_menu">جدولة الفراغات الموجودة</div>
            <div class='content cont'>

                <a href='worker_free_time_schedule.php' target='home' style="font-size:1em;">جدولة وقت الفراغ</a>

            </div>
        </div>
        
        
        <div class='menu_block'>
            <div class="title top_right_menu" >الاعدادات</div>
            <div class='content'>
                <a href='my_account.php' target='home' style="font-size:1em;">البيانات الشخصية</a>

                <a href='logout.php' target='_parent' style="font-size:1em;" onclick="return confirm('هل تريد تسجيل الخروج')" >
						تسجيل خروج

					      </a>   


            </div>
        </div>
        



    </body>
</html>
