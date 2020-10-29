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
        $friends = Friends::orderBy('id', 'desc')->paginate(2);
        return view('friends.index', compact('friends'));
        //friends.index berarti mengarahkan index yang ada  pada folder Friends
    }

    public function create(){
        return view('friends.create');
    }

    public function store(Request $request){
        // Validasi Request
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required',
        ]);
        
        $friends = new Friends;
        $friends->nama = $request->nama;
        $friends->no_tlp = $request->no_tlp;
        $friends->alamat = $request->alamat;

        $friends->save();

        return redirect('/');
    }

    public function show($id) {
        $friends = Friends::where('id', $id)->first();
        return view('friends.show', ['friend' => $friends]);
    }

    public function edit($id) {
        $friends = Friends::where('id', $id)->first();
        return view('friends.edit', ['friend' => $friends]);
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required',
        ]);

        Friends::find($id)->update([
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
        ]);

        return redirect('/');
    }

    public function destroy($id) {
        Friends::find($id)->delete();
        return redirect('/');
    }
}
