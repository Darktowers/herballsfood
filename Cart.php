<?php 
    include_once("includes/header.php");
    ?>
     <title>Shopping Cart - Herball's Food</title>
</head>
<body>
    <?
    
    include_once("includes/menu.php");  
?>
    <section class="sections shopCart">
        <h1 class="wrap">Shopping Cart</h1>
        <h2 class="wrap subt">Order Details</h2>
       
        <article class="wrap" style="" id="cartAll">
           
        </article>
        <div class="grid">
            <div class="content">
                <!-- <label for="zip">Enter your shipping zip code for tax estimates</label>
                <div class="data" style="margin-top: 1em;">
                    <button class="apply">Apply</button>
                    <input required class="buton zip"  maxlength="8" name="zip" type="numeric" placeholder="Zip Code">
                </div>-->
                <div class="data">
                    <p class="dataviewx ">Subtotal</p>
                    <p class="dataviewy subtotal">$</p>
                </div>
                  <div class="data ">
                    <p class="dataviewx">Shipping</p>
                    <p class="dataviewy ship">Free</p>
                </div>
                <div class="data ">
                    <p class="dataviewx">Estimated Tax</p>
                    <p class="dataviewy tax">7%</p>
                </div>
                 <div class="data ">
                    <p class="dataviewx">Total</p>
                    <p class="dataviewy total">$</p>
                </div>
                  <div class="data ">
                   <button class="check">Checkout Now</button>
                </div>
            </div>
        </div>
    </section>
   
<?php include_once("includes/footer.php"); ?>

<script>
   $(document).ready(function() {
    prod();
    initCart();
    setProd();
    showItems(); 
    $(".itemComprado").on("change", ".cants", function(e) {
        var index = $('option:selected', this).attr('alt');  
        var canty = $(this).val();
        lel[index].cant = parseInt(canty);  
        console.log(lel[index]);   
        validateProductCart(lel[index]);
        location.reload(); 
        console.log("change");
     });   
    $(".itemComprado").on("click", ".delete", function(e) {
        var index = $(this).attr('alt');  
        console.log(index);
        borrar(lel[0]);
        location.reload(); 
     });   
      $(".check").on("click",function(e){
          e.preventDefault();
          sessionStorage.setItem("subtotal", xto); 
          sessionStorage.setItem("total",xt);
          window.location.href = 'Checkout.php';   
      });
});
</script>