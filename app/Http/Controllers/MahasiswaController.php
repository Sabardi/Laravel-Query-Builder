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
        $data = DB::table('mahasiswas')->where('id','3')->update([
            'nim'=> '023p1SSW0383',
            'tanggal_lahir' => '2002-01-01',
            'ipk'=> '3.19',
            'created_at'=> now()
        ]);

        dump($data);
    }

    public function updateWhere(){
        $result = DB::table('mahasiswas')
        ->where('ipk','<',3)
        ->where('nama','<>','alex')
        ->update(
         [
         'tanggal_lahir' => '2002-01-01',
         'updated_at' => now(),
         ]
         );

         dump($result);
    }

    public function updateOrInsert(){
        $data = DB::table('mahasiswas')->updateOrInsert(
            [
                'nim' => '19005011',
            ],
            [
                'nama' => 'Rianaqwq Putria',
                'tanggal_lahir' => '2000-11-23',
                'ipk' => 2.7,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        dump($data);
    }

    public function delete(){
        $data = DB::table('mahasiswas')
        ->where('ipk','>=',3.1)->delete();
        dump($data);
    }

    public function getView(){
        $result = DB::table('mahasiswas')->get();
        return view('welcome',['mahasiswas' => $result]);
    }

    public function getWhere(){
        $result = DB::table('mahasiswas')
        ->where('ipk','<','3')
        ->orderBy('nama', 'desc')
        ->get();

         return view('welcome',['mahasiswas' => $result]);
         }
}
