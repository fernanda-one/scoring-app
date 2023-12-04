<?php

namespace App\Imports;

use App\Models\Gelanggang;
use App\Models\Partai;
use App\Models\Pertandingan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PartaiImport implements ToCollection
{

    private $message;

    public function __construct()
    {
        $this->message = '';
    }

    public function getMessage()
    {
        return $this->message;
    }
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $allkelas =['A','B','C','D','F','G','H','I','J'];
        $errorKelas=[];
        $firstIteration = true;
        $data = [];
        foreach ($collection as $row){
            if ($firstIteration) {
                $firstIteration = false;
                continue;
            }
            $kelas = strtoupper($row[6]);
            if (!array_search($kelas, $allkelas)){
                $errorKelas[]=intval($row[0]);
            }
            if (!$row[1]){
                continue;
            }
            $data[] = [
                'id' => intval($row[0]),
                'babak' => $row[1],
                'sudut_merah' => $row[2],
                'sudut_biru' => $row[3],
                'contingen_sudut_merah' => $row[4],
                'contingen_sudut_biru' => $row[5],
                'kelas' => $kelas,
                'jenis_kelamin' => strtolower($row[7]),
            ];
        }
        $existingIds = Partai::whereIn('id', array_column($data, 'id'))->pluck('id')->toArray();
        if (count($existingIds) > 0) {
            $existingIdsString = implode(', ', $existingIds);
            $this->message = "Data with IDs: $existingIdsString already exists and was not imported !";
            if(count($errorKelas)>0){
                $existingIdsString = implode(', ', $errorKelas);
                $this->message = "Data with IDs: $existingIdsString Class Not Found !";
            }
        } else {
            foreach ($data as $row) {
                Partai::create([
                    'id' => $row['id'],
                    'babak' => $row['babak'],
                    'sudut_merah' => $row['sudut_merah'],
                    'sudut_biru' => $row['sudut_biru'],
                    'contingen_sudut_merah' => $row['contingen_sudut_merah'],
                    'contingen_sudut_biru' => $row['contingen_sudut_biru'],
                    'kelas' => $row['kelas'],
                    'jenis_kelamin' => $row['jenis_kelamin'],
                ]);
            }
        }
    }
}
