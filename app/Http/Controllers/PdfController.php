<?php

namespace App\Http\Controllers;

use App\Models\Prescription;
use App\Repository\CustomFontForPdf;
use Illuminate\Http\Request;


class PdfController extends Controller
{
    // prescription download
    public function prescription_download($id)
    {
        $data = Prescription::findOrFail($id);

        //Generate pdf
        $body = view('pdf.prescription')
            ->with(compact('data'))
            ->render();

        $mpdf = CustomFontForPdf::initializeMPDF();

        $mpdf->useSubstitutions = true;
        $mpdf->showWatermarkText = true;
        $mpdf->SetTitle($data->invoice . '-prescription.pdf');
        $mpdf->WriteHTML($body);
        return $mpdf->Output('pdf/prescription-' . $data->invoice . '.pdf', 'D');
    }
}
