<?php
$codprod=$_GET['codprod'];
include_once("includes/conexion.php");
session_start();
$prod = array(); //creamos un array


$resul=mysqli_query($conexion,"SELECT * FROM products WHERE id_product = '$codprod'  ");            
        if($row=mysqli_fetch_array($resul))
        {
            do{
                $nombreProd=$row["nombre_product"];
               $id_prod=$row["id_product"];
        $SupleFacts=$row["SupleFacts"];
        $longDesc=$row["longDesc"];  
        $img=$row["img"];  
        $directions=$row["directions"];
        $others=$row["others"];                    
        $prod[] = array('id'=> $id_prod,'SupleFacts' => $SupleFacts,'longDesc' => $longDesc,'img' => $img,'directions' => $directions,'others' => $others );                
            }while($row=mysqli_fetch_array($resul));
include_once("includes/header.php");
?>

    <title><?php echo $nombreProd?> - Herball's Food</title>
</head>
<body>
<?php
include_once("includes/menu.php");   
        
?>
    <section class="sections">    
        <div class="grid wrap">
            <div class="contentb">
               <div class="left Slider">
                   <img src="imagenes_herballsfood/<?php echo $prod[0]['img']; ?>" alt="">
               <div class="button" lel="<?php echo $prod[0]['id']; ?>">Buy Now</div>
               </div>
               <div class="right">
                   <div class="description">
                       <?php echo $prod[0]['longDesc']; ?>
                   <img class="right" src="imagenes_herballsfood/leftoji.png" alt="">
                   </div>
                   <div class="direction">
                        <p><?php echo $prod[0]['directions']; ?></p>
                   </div>
                   <div class="supleFact">
                       <?php echo $prod[0]['SupleFacts']; ?>
                   </div>
                   <div class="others">
                        <p><?php echo $prod[0]['others']; ?></p>
                   </div>
                   <div class="statement">
                       <p>*These statements have not been evaluated by FDA. This product is not intended to diagnose, treat, cure or prevent any disease.</p>
                   </div>
               </div>
            </div>         
        </div>

    </section>
   
<?php }else{echo "<section class='sections'><div class='grid wrap'><p>No se encontraron resultados</p></div></section>";}include_once("includes/footer.php"); ?>
<script>
   $(document).ready(function() {
    initCart();
    setProd();
    
});
</script>
