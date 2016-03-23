<?php include_once("includes/header.php"); ?>
    <section class="sections shopCart">
        <h1 class="wrap">Shopping Cart</h1>
        <h2 class="wrap">Order Details</h2>
       
        <article class="wrap" style="" id="cartAll">
           <div class="itemComprado">
               <div class="itemImg">
                   <img src="imagenes_herballsfood/img_prod1.jpg" alt="">
               </div>
               <div class="itemNombre">
                   <p>Acai X 90 Softgels</p>
               </div>
               <div class="itemCantidad">
                   <select name="itemCantidad" id="">
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6" selected>6</option>
                   </select>
               </div>
               <div class="itemPrice">
                   <p>$32.2</p>
               </div>
               <div class="itemSubt">
                   <p>$65.1</p>
               </div>
           </div>
               <div class="itemComprado">
               <div class="itemImg">
                   <img src="imagenes_herballsfood/img_prod1.jpg" alt="">
               </div>
               <div class="itemNombre">
                   <p>ProstaCoffee X 90 Softgels</p>
               </div>
               <div class="itemCantidad">
                   <select name="itemCantidad" id="">
                       <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6" selected>5</option>
                   </select>
               </div>
               <div class="itemPrice">
                   <p>$44.2</p>
               </div>
               <div class="itemSubt">
                   <p>$185.1</p>
               </div>
           </div>
        </article>
    </section>
   
<?php include_once("includes/footer.php"); ?>

<script>
   $(document).ready(function() {
    prod();
    initCart();
    setProd();         
});
</script>