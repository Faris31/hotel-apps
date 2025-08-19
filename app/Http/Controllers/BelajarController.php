<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BelajarController extends Controller
{

    public function index()
    {
        $users = User::orderBy('id', 'desc')->get();
        return view('belajar', compact('users'));
    }

    public function getCallName()
    {
        return $this->callName(); // call function callName() from this controller
    }

    public function tambah()
    {
        return view('tambah'); // view tambah.blade.php
    }

    public function kurang()
    {
        return view('kurang'); // view tambah.blade.php
    }

    public function kali()
    {
        return view('kali'); // view tambah.blade.php
    }

    public function bagi()
    {
        return view('bagi'); // view tambah.blade.php
    }

    public function storeTambah(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $jumlah = $angka1 + $angka2;
        return view('tambah', compact('jumlah'));
    }

    public function storeKurang(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $jumlah = $angka1 - $angka2;
        return view('kurang', compact('jumlah'));
    }
    public function storeKali(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $jumlah = $angka1 * $angka2;
        return view('kali', compact('jumlah'));
    }
    public function storeBagi(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');
        $jumlah = $angka1 / $angka2;
        return view('bagi', compact('jumlah'));
    }
}
