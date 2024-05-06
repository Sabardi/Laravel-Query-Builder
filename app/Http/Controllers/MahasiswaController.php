<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    //
    public function insert(){
        $data = DB::table('mahasiswas')->insert(


            [
                'nim'=> '023291SSW0383',
                'nama'=> 'sabardi',
                'tanggal_lahir'=> '2000-01-04',
                'ipk'=> '3.5',
                'created_at'=> now(),
                'updated_at'=> now()
            ],

        );
        dump($data);
    }

    public function update(){
        $data = DB::table('mahasiswas')->where('id','1')->update([
            'tanggal_lahir' => '2002-01-01',
            'ipk'=> '3.19',
            'created_at'=> now()
        ]);

        dump($data);
    }
}
