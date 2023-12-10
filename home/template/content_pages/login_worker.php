


<div class="main-content content-side" style="width:100%;">






  <div class="b1">
    <div class="b1--title" style="font-size:1.2em;color:red;">
    الدخول الى حساب مهني
    </div>
    
    <div class="b1--content">
      <div class="featured-posts">
        <div class="featured-post" style="min-height:200px;">
         
    
    
<?php
        ob_start();
        session_start();

        date_default_timezone_set('Asia/Jerusalem');
        ?>


        <?php
        $username = addslashes(strip_tags(@$_POST['username']));
        $username = mysqli_real_escape_string($connect, $username);
        $userpass = MD5(sha1(@$_POST['password']));
        ?>


        <?php 

        $userpass = mysqli_real_escape_string($connect, $userpass);
        if ($username AND $userpass) {
            $finder = mysqli_query($connect, "SELECT loginname,password,id,fname,lname FROM worker WHERE loginname='" . $username . "' AND password='" . $userpass . "' AND worker.act=1") or die("mysql error");

            if (mysqli_num_rows($finder) != 0) {
                while ($row = mysqli_fetch_object($finder)) {
                    $uname = stripslashes($row->loginname);
                    $upass = $row->password;
                    $uid = $row->id;
                    $fname = $row->fname;
                    $lname = $row->lname;
                }
                if ($username == $uname AND $userpass == $upass) {
                    $_SESSION['sessionnameworker'] = $uname;
                    $_SESSION['sessionpassworker'] = $upass;
                    $_SESSION['sessionidworker'] = $uid;
                    $ip = getenv("REMOTE_ADDR");
                    $date = date('d-m-Y');
                    $time = date('H:i');
                    

                            

                    echo"<meta http-equiv='Refresh' content='0;url=../worker/index.php'/>";
                    
                } else {
                    echo"<div class='auto btn btn-danger center'><h2> Username OR Pass is not found</h2>";
                }
            } else {
                echo"<div class='auto btn btn-danger center'>Password is not correct</div>";
            }
        } else {
            echo"";
        }
        ob_end_flush();
        ?>

        <div class='login'  style="background-color:#aaa;width:333px;height:333px;border:1px solid #fff;float:center;margin:30px;padding:33px;border-radius:44px;">

            <form method='post' action='?page=login_worker'>

                <p >

                   
                    <label style="width:166px;display: block;float: right;color:white;" for="login">اسم المستخدم</label>
                     <input style="width:166px;" type="text" name="username" id="login" placeholder="اسم المستخدم" required="required">
                </p>

                <p >

                    
                    <label style="width:166px;display: block;float: right;color:white;" for="password">كلمة المرور</label>
                    <input  style="width:166px;" type="password" name="password" id="password" placeholder="كلمة المرور" required="required">
                </p>


                <p align="center">
                    <button type="submit" style="background-color: white; color: black; border: 2px solid #4CAF50; border-radius: 5px;height:32px;"  value='login'>تسجيل دخول</button>
                </p>

            </form>
        </div>


        

        </div>
    </div>
  </div>
  
  
  
  
</div>
