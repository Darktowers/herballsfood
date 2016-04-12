<?php 
include_once("includes/header.php"); ?>
    <title>Contact Us - Herball's Food</title>
</head>
<body>
<?
  
include_once("includes/menu.php");      
?>
    <section class="sections">    
        <div class="grid wrap">
             <h1>Contact Us</h1>
            <p style="
    text-align: center;
    font-size: 1.3em;
">Contact us to have the pleasure of serving you </p>
             
            <div class="contentb" style="align-items: center !important;">
               
               <div class="left ">
                 
                
                    <form action="send_mail.php" class="contactForm" method="POST">
                      <input type="text" placeholder="Name" name="name" required>
                      <input type="email" placeholder="Email" name="email" required>
                      <input type="text" placeholder="Subject" name="subject"  required>
                      <textarea required name="message" id="" cols="30" rows="5" placeholder="Message"></textarea>
                      <button>Send</button>  
                  </form>
               </div>
               <div class="right" style="padding-left: 4em;">
                    <div class="target" style="">
                        <b><p class="name">Douglas Guardo</p></b>
                            <p>Director</p>
                            <p class="email"><a href="mailto:director@ingpharmaceutical.com" target="_top">director@ingpharmaceutical.com</a></p>
                    </div>
                     <div class="target" style="">
                        <b><p class="name">Angelina Medina</p></b>
                            <p>Administrative Assistant</p>
                            <p class="email"><a href="mailto:assistant@ingpharmaceutical.com" target="_top">assistant@ingpharmaceutical.com</a></p>
                    </div>
                    <div class="target" style="">
                        <p class="name">ING Pharmaceutical Private Label</p>
                        <p>1817 NW 79th Avenue</p>
                        <p>Doral, FL 33126</p>
                        <p class="email"><a href="tel:(1)7865182903" target="_top">Phone:786-518-2903</a></p>

                    </div>   
                   
               </div>
               
            </div>         
        </div>

    </section>
   
<?php include_once("includes/footer.php"); ?>
<script>
   $(document).ready(function() {
    initCart();
    setProd();
    $(".pelz").addClass("activext");
});
</script>
