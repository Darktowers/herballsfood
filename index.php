<?php include_once("includes/header.php"); ?>
    <title>High Quality products that Support your Health - Herball's Food</title>
</head>
<body>

<?php include_once("includes/menu.php"); ?>
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
<section class="sections amazons">
    <h1 class="wrap">Nature's best now in your hands</h1>
    <article class="wrapnormal lel">
        <div class="amazonlogo"><img src="img/amazon.png" alt="" width="286"></div>
        <div class="phrases">
            <div class="phrase">
                <p>The south of the Colombian Amazon close to what is now known as Sibundoy, on the Putumayo riverside, was the origin of much knowledge about medicinal herbs. The wise indigenous people from the region were convinced that diseases were spirits and they could be cured using the appropriate herb. These plants had the virtue of take out the evil spirit from the sick body, giving relief for the disease.</p>
            </div>
            <div class="phrase">
                <p>The Colombian Amazon has been for years the source of many scientific discoveries if which it would have been impossible to produce hundreds of new pharmaceutical products. That is why we should protect the Colombian Amazon to continue proving its benefits to the global health and produce much of the oxygen we breathe.</p>
            </div>
        </div>
    </article>
</section>
<div class="imgparal" data-parallax="scroll" data-bleed="0"  data-z-index="1" data-image-src="./img/herball2.jpg">
	</div>
<section class="sections products" id="Products">
    <h1 class="wrap">Our Products</h1>
    <article class="wrapnormal">
        <div class="prods">
          
        </div>
    </article>
</section>
<?php include_once("includes/footer.php"); ?>

<script>
   $(document).ready(function() {
    prod();
    initCart();
    setProd();
      
                    $(".phrases").owlCarousel({
 
                        //navigation : true,  Show next and prev buttons
                        slideSpeed : 200,
                        paginationSpeed : 400,
                        singleItem:true
                    
                        // "singleItem:true" is a shortcut for:
                        // items : 1, 
                        // itemsDesktop : false,
                        // itemsDesktopSmall : false,
                        // itemsTablet: false,
                        // itemsMobile : false
                    
                    }); 
});
</script>