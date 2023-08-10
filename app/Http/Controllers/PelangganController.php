<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    
    public function index(Request $request)
    {
        
        $q = $request->get('q');
        $data['result'] = Pelanggan::where(function($query) use ($q) {
            $query->where('nama_lengkap', 'like', '%' . $q . '%');
            $query->orWhere('jenis_kelamin', 'like', '%' . $q . '%');
            $query->orWhere('nomor', 'like', '%' . $q . '%');
            $query->orWhere('alamat', 'like', '%' . $q . '%');
            $query->orWhere('email', 'like', '%' . $q . '%');
        })->paginate();

        $data['q'] = $q;
        return view('pelanggan.list2', $data);
    }

    public function buat(){
        return view ('pelanggan.form2');
    }

    public function store(Request $request, Pelanggan $pelanggan = null){
        $rules = [
            'nama_lengkap' => 'required',
            'jenis_kelamin' => 'required',
            'nomor' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ];

        if ($request->hasFile('foto_pelanggan'))
        {
            $rules['foto_pelanggan'] = 'required|mimes:jpg|max:1024';
        }
        $this->validate($request, $rules);

        $input = $request->all();

        if ($request->hasFile('foto_pelanggan')) {
            $fileName = $request->foto_pelanggan->getClientOriginalName();
            $request->foto_pelanggan->storeAs('pelanggan', $fileName);
            $input['foto_pelanggan'] = $fileName;
        } 
        
        Pelanggan::updateOrCreate(['id' => @$pelanggan->id], $input);
        return redirect('/pelanggan')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit(pelanggan $pelanggan)
    {
        return view('pelanggan.form2', compact('pelanggan'));
    }

    public function destroy(pelanggan $pelanggan)
    {
        $pelanggan->delete();
        return redirect('/pelanggan')->with('success', 'Data berhasil dihapus');
    }

}
