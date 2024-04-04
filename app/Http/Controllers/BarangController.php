<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class BarangController extends Controller
{




    // menampilkan data barang
    public function barang() {
        $data = Barang::get();
        return view('layout.config.user.barang.index', compact('data'));
    }
    // membuat data barang
    public function create() {
        return view('layout.config.user.barang.create');
    }

    public function simpan(Request $request): RedirectResponse {

        $validator = \Validator::make($request->all(), [
            'gudang'            => 'required',
            'ruangan'           => 'required',
            'nama_barang'       => 'required',
            'jenis_barang'      => 'required',
            'kode_barang'       => 'required',
            'register'          => 'required',
            'kondisi_barang'    => 'required',
            'lokasi'            => 'required',
            'harga_barang'      => 'required',
            'image'             => 'required|mimes:jpg,png,jpeg|max:2048',
            'qr'                => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);



        // upload image
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        // dd($request->all());
        $image      = $request->file('image');
        $filename   = date('Y-m-d').$image->getClientOriginalName();
        $imagePath  = 'photo-image/' .$filename;

        $qr         = $request->file('qr');
        $qrname     = date('Y-m-d').$qr->getClientOriginalName();
        $qrPath     = 'photo-qr/' .$qrname;

        Storage::disk('public')->put($imagePath, file_get_contents($image));
        Storage::disk('public')->put($qrPath, file_get_contents($qr));

        // create barang
        $data['gudang']            = $request->gudang;
        $data['ruangan']           = $request->ruangan;
        $data['nama_barang']       = $request-> nama_barang;
        $data['jenis_barang']      = $request-> jenis_barang;
        $data['kode_barang']       = $request-> kode_barang;
        $data['register']          = $request->register;
        $data['kondisi_barang']    = $request-> kondisi_barang;
        $data['lokasi']            = $request-> lokasi;
        $data['harga_barang']      = $request-> harga_barang;
        $data['image']             = $filename;
        $data['qr']                = $qrname;

        Barang::create($data);

        return redirect()->route('barang.index');
    }

    // edit data
    public function edit($id) {
        $data = Barang::findOrFail($id);

        return view('layout.config.user.barang.edit', compact('data'));
    }


    public function update(Request $request, $id) {
        $validator = \Validator::make($request->all(), [
            'gudang'            => 'required',
            'ruangan'           => 'required',
            'nama_barang'       => 'required',
            'jenis_barang'      => 'required',
            'kode_barang'       => 'required',
            'register'          => 'required',
            'kondisi_barang'    => 'required',
            'lokasi'            => 'required',
            'harga_barang'      => 'required',
            'image'             => 'mimes:jpg,png,jpeg|max:2048',
            'qr'                => 'mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data = Barang::findOrFail($id); // Menggunakan findOrFail untuk menemukan data atau menghasilkan 404 jika tidak ditemukan

        // Memperbarui data non-file
        $data->gudang            = $request->gudang;
        $data->ruangan           = $request->ruangan;
        $data->nama_barang       = $request->nama_barang;
        $data->jenis_barang      = $request->jenis_barang;
        $data->kode_barang       = $request->kode_barang;
        $data->register          = $request->register;
        $data->kondisi_barang    = $request->kondisi_barang;
        $data->lokasi            = $request->lokasi;
        $data->harga_barang      = $request->harga_barang;


        // Memproses dan menyimpan file jika diunggah
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = date('Y-m-d') . $image->getClientOriginalName();
            $imagePath = 'photo-image/' . $filename;
            Storage::disk('public')->put($imagePath, file_get_contents($image));
            $data->image = $filename;
        }

        if ($request->hasFile('qr')) {
            $qr = $request->file('qr');
            $qrname = date('Y-m-d') . $qr->getClientOriginalName();
            $qrPath = 'photo-qr/' . $qrname;
            Storage::disk('public')->put($qrPath, file_get_contents($qr));
            $data->qr = $qrname;
        }

        $data->save();
        // Barang::whereId($id)->update($data);

        return redirect()->route('barang.index');
    }


    // delet data
    public function delete(Request $request, $id) {
        $data = Barang::findOrFail($id);

        if($data) {
            $data->delete();
        }
        return redirect()->route('barang.index');
    }

}
