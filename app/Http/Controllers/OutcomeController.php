<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Outcome;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('outcome.index', [
            'title' => 'Recorded outcome',
            'outcomes' => Outcome::latest('tanggal_outcome')->get(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('outcome.create', ['title' => 'Creating Outcome', 'incomes' =>Income::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'income_id' => 'required',
        'outcome' => 'required',
        'from' => 'required',
        'nominal' => 'required|numeric',
        'tanggal_outcome' => 'required',
    ], [
        'outcome.required' => 'Tabel harus di isi',
        'outcome.max' => 'outcome tidak boleh lebih dari :max character',
        'from.required' => 'Tabel harus di isi',
        'from.max' => 'From tidak boleh lebih dari :max character',
        'nominal.required' => 'Nominal harus di isi',
        'nominal.numeric' => 'Nominal wajib angka',
        'tanggal_outcome.required' => 'Tanggal harus di isi',
        'income_id.required' => 'Harus Memilih Tabungan',
    ]);    

    Outcome::create([
        'income_id' => $request->income_id,
        'outcome' => $request->outcome,
        'from' => $request->from,
        'nominal' => $request->nominal,
        'tanggal_outcome' => $request->tanggal_outcome,
        'description' => $request->description,
    ]);

    return to_route('outcome.index')
        ->withSuccess('Data outcome berhasil ditambahkan');
}

    /**
     * Display the specified resource.
     */
    public function show(Outcome $outcome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Outcome $outcome)
    {
        return view('outcome.edit', [
        'title' => 'Edit Outcome',
        'outcome' => $outcome,
        'incomes' =>Income::all()
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Outcome $outcome)
    {
        $request->validate([
        'income_id' => 'required',
        'outcome' => 'required',
        'from' => 'required',
        'nominal' => 'required|numeric',
        'tanggal_outcome' => 'required',
    ], [
        'outcome.required' => 'Tabel harus di isi',
        'outcome.max' => 'outcome tidak boleh lebih dari :max character',
        'from.required' => 'Tabel harus di isi',
        'from.max' => 'From tidak boleh lebih dari :max character',
        'nominal.required' => 'Nominal harus di isi',
        'nominal.numeric' => 'Nominal wajib angka',
        'tanggal_outcome.required' => 'Tanggal harus di isi',
        'income_id.required' => 'Harus Memilih Tabungan',
    ]);    

    $outcome->update([
        'income_id' => $request->income_id,
        'outcome' => $request->outcome,
        'from' => $request->from,
        'nominal' => $request->nominal,
        'tanggal_outcome' => $request->tanggal_outcome,
        'description' => $request->description,
    ]);

    return to_route('outcome.index')
        ->withSuccess('Data outcome berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Outcome $outcome)
    {
        //
    }
}
