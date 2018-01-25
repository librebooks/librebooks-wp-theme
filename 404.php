<?php
/**
 * The template for displaying 404 pages (Not Found).
**/
 get_header(); ?>

<div id="single_cont">
   <div class="notfound_page">
     <div class="post_sec">
        <div class="post_right">

          <h1 class="single_title">الصفحة غير موجودة</h1>
          <div class="article">
             <?php echo sprintf(__('<p>هممم، يبدو أن الصفحة التي تريدها غير موجودة، قد تكون حُذفت أو الرابط الذي اتبعته غير سليم.</p>
          <br />
          <b> حسناً، أين تذهب الآن؟ </b>
          <ul> <li>عد للصفحة <a href="./">الرئيسية</a>.</li>
          <li>بلغ عن المشكلة عبر <a href="/contact-us/">البريد الإلكتروني</a>. </li>
          <li>تابع آخر نشاطات الموقع عبر <a href="/feed/"> خلاصات RSS</a>، <a href="%s">فيس بوك</a>، <a href="%s">تويتر</a>.</li>
          <li>استخدم خاصية <a href="#searchform">البحث</a>.</li>
          </ul>', 'LibreBooks'), 'https://www.facebook.com/LibreBooks', 'https://twitter.com/LibreBooksOrg'); ?>
          </div>

        </div><!--//post_right-->

        <div class="post_left">
             <h1>404</h1>
        </div><!--//post_left-->

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
</div>
<!--//single_cont-->
<div class="clear"></div>
<?php get_footer(); ?>