<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Milon\Barcode\DNS1D;
use PDF;

class PrintBookBarcodeController extends Controller
{
    const BARCODE_ENCODER = 'C39+';

    public function index(string $isbn)
    {
        return view(
            'Libros.barcode',
            [
                'isbn' => $isbn,
                'barcodeImages' => $this->generateImagesFromIsbn($isbn),
            ]
        );
    }

    public function downloadPdf(string $isbn ,Request $request)
    {

        if ($request->query('esCodigo')) {
            $codigo = $isbn;
            $isbn = DB::table('tblejemplares')->where('Codigo', $isbn)->value('ISBN');
            $barcodeImageGenerator = new DNS1D();
            $barcodePdf = PDF::loadView(
                'Libros.barcode',
                [
                    'isbn' => $isbn,
                    'barcodeImages' => [
                        [
                            'code' => $codigo,
                            'image' => $barcodeImageGenerator->getBarcodePNG(
                                $codigo,
                                self::BARCODE_ENCODER
                            ),
                        ]
                    ]
                ]
            );
        } else {
            $barcodePdf = PDF::loadView(
                'Libros.barcode',
                [
                    'isbn' => $isbn,
                    'barcodeImages' => $this->generateImagesFromIsbn($isbn),
                ]
            );
        }
        
        $pdfFileName = sprintf(
            'codigo-de-barras-isbn-%s.pdf',
            $isbn
        );

        return $barcodePdf->download($pdfFileName);
    }


    
    private function generateImagesFromIsbn(string $isbn): array
    {
        $barcodeImageGenerator = new DNS1D();
        $barcodeImages = [];

        $bookVersions = DB::table('tblejemplares')
            ->where([
                ['ISBN', $isbn],
                ['Existe',1]
            ])
            ->get(['Codigo'])
            ->toArray();

        foreach ($bookVersions as $bookVersion) {
            $barcodeImages[] = [
                'code' => $bookVersion->Codigo,
                'image' => $barcodeImageGenerator->getBarcodePNG(
                    $bookVersion->Codigo,
                    self::BARCODE_ENCODER
                ),
            ];
        }

        return $barcodeImages;
    }
}
