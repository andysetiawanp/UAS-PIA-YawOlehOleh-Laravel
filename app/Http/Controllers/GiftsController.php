<?php

namespace App\Http\Controllers;
use App\Models\Gifts;
use Illuminate\Http\Request;

class GiftsController extends Controller
{
    public function welcome()
    {

        return view('gifts.welcome');
    }
    public function index()
    {
        $gifts = Gifts::orderby('id', 'desc')->paginate(5);

        return view('gifts.index', compact('gifts'));
    }

    public function create()
    {

        return view('gifts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:gifts|max:255',
            'image' => 'required',
            'size' => 'required',
            'harga' => 'required',
            'data_id' => 'required'
        ]);
        $gifts = new Gifts;

        $gifts->nama = $request->nama;
        $gifts->image = $request->image;
        $gifts->size = $request->size;
        $gifts->harga = $request->harga;
        $gifts->data_id = $request->data_id;

        $gifts->save();

        return redirect('/gifts');
    }

    public function show($id)
    {
        $gifts = Gifts::where('id', $id)->first();
        return view('gifts.show', ['gifts'=>$gifts]);
    }

    public function edit($id)
    {
        $gifts = Gifts::where('id', $id)->first();
        return view('gifts.edit', ['gifts'=>$gifts]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|unique:gifts|max:255',
            'image' => 'required',
            'size' => 'required',
            'harga' => 'required',
            'data_id' => 'required'
        ]);

        Gifts::find($id)->update([
            'nama' => $request->nama,
            'image' => $request->image,
            'size' => $request->size,
            'harga' => $request->harga,
            'data_id' => $request->data_id
        ]);

        return redirect('/gifts');
    }

    public function destroy($id)
    {
        Gifts::find($id)->delete();
        return redirect('/gifts');
    }

}
