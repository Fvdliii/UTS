<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('income.index', [
            'title' => 'Recorded Income',
            'incomes' => Income::all(),
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('income.create', ['title' => 'Creating Income']);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $validated = $request->validate([
        'income' => 'required|max:255',
        'from' => 'required|max:255',
        'nominal' => 'required|numeric',
        'tanggal_income' => 'required|date',
    ], [
        'income.required' => 'Tabel harus di isi',
        'income.max' => 'Income tidak boleh lebih dari :max character',
        'from.required' => 'Tabel harus di isi',
        'from.max' => 'From tidak boleh lebih dari :max character',
        'nominal.required' => 'Nominal harus di isi',
        'nominal.numeric' => 'Nominal wajib angka',
        'tanggal_income.required' => 'Tanggal harus di isi',

    ]);

        Income::create([
        'income' => $request->income,
        'from' => $request->from,
        'nominal' => $request->nominal,
        'tanggal_income' => $request->tanggal_income,
    ]);
        return to_route('income.index')->withSuccess('Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        //
    }
}
