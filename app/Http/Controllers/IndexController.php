<?php

namespace App\Http\Controllers;

use App\Murid;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $kelas_count = \App\Kelas::with('murid')->get();
        $json = [];
        foreach ($kelas_count as $item) {
            $json[] = array(
                'nama_kelas' => $item->nama_kelas,
                'jumlah' => $item->murid()->count()
            );
        }
        $jumlah_murid = Murid::count('id');
        return view('welcome', compact('jumlah_murid', 'json'));
    }
}