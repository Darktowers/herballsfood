<?php 
include_once("includes/conexion.php");
$prod = array(); //creamos un array


$resul=mysqli_query($conexion,"SELECT * FROM products");            
if($row=mysqli_fetch_array($resul))
{
    do{
        $id_prod=$row["id_product"];
        $nom_prod=$row["nombre_product"];
        $price=$row["price"];  
        $img=$row["img"];  
        $index_desc=$row["index_descript"];                    
        $prod[] = array('id'=> $id_prod,'nomProd' => $nom_prod,'price' => $price,'img' => $img,'descript' => $index_desc ); 
    }while($row=mysqli_fetch_array($resul));
}







  echo json_encode($prod);


exit();
?>