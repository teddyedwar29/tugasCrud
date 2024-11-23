<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        $data = [
            'tittle' => 'Home | Kelompok',
            'test' => ["satu","dua","tiga"]
        ];
        return view('pages/home',$data);
    }
    public function about()
    {
        $data = [
            'tittle' => 'About | Teddy Edwar'
        ];

        return view('pages/about',$data);
    }

    public function contact()
    {
        $data = [
            'tittle' => 'Contact',
            'alamat' => [
                [
                    'tipe' => 'Rumah',
                    'alamat' => 'Jl. Rahmah Ely No 11 A',
                    'kota' => 'Pariaman'
                ],
                [
                    'tipe' => 'Kantor',
                    'alamat' => 'Jl. Gajah Mada',
                    'kota' => 'Padang'
                ]
            ]
        ];

        return view('pages/contact',$data);
    }
}
