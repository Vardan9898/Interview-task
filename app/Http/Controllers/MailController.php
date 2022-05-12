<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class MailController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function sendMail()
    {
        $email = 'alexander@webscribble.com';

        $maildata = [
            'title' => 'Orders',
        ];

        $orders = Order::with('client', 'product')->filter(request([
            'search', 'filters'
        ]))->get();

        Mail::to($email)->bcc('nick@webscribble.com')->send(new SendEmail($maildata, $orders));

        return Redirect::back()->with('success', 'Mail has been sent successfully');
    }
}
