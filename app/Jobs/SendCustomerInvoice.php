<?php

namespace App\Jobs;

use App\Entities\Order;
use App\Mail\OrderBooked as OrderBookedEmail;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendCustomerInvoice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var Order
     */
    private $order;
    /**
     * @var User
     */
    private $user;

    /**
     * Create a new job instance.
     *
     * @param Order $order
     * @param User $user
     */
    public function __construct(Order $order, User $user)
    {
        //
        $this->order = $order;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $order = $this->order->load('products');
        $data['email'] =  $this->user->email;
        $data['name'] =  $this->user->full_name;
        $data['subject'] =  'Order Booked Successfully';
        $pdf = PDF::loadView('front.emails.invoice', ['order' => $order, 'user' => $this->user]);
        $pdfName = "Invoice ".$order->id.".pdf";

        Mail::send('front.emails.mail', $data, function ($message) use ($data, $pdf, $pdfName) {
            $message->to($data["email"], $data["name"])
                ->subject($data["subject"])
                ->attachData($pdf->output(), $pdfName);
        });
//        Mail::to($this->user->email)->send(new OrderBookedEmail($this->order));
    }
}
