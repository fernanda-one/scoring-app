<?php

namespace App\Http\Controllers;

use http\Client\Response;

class Data extends Controller
{

    public function getDownload()
    {
        //PDF file is stored under project/public/download/info.pdf
        $file= public_path(). "/download/info.pdf";

        $headers = array(
            'Content-Type: application/pdf',
        );

        return Response::download($file, 'filename.pdf', $headers);
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
