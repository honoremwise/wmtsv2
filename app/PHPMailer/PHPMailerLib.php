<?php
/**
 * send email library with PHPMailer
 */
namespace App\PHPMailer;
use App\PHPMailer\PHPMailer;
use App\PHPMailer\Exception;
use App\PHPMailer\SMTP;
class PHPMailerLib
{

  function __construct()
  {
    // code...
  }
  public function load()
  {
    $mail = new PHPMailer;
    return $mail;
  }
}

?>
