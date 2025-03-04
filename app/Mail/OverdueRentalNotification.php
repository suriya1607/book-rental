<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Rental;


class OverdueRentalNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $rental;
    /**
     * Create a new message instance.
     */
    public function __construct(Rental $rental)
    {
        $this->rental = $rental;
    }

    public function build()
    {
        return $this->subject('Your Rental is Overdue')
                    ->view('emails.overdue_rental')
                    ->with(['rental' => $this->rental]);
    }

    // /**
    //  * Get the message envelope. shipment bugs
    //  */
    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         subject: 'Overdue Rental Notification',
    //     );
    // }

    // /**
    //  * Get the message content definition.
    //  */
    // public function content(): Content
    // {
    //     return new Content(
    //         view: 'view.name',
    //     );
    // }

    // /**
    //  * Get the attachments for the message.
    //  *
    //  * @return array<int, \Illuminate\Mail\Mailables\Attachment>
    //  */
    // public function attachments(): array
    // {
    //     return [];
    // }
}
