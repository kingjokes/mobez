<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NotifyAdminMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */

     private string $email;
    private string $phone;
    private string $name;
    private string $order_id;
    
    public function __construct($name, $phone, $email, $order_id)
    {
        $this->email = $email;
        $this->phone = $phone;
        $this->name = $name;
        $this->order_id = $order_id;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: env('MAIL_USERNAME'),
            to: env('MAIL_ADMIN_ADDRESS'),
            subject: 'Order Received'

        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.notify-admin',
            with: [
                "name" => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'order_id' =>$this->order_id
               
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
