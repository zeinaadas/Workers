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
			  <?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='site_main_title';"))['value']; ?><br>
			   حساب الادارة
				</div>
        <div class='menu_block'>
            <div class="title top_right_menu" >حسابات المشتركين</div>
            <div class='content'>
                <a href='worker.php' target='home' style="font-size:1em;">المهنيين والعمال</a>

				<a href='clients.php' target='home' style="font-size:1em;">الزبائن (المشغلين)</a>


            </div>
        </div>
        
        <div class='menu_block'>
            <div class="title top_right_menu">ضبط الوظائف</div>
            <div class='content cont'>
            	 <a href='career_place.php' target='home' style="font-size:1em;">مناطق الوظائف</a>
                <a href='career_type.php' target='home' style="font-size:1em;">انواع الوظائف</a>


            </div>
        </div>
            
       <div class='menu_block'>
            <div class="title top_right_menu">الإعدادت</div>
            <div class='content cont'>

                <a href='admin_accounts.php' target='home' style="font-size:1em;">الادارة</a>
                <a href='logout.php' target='_parent' style="font-size:1em;" onclick="return confirm('هل تريد تسجيل الخروج')" >
						تسجيل خروج

					      </a>   

            </div>
        </div>
    </body>
</html>
