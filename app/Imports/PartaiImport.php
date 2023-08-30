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
        $gIds = array();
        $gelanggang = Gelanggang::latest();
        foreach ($gelanggang as $id) {
            $gIds[] = $id['id'];
        }

        foreach ($collection as $row){
            $gelanggang_id = in_array($row[2], $gIds) ? $row[2] : null;
            $data[] = [
                'id' => intval($row[0]),
                'babak' => intval($row[1]),
                'gelanggang_id' => intval($gelanggang_id),
                'sudut_merah' => $row[3],
                'sudut_biru' => $row[4],
                'kelas' => $row[5],
                'jenis_kelamin' => $row[6],
                'status' => $row[7],
            ];
        }
        array_shift($data);
        $existingIds = Partai::whereIn('id', array_column($data, 'id'))->pluck('id')->toArray();

        if (count($existingIds) > 0) {
            $existingIdsString = implode(', ', $existingIds);
            $this->message = "Data with IDs: $existingIdsString already exists and was not imported !";
        } else {
            foreach ($data as $row) {
                Partai::create([
                    'id' => $row['id'],
                    'babak' => $row['babak'],
                    'gelanggang_id' => $row['gelanggang_id'],
                    'sudut_merah' => $row['sudut_merah'],
                    'sudut_biru' => $row['sudut_biru'],
                    'kelas' => $row['kelas'],
                    'jenis_kelamin' => $row['jenis_kelamin'],
                    'status' => $row['status'],
                ]);
            }
        }
    }
}
