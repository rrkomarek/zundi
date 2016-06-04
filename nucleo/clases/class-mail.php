<?PHP
header('Content-Type: text/html; charset=utf-8');

class MAIL {

  var $fmt;

  	function __construct($fmt) {
    	$this->fmt = $fmt;
	}

	function traer_smtp(){
		$row["smtp"]="mail.page4face.com";
		$row["port"]=25;
		$row["salida_correo"]="landicorp@page4face.com";
		$row["contracena_sa"]="Landicorp123A!";
		$row["entrada_correo"]="landicorp@page4face.com";
		return $row;
	}

	function enviar($correo,$mensaje,$asunto,$nombre){
		require_once("../includes/phpmailer/PHPMailerAutoload.php");

		$rw=$this->traer_smtp();


		$mail = new PHPMailer;

		$mail->SetLanguage('es');
		$mail->isSMTP();                                     // Set mailer to use SMTP
		//$mail->SMTPDebug = 0;
		$mail->Host = $rw['smtp'];  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = $rw['salida_correo'];                 // SMTP username
		$mail->Password = $rw['contracena_sa'];                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = $rw['port'];                                    // TCP port to connect to

		$mail->setFrom($rw['entrada_correo'], $nombre);

		//$mail->addReplyTo($rw['entrada_correo'], $nombre);
		$mail->addAddress($correo);     // Add a recipient

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = utf8_decode($asunto);
		$mail->Body    = $mensaje;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		$exito = $mail->Send();

	   if(!$exito)
	   {
	   		return false;
	   }
	   else{
			return true;
	   }
	}
}
?>
