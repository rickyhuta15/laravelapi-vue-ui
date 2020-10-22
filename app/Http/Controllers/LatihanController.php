<?php

namespace App\Http\Controllers;

use App\Models\Friends;
use Illuminate\Http\Request;

class LatihanController extends Controller
{
    /*
    public function index(){
        return 'test berhasil';
    }

    public function urutan($ke){
        //return 'urutan ke - ' . $urutan;
        $friends = Friends::paginate(1);
        //setelah friends, ada keterangan 'all', keterangan tersebut bisa diganti
        //contohnya dengan 'paginate(4)' yang artinya hanya akan menampilkan 4 data
        return view('friend', compact('friends'));
    }

    public function testing($ke){
        
        return view('testing', ['ke' => $ke]);
    }
    */

    public function index(){
        $friends = Friends::paginate(1);
        return view('index', compact('friends'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $friends = new Friends;

        $friends->nama = $request->nama;
        $friends->no_tlp = $request->no_tlp;
        $friends->alamat = $request->alamat;

        $friends->save();
    }
}
