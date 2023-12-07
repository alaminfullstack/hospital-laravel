<?php

namespace App\Http\Controllers\Patient;

use App\Models\Prescription;
use Illuminate\Http\Request;
use Mpdf\Config\FontVariables;
use Mpdf\Config\ConfigVariables;
use App\Http\Controllers\Controller;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prescriptions = Prescription::where('patient_id', auth()->id())->latest()->paginate();
        return view('patient.prescriptions.index', compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prescription = Prescription::findOrFail($id);
        return view('patient.prescriptions.show', compact('prescription'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $data = Prescription::findOrFail($id);

        //Generate pdf
        $body = view('pdf.prescription')
            ->with(compact('data'))
            ->render();

        $mpdf = new \Mpdf\Mpdf([

            'fontDir' => array_merge($fontDirs, [
                public_path('pdf-fonts'),
            ]),
            'fontdata' => $fontData + [ // lowercase letters only in font key
                'nikosh' => [
                    'R' => 'Nikosh.ttf',
                    'useOTL' => 0xFF,
                ]
            ],
            
            'tempDir' => public_path('uploads/temp'),
            'default_font' => 'nikosh',
            'mode' => 'utf-8',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
            'autoVietnamese' => true,
            'autoArabic' => true,
            'margin_top' => 8,
            'margin_bottom' => 8,
            'format' => 'A4'
        ]);

        $mpdf->useSubstitutions = true;
        $mpdf->showWatermarkText = true;
        $mpdf->SetTitle($data->invoice . '-prescription.pdf');
        $mpdf->WriteHTML($body);
        return $mpdf->Output('pdf/prescription-'.$data->invoice.'.pdf', 'D');
    }
}

	/* Nikosh font mpdf fontvariable*/
    // "nikosh" => [
    //     'R' => "Nikosh.ttf",
    //     'useOTL' => 0xFF,
    // ],