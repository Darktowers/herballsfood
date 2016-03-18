<?php include_once("includes/header.php"); ?>
    <div class="Slider wrap">
        <center>
            <img class="gif" src="imagenes_herballsfood/scheduler-loading.gif" alt="">
        </center>
    </div>
    <section class="sections welcome">
        <h1 class="wrap">Welcome to Herball's Food</h1>
        <article class="wrap" style="
    max-width: 700px;
">
            <p>We offer high quality products that have been developed with the best 
				of nature, thinking  in  your health and wellness.	</p>
                <p> The developments of our products are made with qualified scientific 
				personnel, who have master and PhD in chemistry. With this we guarantee 
				products that really help you to have a healthier life.</p>
            <img class="left"  src="imagenes_herballsfood/leftoji.png" alt="">
            <img class="right" src="imagenes_herballsfood/rightoji.png" alt="">
        </article>
    </section>
   	<div class="imgparal" data-parallax="scroll" data-bleed="0"  data-z-index="1" data-image-src="./img/herball.jpg">
	</div>
<section class="sections products">
    <h1 class="wrap">Our Products</h1>
    <article class="wrapnormal">
        <div class="prods">
          
        </div>
    </article>
</section>
<div class="imgparal" data-parallax="scroll" data-bleed="0"  data-z-index="1" data-image-src="./img/herball2.jpg">
	</div> 
<?php include_once("includes/footer.php"); ?>

<script>
   $(document).ready(function() {
    prod();
    initCart();
    setProd();
});
</script>