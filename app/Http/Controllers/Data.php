<?php

namespace App\Http\Controllers;


class Data extends Controller
{

    public function getDownload()
    {
        // PDF file is stored under project/public/download/info.pdf
        $file = public_path() . "/download/info.pdf";

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($file, 'filename.pdf', $headers);
    }

    public function getDownloadExcel()
    {
        $filename = 'contoh_filepartai.xlsx';
        $path= base_path(). "/download/example_partais.xlsx";
        // Get path from storage directory

        // Download file with custom headers
        return response()->download($path, $filename, [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ]);
    }

}
