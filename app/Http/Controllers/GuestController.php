<?php

namespace App\Http\Controllers;

use App\Models\Guests;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Guests::all();
        $title = 'Informasi Tamu';
        return view('guest.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $guest = Guest::get();
        $categories = Categories::all();
        $title = "Input Tamu";
        return view('guest.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            // 'nama_tamu' => $request->nama_tamu,
            // 'check_in' => $request->check_in,
            // 'check_out' => $request->check_out,
            // 'no_kamar' => $request->no_kamar,
            // 'email' => $request->email,
            // 'no_tlp' => $request->no_tlp,
            // 'status_tamu' => $request->status_tamu,
            // 'alamat_tamu' => $request->alamat_tamu,
            // 'kebutuhan_khusus' => $request->kebutuhan_khusus

            'nama_tamu' => ['required'],
            'check_in' => ['required'],
            'check_out' => ['required'],
            'no_kamar' => ['required', Rule::in(['A01', 'A02', 'A03', 'A04'])],
            'email' => ['required', 'email', 'unique:guests'],
            'no_tlp' => ['required', 'string', 'unique:guests'],
            'status_tamu' => ['required'],
            'alamat_tamu' => ['required'],
            'kebutuhan_khusus' => ['nullable']
        ];
        $validator = Validator::make($request->all(), $data);
        if ($validator->fails()) {
            // print_r("aa");
            // die;
            return back()->withErrors(($validator));
        }

        Guests::create($request->all());
        return redirect()->to('guest');
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
        $categories = Categories::get();
        $edit = Guests::find($id);
        $title = 'Ubah Data Tamu';
        return view('guest.edit', compact('categories', 'title', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'nama_tamu' => ['required'],
            'check_in' => ['required', 'date'],
            'check_out' => ['required', 'date'],
            'no_kamar' => ['required', Rule::in(['A01', 'A02', 'A03', 'A04', 'A05'])],
            'email' => ['required', 'email', Rule::unique('guests')->ignore($id)],
            'no_tlp' => ['required', 'string', Rule::unique('guests')->ignore($id)],
            'status_tamu' => ['required'],
            'alamat_tamu' => ['required'],
            'kebutuhan_khusus' => ['nullable'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Ambil data validasi
        $validated = $validator->validated();

        // Simpan ke database
        $guest = Guests::findOrFail($id);
        $guest->update($validated);

        return redirect()->to('guest')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
