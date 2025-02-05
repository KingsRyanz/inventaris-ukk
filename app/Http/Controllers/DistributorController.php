<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
        $distributors = Distributor::paginate(10); // or any other number for pagination
        return view('admin.distributor.index', compact('distributors'));
    }

    public function create()
    {
        return view('admin.distributor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_distributor' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|max:30',
            'keterangan' => 'nullable|string|max:45',
        ]);

        Distributor::create($request->all());
        return redirect()->route('admin.distributor.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $distributor = Distributor::findOrFail($id);
        return view('admin.distributor.edit', compact('distributor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_distributor' => 'required|string|max:50',
            'alamat' => 'required|string|max:50',
            'no_telp' => 'required|string|max:15',
            'email' => 'required|email|max:30',
            'keterangan' => 'nullable|string|max:45',
        ]);

        $distributor = Distributor::findOrFail($id);
        $distributor->update($request->all());
        return redirect()->route('admin.distributor.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Distributor::destroy($id);
        return redirect()->route('admin.distributor.index')->with('success', 'Data berhasil dihapus!');
    }
}
