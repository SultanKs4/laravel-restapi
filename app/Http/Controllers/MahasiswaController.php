<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MahasiswaController extends Controller
{
    public function index()
    {
        $data = Mahasiswa::all();

        if (count($data) > 0) {
            $res['message'] = "Success!";
            $res['values'] = $data;
        } else {
            $res['message'] = "Kosong!";
        }
        return response($res);
    }

    public function getId($id)
    {
        $data = Mahasiswa::where('id', $id)->get();

        if (count($data) > 0) {
            $res['message'] = "Success!";
            $res['values'] = $data;
        } else {
            $res['message'] = "Gagal!";
        }
        return response($res);
    }

    public function create(Request $request)
    {
        $mhs = new Mahasiswa();
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->email = $request->email;
        $mhs->jurusan = $request->jurusan;

        if ($mhs->save()) {
            $res['message'] = "Data berhasil disimpan";
            $res['value'] = "$mhs";
        } else {
            $res['message'] = "Gagal!";
        }
        return response($res);
    }

    public function update(Request $request, $id)
    {
        $mhs = Mahasiswa::find($id);
        $mhs->nama = $request->nama;
        $mhs->nim = $request->nim;
        $mhs->email = $request->email;
        $mhs->jurusan = $request->jurusan;

        if ($mhs->save()) {
            $res['message'] = "Data berhasil diubah";
            $res['value'] = "$mhs";
        } else {
            $res['message'] = "Gagal!";
        }
        return response($res);
    }

    public function delete($id)
    {
        $mhs = Mahasiswa::where('id', $id);

        if ($mhs->delete()) {
            $res['message'] = "Data berhasil dihapus";
        } else {
            $res['message'] = "Gagal!";
        }
        return response($res);
    }
}