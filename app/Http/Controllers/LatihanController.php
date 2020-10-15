<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller
{
    public function index(){
        return 'test berhasil';
    }

    public function urutan($ke){
        //return 'urutan ke - ' . $urutan;
        $numbers = [
            ['ke' => $ke, 'nomor' => 20],
            ['ke' => $ke, 'nomor' => 30],
            ['ke' => $ke, 'nomor' => 40]
        ];
        return view('urutan', compact('numbers'));
    }

    public function testing($ke){
        
        return view('testing', ['ke' => $ke]);
    }
}
