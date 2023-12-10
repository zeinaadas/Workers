<div class="main-content content-side" style="width:100%;">






  <div class="b1">
    <div class="b1--title" style="font-size:1.2em;color:red;">
    تنويه
    </div>
    
    <div class="b1--content">
      <div class="featured-posts">
        <div class="featured-post" style="min-height:200px;">
          <a  title="" class="featured-logos--item" style="margin-left:3%;color:#aa2222;">
          <span><?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='note';"))['value']; ?></span>

          </a>
        </div>
    </div>
  </div>
  
  
  
  
</div>
