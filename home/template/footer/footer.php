

<div class="footer-1">
        <div class="container">
        <div class="row">

                <div class="footer-grid">
                <div class="b5 ">
                <div class="b5--title" style="color:red;">
                هاتف  </div>
                <div class="b5--content">
                <div class="list-menu">
                <ul>
                
                
		            <li class=" ">
		            <a class="ji foot-dec"  title=""> <?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='phone';"))['value']; ?> </a>
		            </li>
  
                </ul>
                </div> </div>
                </div>
                </div>



                <div class="footer-grid">
                <div class="b5 employer--footer">
                <div class="b5--title" style="color:red;">
                 موبايل </div>
                <div class="b5--content">
                <div class="list-menu">
                <ul>
                
		            <li class=" ">
		            <a class="ji foot-dec"  title=""> <?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='mobile';"))['value']; ?>  </a>
		            </li>

                </ul>
                </div> </div>
                </div>
                </div>
                
                

                <div class="footer-grid">
                <div class="b5 employer--footer">
                <div class="b5--title" style="color:red;">
                بريد الكتروني </div>
                <div class="b5--content">
                <div class="list-menu">
                <ul>
                
		            <li class=" ">
		            <a class="ji foot-dec "  title=""> <?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='email';"))['value']; ?> </a>
		            </li>

                </ul>
                </div> </div>
                </div>
                </div>


                <div class="footer-grid">
                <div class="b5 employer--footer">
                <div class="b5--title" style="color:red;">
                موقعنا على فيسبوك </div>
                <div class="b5--content">
                <div class="list-menu">
                <ul>
                
		            <li class=" ">
		            <a class="ji foot-dec" href="<?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='fb';"))['value']; ?>" title="" > من هنا </a>
		            </li>

                </ul>
                </div> </div>
                </div>
                </div>






        </div>
        </div>
</div>







