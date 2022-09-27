<?php	
	if(empty($_POST['name']) && strlen($_POST['name']) == 0 || empty($_POST['email']) && strlen($_POST['email']) == 0 || empty($_POST['input_504']) && strlen($_POST['input_504']) == 0 || empty($_POST['message']) && strlen($_POST['message']) == 0)
	{
		return false;
	}
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$input_504 = $_POST['input_504'];
	$message = $_POST['message'];
	
	$to = 'receiver@yoursite.com'; // Email submissions are sent to this email

	// Create email	
	$email_subject = "Message from your website";
	$email_body = "You have received a new message. \n\n".
				  "Name: $name \nEmail: $email \nInput_504: $input_504 \nMessage: $message \n";
	$headers = "MIME-Version: 1.0\r\nContent-type: text/plain; charset=UTF-8\r\n";	
	$headers .= "From: contact@yoursite.com\n";
	$headers .= "Reply-To: $input_504";	
	
	mail($to,$email_subject,$email_body,$headers); // Post message
	return true;		

	# BEGIN Cache-Control Headers
<IfModule mod_headers.c>
<FilesMatch "\.(ico|jpe?g|png|gif|swf|css|gz)$">
Header set Cache-Control "max-age=2592000, public"
</FilesMatch>
<FilesMatch "\.(js)$">
Header set Cache-Control "max-age=2592000, private"
</FilesMatch>
<filesMatch "\.(html|htm)$">
Header set Cache-Control "max-age=7200, public"
</filesMatch>
# Enleve le cache pour les ressources dynamiques
<FilesMatch "\.(pl|php|cgi|spl|scgi|fcgi)$">
Header unset Cache-Control
</FilesMatch>
</IfModule>
# END Cache-Control Headers
?>