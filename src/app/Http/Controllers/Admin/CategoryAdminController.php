<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;

class CategoryAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view (
            'admin.category.list',
            [
                'categories' => Category::all()
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Category::Create( $request->all() );

        return redirect()->route('adminCategory.index');
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
        //
        return view(
            'admin.category.edit',
            [
                'category' => Category::findOrFail($id)
            ]
        );
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
        Category::find($id)->update( $request->all() );
        return redirect()->route('adminCategory.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            if ($request->move_to_category != null){
                // Move product to other category
            }
            else {
                // Delete products
            }

            Category::whereId($id)->delete();
            DB::commit();
            return redirect()->route('adminCategory.index');
        }
        catch( Throwable $e ) {
            DB::rollback();
        }

    }

    public function deleteForm(Request $request, $id) {
        
        return view(
            'admin.category.delete',
            [
                'id' => $id,
                'categories' => Category::where('id', '!=', $id)->get()
            ]
        );
    }
}
