<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Actor;

class ActorController extends Controller
{
    public function __construct(Actor $actors, Request $request) {
        $this->actors = $actors;
        $this->request = $request;
    }

    public function index()
    {
        $data = $this->actors->all();
        return response()->json($data, 201);
    }

    public function show($id) {
        $data = $this->actors->with('starryMovies')->find($id);

        if (!$data)
            return response()->json(['error' => 'Data Gagal Ditampilkan.'], 404);
        else
            return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->actors->rules());

        $dataForm = $request->all();

        $data = $this->actors->create($dataForm);

        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        if (!$data = $this->actors->find($id))
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
        $data = $this->actors->with('starryMovies')->find($id);
        $data->delete();

    return "Data Berhasil Di Hapus";
    }
}
