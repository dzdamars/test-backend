<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Director;

class DirectorController extends Controller
{
    public function __construct(Director $directors, Request $request) {
        $this->directors = $directors;
        $this->request = $request;
    }
    
    public function index()
    {
        $data = $this->directors->all();
        return response()->json($data, 201);
    }

    public function show($id) {
        $data = $this->directors->with('movies')->find($id);

        if (!$data) 
            return response()->json(['error' => 'Gagal Memasukkan Data.'], 404);
        else
            return response()->json($data, 201);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->directors->rules());

        $dataForm = $request->all();

        $data = $this->directors->create($dataForm);

        return response()->json($data, 201);
    }

    public function update(Request $request, $id)
    {
        if (!$data = $this->directors->find($id))
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
        $data = $this->directors->with('movies')->find($id);
        $data->delete();

    return "Data Berhasil Di Hapus";
    }
}
