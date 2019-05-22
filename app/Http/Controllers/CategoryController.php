<?php

namespace Soccer\Http\Controllers;

use Illuminate\Http\Request;

use Soccer\Categories as Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $saved = FALSE;
        try{

            $category         = new Category();
            $category->name   = $request->name;
            $category->save();
            $saved = TRUE;
        }catch(Exception $e) {
            $saved = FALSE;
        }


        return ($saved)? response("Category has been saved successfully!!!", 200)
                            ->header("Content-Type", "application/json")
                        :
                        response("Category can't be saved!!!", 400)
                            ->header("Content-Type", "application/json")
                        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Category::where('id', $id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $saved = FALSE;

        try{

            Category::where('id', $id)
                ->update(['name' => $request->name]);

            $saved = TRUE;
        }
        catch (Exception $e)
        {
            $saved = FALSE;
        }

        return ($saved)?
            response("Category has been updated!!!", 200)
            ->header("Content-Type", "application/json")
            :
            response("Category can't be updated!!!", 400)
            ->header("Content-Type", "application/json")
            ;
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
    }
}
