<?php

namespace App\Http\Controllers;

use App\Models\Merk;
use Illuminate\Http\Request;

class MerkController extends Controller
{
   public function index(Request $request)
{
    $search = $request->get('search');
    $merk = Merk::where('merk', 'like', '%' . $search . '%')->paginate(10); // Paginate results
    return view('admin.merk.index', compact('merk'));
}

    public function create()
    {
        return view('admin.merk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'merk' => 'required|string|max:50',
            'keterangan' => 'nullable|string|max:50',
        ]);

        Merk::create($request->all());
        return redirect()->route('admin.merk.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $merk = Merk::findOrFail($id);
        return view('admin.merk.edit', compact('merk'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'merk' => 'required|string|max:50',
            'keterangan' => 'nullable|string|max:50',
        ]);

        $merk = Merk::findOrFail($id);
        $merk->update($request->all());
        return redirect()->route('admin.merk.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id)
    {
        Merk::destroy($id);
        return redirect()->route('admin.merk.index')->with('success', 'Data berhasil dihapus!');
    }
}