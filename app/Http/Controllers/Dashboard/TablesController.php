<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableRequest;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TablesController extends Controller
{

    public function index()
    {
        $tables = Table::paginate();
        return view('dashboard.tables.index', compact('tables'));
    }


    public function create()
    {
        //
        return view('dashboard.tables.create');

    }

    public function store(TableRequest $request)
    {
        // dd($request->all());
        Table::create($request->all());

        session()->flash('success', 'Data Added successfully');
        return redirect()->route('dashboard.tables.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
        $table = Table::findOrFail($id);
       // dd($table);
        return view('dashboard.tables.edit', compact('table'));
    }


    public function update(Request $request, $id)
    {
        $table = Table::findOrFail($id);
        $request->validate([
            'tableNumber' => ['required', 'numeric', 'min:1', Rule::unique('tables', 'tableNumber')->ignore($table->id)],
            'chairs' => 'required|numeric|min:1',
            'status' => 'required',
        ]);
        $table->update($request->all());

        session()->flash('success', 'Data Added successfully');
        return redirect()->route('dashboard.tables.index');
    }


    public function destroy($id)
    {
        //
        $table = Table::findOrFail($id);
        $table->delete();
        session()->flash('success', 'Data Deleted successfully');
        return redirect()->route('dashboard.tables.index');
    }
}
