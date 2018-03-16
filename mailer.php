<?php
$myemail = "carrasquel18@gmail.com";

/ * Verifica todas las entradas de formulario con la función check_input * /

$name = check_input ($_POST ['name'], "Write your name");
$email = check_input ($_POST ['email']);
$message = check_input ($_POST ['message'], "Write your message");

/ * Si el correo electrónico no es válido, muestre el mensaje de error * /

if (! preg_match ("/ ([\ w \ -] + \ @ [\ w \ -] + \. [\ w \ -] +) /", $email))
{
show_error ("Invalid email address");
}
/ * Preparemos el mensaje para el correo electrónico * /

$message= "

Name: $name
E-mail: $email
Message:
$message
";

/ * Enviar el mensaje usando la función mail () * /
mail($myemail, $subject, $message);

/ * Redirigir visitante a la página de agradecimiento * /

header('Location: index.html');
exit();

/ * Funciones que utilizamos * /
función check_input ($data, $problem = '')
{
$data = trim ($data);
$data = stripslashes ($data);
$data = htmlspecialchars ($data);
if ($ problema && strlen ($data) == 0)
{
show_error ($problem);
}
return $data;
}

función show_error ($myError)
{
?>
<html>
<body>

<p> Correct the following error: </p>
<strong> <?php echo $myError; ?> </strong>
<p> Presiona el botón Atrás e intenta nuevamente </p>

</body>
</html>
exit();
}
