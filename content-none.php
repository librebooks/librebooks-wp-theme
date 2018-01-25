<div class="notfound_page no_content">
  <div class="post_sec">
    <div class="post_right">
      <h1 class="single_title"><?php echo __('لا توجد كتب', 'LibreBooks'); ?></h1>
      <div class="article">
        <?php echo sprintf(__('<p>هممم، يبدو أن هذه الصفحة لا تحتوي على كتب!</p>
     <br />
     <b> حسناً، أين تذهب الآن؟ </b>
     <ul> <li>عد للصفحة <a href="./">الرئيسية</a>.</li>
     <li>بلغ عن المشكلة عبر <a href="/contact-us/">البريد الإلكتروني</a>. </li>
     <li>تابع آخر نشاطات الموقع عبر <a href="/feed/"> خلاصات RSS</a>، <a href="%s">فيس بوك</a>، <a href="%s">تويتر</a>.</li>
     <li>استخدم خاصية <a href="#searchform">البحث</a>.</li>
     </ul>', 'LibreBooks'), 'https://www.facebook.com/LibreBooks', 'https://twitter.com/LibreBooksOrg'); ?>
      </div>
    </div><!--//post_right-->

    <div class="book_details">
      <div id="bookmark"></div>
      <form method="get" role="search" action="<?php bloginfo('url'); ?>/" id="searchform" title="ابحث في الموقع">

        <label class="screen-reader-text" for="s"></label>
        <input name="s" type="text" size="40" placeholder="" />
        <input type="submit" id="searchsubmit" value="ابحث" />

      </form>
    </div>
  </div><!--//post_sec-->
</div>