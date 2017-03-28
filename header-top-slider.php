<a href="index.html" class="logo"><img src="assets/images/logo.png"></a>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="assets/images/home-page-banner.jpg" class="responsive-img">
        <div class="carousel-caption">
            <h3>Modular-kitchen-accesssories</h3>
            <p>All kinds of Kitchen Accesssories. Bathroom Fittings, Office Furniture &amp; Fitting </p>
        </div>
      </div>

      <div class="item">
        <img src="assets/images/home-page-banner.jpg" class="responsive-img">
        <div class="carousel-caption">
            <h3>Modular-kitchen-accesssories</h3>
            <p>All kinds of Kitchen Accesssories. Bathroom Fittings, Office Furniture &amp; Fitting </p>
        </div>
      </div>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        <img src="assets/images/pvr-arrow-home-banner.png">
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        <img src="assets/images/next-arrow-home-banner.png">
    </a>
</div>
<div class="explore">
    <ul>
        <li></li>
        <li> <button class="explore-btn btn" id="portfolio">Explore</button></li>
        <li><a href="#myAnchor" rel="" id="anchor1" class="anchorLink"> <img src="assets/images/scroll-banner-img.png"></a></li>
    </ul>
</div>

<script type="text/javascript">
$('.anchorLink').click(function(){
    $('html, body').animate({
        scrollTop: $( $(this).attr('href') ).offset().top - 90
    }, 1000);
    return false;
});
</script>