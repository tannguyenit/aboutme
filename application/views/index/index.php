<div class="header">
  <div>
    <div id="slider">
      <figure>
      <?php foreach ($arSlide as $key => $value) {?>
        <img src="<?php echo FILES?>/<?php echo $value["picture"]?>" alt width="780px" height="350px">
      <?php }?>
      </figure>
    </div>
    <ul>
      <li>
        <a href="https://www.facebook.com/vinaenter.edu.vn" target="_blank">Facebook</a>
      </li>
      <li>
        <a href="https://www.facebook.com/vinatab.java.oop" >Twitter</a>
      </li>
      <li>
        <a href="https://plus.google.com/u/0/116224150844139911881">Googleplus</a>
      </li>
      <li>
        <a href="http://vinaenter.edu.vn" target="_blank">VinaENTER EDU</a>
      </li>
    </ul>
  </div>
</div>  
<div class="body">
  <div class="section">
    <div class="article">
      <h2><?php echo $arAbout["name"];?></h2>
       <?php $pic=$arAbout["picture"]?>
       
      <img src="<?php echo FILES?>/<?php echo $pic?>" alt="">
      <p>
      <?php echo $arAbout["detail_text"]?>
      </p>
    </div>
    <div class="aside">
      <b>Những Câu Nói Hay</b>
      <p>
       <?php echo $arSay[0]["content"]?>
      </p>
      <span class="author"><?php echo $arSay[0]["author"]?></span>
    </div>
  </div>
</div>
<div class="footer">
  <div>
    <a href="doctors.html"><img src="<?php echo PUBLIC_URL?>/images/friends.jpg" alt="">
    </a>
    <h3>Quan điểm tình bạn của Tân Nguyễn</h3>
    <p>
      Có một người bạn khăng khít còn hơn là một người anh em ruột.
    </p>
  </div>
  <div>
    <a href="services.html"><img src="<?php echo PUBLIC_URL?>/images/life.jpg" alt="">
    </a>
    <h3>Quan điểm về cuộc sống của Tân Nguyễn</h3>
    <p>
      Hãy sống là chính mình, bình thường nhưng không tầm thường.
    </p>
  </div>
  <div>
    <a href="services.html"><img src="<?php echo PUBLIC_URL?>/images/love.jpg" alt="">
    </a>
    <h3>Quan điểm về tình yêu của Tân Nguyễn</h3>
    <p>
      Cuộc sống mà không có tình yêu thì không còn là cuộc sống nữa.
    </p>
  </div>
</div>
