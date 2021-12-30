<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use App\Http\Requests\bookRequest;
use Illuminate\Support\Facades\File;

class bookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $data = book::where('title', 'LIKE', '%' . $keyword . '%')
            ->orWhere('author', 'LIKE', '%' . $keyword . '%')
            ->orWhere('categories', 'LIKE', '%' . $keyword . '%')
            ->get();

        return view('book.index', compact('data', 'keyword'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new book;
        return view('book.create', compact('model'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(bookRequest $request)
    {
        $model = new book;
        $model->title = $request->title;
        $model->author = $request->author;
        $model->status = $request->status;
        $model->categories = $request->categories;
        $model->stock = $request->stock;
        $model->price = $request->price;
        if ($request->file('cover')) {
            $file = $request->file('cover');
            $nama_file = time() . str_replace(" ", "", $file->getClientOriginalName());
            $file->move('foto', $nama_file);
            $model->cover = $nama_file;
        }
        $model->save();

        return redirect('book')->with('success', "Data berhasil disimpan");
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
        $model = book::find($id);
        return view('book.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(bookRequest $request, $id)
    {
        $model = book::find($id);
        $model->title = $request->title;
        $model->author = $request->author;
        $model->status = $request->status;
        $model->categories = $request->categories;
        $model->stock = $request->stock;
        $model->price = $request->price;
        $model->save();

        return redirect('book')->with('success', "Data berhasil diperbaharui");;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = book::find($id);
        $model->delete();
        return redirect('book');
    }
}