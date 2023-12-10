<div class="b3--content">
<div class="b2">
<div class="list-4">
<div class="list-3--head">
<div class="list-3--cell-title">الوسيلة</div>
<div class="m-hide">البيانات</div>
</div>
<div class="list-3--body">

        <a class="list-3--title list-3--row"  title="هاتف ارضي">
        <div class="list-3--cell-1 list-3--cell-title-2">
        هاتف ارضي </div>
        <div class="list-3--cell-1"><span class="tooltip tooltipstered"><?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='phone';"))['value']; ?></span>
        </div>
        </a>

        <a class="list-3--title list-3--row"  title="موبايل">
        <div class="list-3--cell-1 list-3--cell-title-2">
        موبايل </div>
        <div class="list-3--cell-1"><span class="tooltip tooltipstered"><?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='mobile';"))['value']; ?></span>
        </div>
        </a>

        <a class="list-3--title list-3--row"  title="بريد الكتروني">
        <div class="list-3--cell-1 list-3--cell-title-2">
       بريد الكتروني </div>
        <div class="list-3--cell-1"><span class="tooltip tooltipstered"><?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='email';"))['value']; ?></span>
        </div>
        </a>

        <a class="list-3--title list-3--row" href="<?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='fb';"))['value']; ?>" title="فيسبوك">
        <div class="list-3--cell-1 list-3--cell-title-2">
        فيسبوك </div>
        <div class="list-3--cell-1"><span class="tooltip tooltipstered">تواصل من هنا</span>
        </div>
        </a>
        
</div>
</div>
</div>
</div>
