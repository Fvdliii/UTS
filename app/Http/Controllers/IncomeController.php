<?php

namespace App\Http\Controllers;


use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('income.index', [
            'title' => 'Recorded Income',
            'incomes' => Income::latest('tanggal_income')->paginate(5),
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
        'income' => 'required',
        'from' => 'required',
        'nominal' => 'required|numeric',
        'tanggal_income' => 'required',
    ]);

    DB::transaction(function () use ($request) {

        Income::create([
            'income' => $request->income,
            'from' => $request->from,
            'nominal' => $request->nominal,
            'tanggal_income' => $request->tanggal_income,
        ]);

    });

    return to_route('income.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
    $totalOutcome = $income->outcomes->sum('nominal');

    $sisa = $income->nominal - $totalOutcome;

    return view('income.show', [
        'title' => 'Detail Income',
        'income' => $income,
        'outcomes' => $income->outcomes,
        'totalOutcome' => $totalOutcome,
        'sisa' => $sisa,
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        return view('income.edit', [
            'title' => 'Edit Income',
            'income' => $income,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Income $income)
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

        $income->update([
        'income' => $request->income,
        'from' => $request->from,
        'nominal' => $request->nominal,
        'tanggal_income' => $request->tanggal_income,
    ]);

    return to_route('income.index')->withSuccess('Data berhasil Di ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        $income->delete($income);

    return to_route('income.index')->withSuccess('Data berhasil Di hapus');
    }

    public function recycle()
    {
    return view('income.recycle', [
        'title' => 'Recycle Bin',
        'incomes' => Income::onlyTrashed()->latest()->paginate(5)

    ]);
    }
}
