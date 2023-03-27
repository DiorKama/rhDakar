<?php
use App\Mail\sendMail;
use Mail;
class MailController extends Controller{
public function fnmail($name,$password,$userid,$email)
{ 
  $data = array('name'=>$name, 'password' => $password, 'userid' => $userid);
  Mail::send('mail', $data, function($message) use ($name, $email) {
  $message->to($email, $name)
        ->subject('Subject');  //to redirect mail.blade.php page
  $message->from('YourMail@gmail.com','DoNotReply');
  });
}

}

?>