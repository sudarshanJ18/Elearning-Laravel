<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class ContactController extends Controller
{
    public function showContactForm()
    {
        return view('contact');
    }

    public function sendContactForm(Request $request)
    {
        $request->validate([
            'userName' => 'required|string|max:255',
            'userEmail' => 'required|email|max:255',
            'userMsg' => 'required|string|max:5000',
        ]);

        $userName = $request->input('userName');
        $userEmail = $request->input('userEmail');
        $userMsg = $request->input('userMsg');

        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@gmail.com';
            $mail->Password = 'your_email_password';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom($userEmail, $userName);
            $mail->addAddress('recipient_email@gmail.com', 'Recipient Name');
            $mail->Subject = "New Contact Form Message from $userName";
            $mail->Body = "Name: $userName\nEmail: $userEmail\nMessage: $userMsg";

            $mail->send();
            return back()->with('success', 'Message sent successfully!');
        } catch (Exception $e) {
            return back()->with('error', 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo);
        }
    }
}
