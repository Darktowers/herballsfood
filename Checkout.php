<?php include_once("includes/header.php"); ?>
    <title>Checkout - Herball's Food</title>
</head>
<body>
<?include_once("includes/menu.php"); 
?>
    <section class="sections shopCart">
        <h1 class="wrap">Checkout</h1>
        <h2 class="wrap subt">Order Invoice</h2>
       
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
                 <div class="data t">
                    <p class="dataviewx">Total</p>
                    <p class="dataviewy total">$</p>
                </div>
               
            </div>
            <form action="" method="post" class="Shippingdata">
            <div class="shipping wrap" style="position:relative;">
                <p style="font-size: 1.5em;">Shipping Address</p>
                <div class="data">
                    <input class="fname" name="fname" type="text" placeholder="First Name">   
                    <input  class="lname" name="lname" type="text" placeholder="Last Name">     
                </div>
                 <div class="data">
                    <input class="email" name="email" type="email" placeholder="Email">   
                    <input class="tel" name="tel" type="text" placeholder="Phone">   
                       
                </div>
                 <div class="data">
                    <input class="adress1" name="adress1" type="text" placeholder="Adress Line 1">   
                    <input class="adress2" name="adress2" type="text" placeholder="Adress Line 2">   
                </div>
                <div class="data">
                    <input class="zip" name="zip" type="number" placeholder="Zip Code" maxlength="8" name="zip" >   
                    <input class="city" name="city" type="text" placeholder="City" >     
                    <input class="state" name="state" type="text" placeholder="State" >  
                
                </div>
                 <div class="data ">
                     <input name="subtotalx"type="hidden" class="subtotalx">
                     <input name="totalx"type="hidden" class="totalx">
                     <input name="cartx" name="cartx"type="hidden" class="cartx">
                     <div class="error "></div>
                   <button class="place">Place Order</button>
                   
                </div>
            </div>
            </form>
        </div>
        <div class="sucess"><img src="img/check.png" width="150" alt=""></div>
    </section>
   
<?php include_once("includes/footer.php"); ?>

<script>
   $(document).ready(function() {
    function isValidEmail(mail)
    {
        return /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(mail);
    }
    initCart();
 
    showItems2(); 
      $(".zip").on("keyup",function(){
         zip = $(this).val();
          buscarZip(zip);
       
     
      });
          
      $(".place").on("click",function(e){
        fname= $(".fname").val();
        lname= $(".lname").val();
        email= $(".email").val();
        phone= $(".tel").val();
        adress1= $(".adress1").val();
        adress2= $(".adress2").val();
        zip= $(".zip").val();
        
        //typeof("333") == "string"
             
        e.preventDefault();
        var cart=sessionStorage.getItem("cart")
        var subtotal=sessionStorage.getItem("subtotal"); 
        var total=sessionStorage.getItem("total");
        $(".subtotalx").val(subtotal);
        $(".totalx").val(total);
        $(".cartx").val(cart);
        
        
        if(fname != "" && lname != ""  && email != "" && phone != "" && adress1 != "" && zip != "" ){
             if (isValidEmail(email) == true) {
                 $.post( "includes/validatecheckout.php", $( ".Shippingdata" ).serialize())
                    .done(function( data ) {
                        
                        $(".sucess").append("<p>"+data+"</p>");
                         $('.sucess').addClass('animated bounce');
                         $(".sucess").addClass('flex');
                          setTimeout(function() {
                            $(".sucess").removeClass("flex");
                        },5000);
                    })
                    .fail(function() {
                        $(".error").html("Oops! Try again later");
                        $(".error").show();
                        $('.error').addClass('animated bounce');
                    });
                 
             }
             else{
                $(".error").html("Please enter a valid email");
                $(".error").show();
                $('.error').addClass('animated bounce');
                $(".email").focus();
             }
             
        }else{
            $(".error").html("There is some empty fields");
            $(".error").show();
            $('.error').addClass('animated bounce');
            
            
        }
        setTimeout(function() {
                    $(".error").fadeOut(500);
                },3000);
               
     
        
               
      });
      
});
</script>







