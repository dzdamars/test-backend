<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function __construct(Categories $categories, Request $request) {
        $this->categories = $categories;
        $this->request = $request;
    }

    public function index()
    {
        $data = $this->categories->all();
        return response()->json($data, 200);
    }

    public function show($id) {
        $data = $this->categories->with('starryMovies')->find($id);

        if (!$data)
            return response()->json(['error' => 'Data Tidak Ditemukan.'], 404);
        else
            return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->categories->rules());

        $dataForm = $request->all();

        $data = $this->categories->create($dataForm);

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        if (!$data = $this->categories->find($id))
            return response()->json(['error', 'Data Tidak Ditemukan.'], 404);
        else {
            $dataForm = $request->all();
            
            $data->update($dataForm);
            
            return response()->json([
                'success' => 'Data berhasil diubah.',
                'data' => $data], 200);
        }
    }

    public function destroy($id)
     {
        $data = $this->categories->with('starryMovies')->find($id);
        $data->delete();

    return "Data Berhasil Di Hapus";
    }
}
