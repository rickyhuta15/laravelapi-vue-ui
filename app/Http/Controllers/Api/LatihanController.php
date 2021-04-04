<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Friends;
use Illuminate\Http\Request;


class LatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $friends = Friends::all();

        return response()->json([
            'success'   => true,
            'message'   => 'Daftar data teman',
            'data'      => $friends
        ], 200);
        // 200 adalah http respon success
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:friends|max:255',
            'no_tlp' => 'required|numeric',
            'alamat' => 'required',
        ]);

        $friends = Friends::create([
            'nama'  => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat,
            //'groups_id' => 0
            // groups_id harus diaktifkan jika di dalam phpmyadmin nya tidak di set memiliki bawaan
        ]);

        if($friends){
            return response()->json([
                'success'   => true,
                'message'   => 'Teman Berhasil Ditambahkan',
                'data'      => $friends
            ], 200);
            
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Teman Gagal Ditambahkan',
                'data'      => $friends
            ], 409);
            // 409 adalah http respons untuk failed/error
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $friends = Friends::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Teman',
            'data' => $friends
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'no_tlp' => 'required',
            'alamat' => 'required',
        ]);

        $f = Friends::find($id)->update([
            'nama' => $request->nama,
            'no_tlp' => $request->no_tlp,
            'alamat' => $request->alamat
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Teman Diubah',
            'data' => $f
        ], 200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Friends::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data Dihapus',
            'data' => $cek
        ], 200);
    }
}
