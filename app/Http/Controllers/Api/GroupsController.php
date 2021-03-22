<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Groups;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Groups::orderBy('id', 'desc')->paginate(2);

        return response()->json([
            'success'   => true,
            'message'   => 'Daftar Data Groups',
            'data'      => $groups
        ], 200);
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
        'name' => 'required|unique:friends|max:255',
        'description' => 'required',
    ]);

    $groups = Groups::create([
        'name'  => $request->nama,
        'description' => $request->no_tlp,

    ]);

    if($groups){
        return response()->json([
            'success'   => true,
            'message'   => 'Group Berhasil Ditambahkan',
            'data'      => $groups
        ], 200);
        
    } else {
        return response()->json([
            'success'   => false,
            'message'   => 'Group Gagal Ditambahkan',
            'data'      => $groups
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
        $groups = Groups::where('id', $id)->first();

        return response()->json([
            'success' => true,
            'message' => 'Detail Data Groups',
            'data' => $groups
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
            'name' => 'required',
            'description' => 'required',
        ]);

        $g = Friends::find($id)->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json([
            'success' => true,
            'message' => "Data Diubah",
            'data' => $g
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
}
