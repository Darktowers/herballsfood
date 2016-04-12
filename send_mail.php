<?php 
include_once("includes/conexion.php");
$name=$_POST["name"];
$email=$_POST["email"];
$subject=$_POST["subject"];
$message=$_POST["message"];


require("includes/class.phpmailer.php");
$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "mail.herballsfood.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "sales@herballsfood.com"; // Correo completo a utilizar
$mail->Password = "@fr|D<*J;kU10Zh"; // Contraseña
$mail->Port = 26  ; // Puerto a utilizar

//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
$mail->From = $email; // Desde donde enviamos (Para mostrar)
$mail->FromName = $name;
$mail->setLanguage('es');
//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: From: Nombre <correo@dominio.com>”) de //correo.
$mail->AddAddress('sales@herballsfood.com'); // Esta es la dirección a donde enviamos
$mail->addBCC('director@ingpharmaceutical.com');
$mail->addBCC('assistant@ingpharmaceutical.com');
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = $subject; // Este es el titulo del email.



$body .= '<p>Name: '.$name.'</p>';
$body .= '<p>Email: '.$email.'</p>';
$body .= '<p>'.$message.'</p>';

$mail->Body = $body; // Mensaje a enviar
$exito = $mail->Send(); // Envía el correo.

//También podríamos agregar simples verificaciones para saber si se envió:
if($exito){
    include_once("includes/header.php");
    ?>
     <title>Email Send - Herball's Food</title>
</head>
<body>
    <?
     
    include_once("includes/menu.php");  
?>
     <section class="sections">    
        <div class="grid wrap">
             <h1>Email received</h1>
            <p style="
    text-align: center;
    font-size: 1.3em;
">We will contact with you soon as posible</p>
<a href="index.php" style="    border: none;
    background: #f5460d;
    color: #fff;
    padding: .5em 2.2em;
    font-size: 1.5em;
    margin-top: 2em;">Go Back</a>
</div>
</section>

<?
include_once("includes/footer.php"); 
}else{
echo "Opps.";
}
?>