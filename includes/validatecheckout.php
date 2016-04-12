<?php 
include_once("conexion.php");
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$tel=$_POST["tel"];
$adress1=$_POST["adress1"];
$adress2=$_POST["adress2"];
$zip=$_POST["zip"];
$subtotalx=$_POST["subtotalx"];
$totalx=$_POST["totalx"];
$cartx=$_POST["cartx"];
$city=$_POST["city"];
$state=$_POST["state"];

$products=NULL;
$prods=json_decode($cartx);
for($x = 0;$x<count($prods->products);$x++ ){
    $products ='<tr><td class="lol">'.$prods->products[$x]->product.'</td><td  class="lol">'.$prods->products[$x]->cant.'</td><td  class="lol">$'.$prods->products[$x]->price.'</td></tr>'.$products;
}
require("class.phpmailer.php");
$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "mail.herballsfood.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "sales@herballsfood.com"; // Correo completo a utilizar
$mail->Password = "@fr|D<*J;kU10Zh"; // Contraseña
$mail->Port = 26  ; // Puerto a utilizar

//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
$mail->From = "sales@herballsfood.com"; // Desde donde enviamos (Para mostrar)
$mail->FromName = "Sales herballsFood";
$mail->setLanguage('es');
//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: From: Nombre <correo@dominio.com>”) de //correo.
$mail->AddAddress($email); // Esta es la dirección a donde enviamos
$mail->addBCC('director@ingpharmaceutical.com');
$mail->addBCC('assistant@ingpharmaceutical.com');
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = "Order details herballsfood"; // Este es el titulo del email.


$body .= "<html lang='en'><style>p{font-size:18px;font-weight: normal;}.lol{
	border-top:1px solid #ccc;			
    padding: 8px 16px;
    text-align: center;
}
.dark{
    color: #fff;
    padding: 8px 16px;
    font-size:25px;
    background:#7db952;
}
</style>";
$body .= "<div style='font-family: calibri; width:600px;'>";
$body .= "<h1 class='dark' >Thank you for your order</h1>";
$body .= "<p>Your order has been received and now is being processed, your order details are shown bellow for your reference</p>";
$body .= "<h2>Order:#001<h2>";
$body .= "<table>";
$body .= "<tr><td  class='lol'>Product</td><td  class='lol'>Quantity</td><td  class='lol'>Unit Price</td></tr>";
$body .= $products;
$body .= "<tr><td></td><td class='lol'>Cart Subtotal</td><td class='lol'>$".$subtotalx."</td></tr>";
$body .= "<tr><td></td><td class='lol'>Shiping</td><td class='lol'>Shipping Free</td></tr>";
$body .= "<tr><td></td><td class='lol'>Estimated Tax</td><td class='lol'>7%</td></tr>";
$body .= "<tr><td></td><td class='lol'>Cart Total</td><td class='lol'>$".$totalx."</td></tr>";
$body .= "</table>";
$body .= "<h2>Custommer Details<h2>";
$body .= '<p>Name: '.$fname.' '.$lname.'</p>';
$body .= '<p>Email: '.$email.'</p>';
$body .= '<p>Phone: '.$tel.'</p>';
$body .= "<h2>Shipping Address<h2>";
$body .= '<p>Adress #1: '.$adress1.'</p>';
$body .= '<p>Adress #2: '.$adress2.'</p>';
$body .= '<p>Phone: '.$tel.'</p>';
$body .= '<p>Zip Code: '.$zip.'</p>';
$body .= '<p>City: '.$city.'</p>';
$body .= '<p>State: '.$state.'</p>';


$body .= "<div>";
$body .= "</html>";
$mail->Body = $body; // Mensaje a enviar
$exito = $mail->Send(); // Envía el correo.

//También podríamos agregar simples verificaciones para saber si se envió:
if($exito){
echo "We already recieve your order, Thank you for buy with Herballs Food, We will contact with you soon as posible";
}else{
echo "Hubo un inconveniente. Contacta a un administrador.";
}
?>