<?php

namespace App\Repository;

use Mpdf\Config\FontVariables;
use Mpdf\Config\ConfigVariables;


class CustomFontForPdf {
    public static function initializeMPDF()
    {
        $defaultConfig = (new ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        return new \Mpdf\Mpdf([
            'fontDir' => array_merge($fontDirs, [
                public_path('pdf-fonts'),
            ]),
            'fontdata' => $fontData + [
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
    }
}