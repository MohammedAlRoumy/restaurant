<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;


class CategoriesController extends Controller
{

    public function index(Request $request)
    {
//        //
        $categories = Category::whenSearch(request()->search)->paginate();
        return view('dashboard.categories.index',compact('categories'));
       // $name = $request->get('name');
        /*if ($request->ajax()) {
            $data = Category::where('name', 'LIKE', '%' . $name . '%')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                   // $btn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return view('dashboard.categories.parts.actions')->render();

                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('dashboard.categories.index');*/

    }


    public function create()
    {
        //
        return view('dashboard.categories.create');
    }


    public function store(CategoryRequest $request)
    {
        Category::create($request->all());

        session()->flash('success', 'Data Added successfully');
        return redirect()->route('dashboard.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('dashboard.categories.edit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::findOrFail($id);
        $category->delete();
        session()->flash('success', 'Data Deleted successfully');
        return redirect()->route('dashboard.categories.index');
    }
}
