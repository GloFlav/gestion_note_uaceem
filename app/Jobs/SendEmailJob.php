<?php

namespace App\Jobs;

use App\Mail\ConvocationEmail;
use App\Models\Candidat;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    public $candidatId;
    public $emailAddress;
    public function __construct($emailAddress, $candidatId)
    {
        //
        $this->candidatId = $candidatId;
        $this->emailAddress = $emailAddress;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // Fetch the candidate data with related models
            $candidats = Candidat::with(['mention', 'concours', 'payement'])->where("id", $this->candidatId)->get();

            if ($candidats->isEmpty()) {
                throw new Exception("Candidate not found");
            }

            $candidat = $candidats[0];

            // Generate the PDF
            $pdf = Pdf::loadView('convocation', compact('candidats'));
            $name = 'convocation_' . str_replace(' ', '_', $candidat->nom) . '.pdf';
            $pdfPath = public_path("pdfs/" . $name);
            $pdf->save($pdfPath);

            // Send the email
            Mail::to($this->emailAddress)->send(new ConvocationEmail($candidat, $pdfPath));

            // Delete the PDF file after sending the email
            unlink($pdfPath);
        } catch (Exception $e) {
            // Handle exceptions (e.g., log the error, notify the user)
            Log::error("Error generating convocation PDF: " . $e->getMessage());
            // Optionally, rethrow the exception or handle it in another way
            throw $e;
        }
    }
}
