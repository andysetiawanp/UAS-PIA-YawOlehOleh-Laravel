<?php

namespace App\Http\Controllers\Api;

use App\Models\Gifts;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gifts = Gifts::with('data')->WhereHas('data')->get();

        return response()->json([
            'success' => true,
            'message' => 'Oleh-oleh',
            'data' => $gifts
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
            'nama' => 'required|unique:gifts|max:255',
            'gambar' => 'required',
            'size' => 'required',
            'harga' => 'required',
            'data_id' => 'required',
        ]);

        $gifts = Gifts::create([
            'nama' => $request->nama,
            'gambar' => $request->gambar,
            'size' => $request->size,
            'harga' => $request->harga,
            'data_id' => $request->data_id,
        ]);

        if($gifts)
        {
            return response()->json([
                'success' => true,
                'message' => 'Gift Berhasil Ditambahkan',
                'data' => $gifts
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Gift Gagal Ditambahkan',
                'data' => $gifts
            ], 409);
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
          $gifts = Gifts::with('data')->Where('id', $id)->get();

          return response()->json([
            'success' => true,
            'message' => 'Detail Data Gift',
            'data' => $gifts
        ], 200);
    }

    public function edit($id)
    {
          $gifts = Gifts::with('data')->Where('id', $id)->first();

          return response()->json([
            'success' => true,
            'message' => 'Detail Data Gift',
            'data' => $gifts
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
        $gifts = Gifts::find($id)->update([
            'nama' => $request->nama,
            'image' => $request->image,
            'size' => $request->size,
            'harga' => $request->harga,
            'data_id' => $request->data_id,
        ]);
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data' => $gifts
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
        $cek = Gifts::find($id)->delete();
        $gifts = Gifts::find($id)->delete();
        return response()->json([
            'success' => true,
            'message' => 'Post Updated',
            'data'    => $gifts
        ], 200);
    }
} 