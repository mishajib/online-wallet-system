<?php

use App\Models\Setting;

function sendMail($receiver, $subject, $message, $senderEmail = "no-reply@ows.com")
{
    $setting = Setting::first();
    $headers = "From: $setting->site_name <$senderEmail> \r\n";
    $headers .= "Reply-To: <$receiver> \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    mail($receiver, $subject, $message, $headers);
}
