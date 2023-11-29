<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Restoran;
use Illuminate\Http\Request;

class restoranController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if(strlen($katakunci)){
            $data = restoran::where('KodeBarang','like',"%$katakunci%")
                    ->orwhere('NamaBarang','like',"%$katakunci%")
                    ->orwhere('Satuan','like',"%$katakunci%")
                    ->orwhere('HargaSatuan','like',"%$katakunci%")
                    ->orwhere('Stok','like',"%$katakunci%")
                    ->paginate($jumlahbaris);
        } else{
            $data = restoran::orderBy('KodeBarang', 'desc')->paginate($jumlahbaris);
        }
        return view('webrestoran.index')->with('data',$data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('webrestoran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('KodeBarang',$request->KodeBarang);
        Session::flash('NamaBarang',$request->NamaBarang);
        Session::flash('Satuan',$request->Satuan);
        Session::flash('HargaSatuan',$request->HargaSatuan);
        Session::flash('Stok',$request->Stok);

        $request->validate([
            'KodeBarang'=>'required|numeric:restoran,KodeBarang',
            'NamaBarang'=>'required',
            'Satuan'=>'required',
            'HargaSatuan'=>'required',
            'Stok'=>'required',
        ],[
            'KodeBarang.required'=>'Kode Barang wajib diisi',
            'KodeBarang.numeric'=>'Kode Barang wajib berupa angka',
            'NamaBarang.required'=>'Nama Barang wajib diisi',
            'Satuan.required'=>'Satuan wajib diisi',
            'HargaSatuan.required'=>'Harga Satuan wajib diisi',
            'Stok.required'=>'Jumlah Stok wajib diisi',
        ]);
        $data = [
            'KodeBarang'=>$request->KodeBarang,
            'NamaBarang'=>$request->NamaBarang,
            'Satuan'=>$request->Satuan,
            'HargaSatuan'=>$request->HargaSatuan,
            'Stok'=>$request->Stok,
        ];
        restoran::create($data);
        return redirect()->to('restoran')->with('success','Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $data = restoran::where('KodeBarang',$id)->first();
       return view('webrestoran.edit')->with('data', $data);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            
            'NamaBarang'=>'required',
            'Satuan'=>'required',
            'HargaSatuan'=>'required',
            'Stok'=>'required',
        ],[
            
            'NamaBarang.required'=>'Nama Barang wajib diisi',
            'Satuan.required'=>'Satuan wajib diisi',
            'HargaSatuan'=>'Harga Satuan wajib diisi',
            'Stok'=>'Jumlah Stok wajib diisi',
        ]);
        $data = [
           
            'NamaBarang' =>$request->NamaBarang,
            'Satuan' =>$request->Satuan,
            'HargaSatuan' =>$request->HargaSatuan,
            'Stok' =>$request->Stok,

        ];
        restoran::where('KodeBarang', $id)->update($data);
        return redirect()->to('restoran')->with('success','Berhasil melakukan update data');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        restoran::where('KodeBarang', $id)->delete();
        return redirect()->to('restoran')->with('success', 'Berhasil menghapus data');
    }
}
