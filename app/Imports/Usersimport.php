<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Usersimport implements ToCollection, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function collection(Collection $collection)
    {
        $user = new User;
        foreach($collection as $index => $data){
          $user =  User::create([
                'name' => $data['name'],
                'nis' => $data['nis'],
                'alamat' => $data['alamat'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'agama' => $data['agama'],
                'no_hp' => $data['no_hp'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                 'jurusan' => $data['jurusan'],
                'tahun' => $data['tahun'],
                'pekerjaan' => $data['pekerjaan']
            ]);
            $user->role()->sync(2);
        }
    }

    // public function headingRow(): int
    // {
    //     return 2;
    // }
    // public function model(array $row)
    // {
    //     return new User([
    //         'nis'     => $row[0],
    //         'name'    => $row[1],
    //         'email'     => $row[2],
    //         'alamat'    => $row[3], 
    //         'jenis_kelamin'     => $row[4],
    //         'agama'    => $row[5],
    //         'no_hp'     => $row[6],
    //         'tahun'    => $row[7],
    //         'jurusan'     => $row[8],
    //         'password' => bcrypt($row[9]),
            
    //      ]);
    // }
}
