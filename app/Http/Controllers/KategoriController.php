<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KategoriController extends Controller
{
    public function index()
    {
        return view('pages.kategori.index');
    }

    public function data()
    {
        if (request()->ajax()) {

            $data = Kategori::all();

            return datatables()->of($data)
                ->editColumn('gambar', function ($data) {
                    if (empty($data->gambar)) {
                        return 'belum mengupload gambar';
                    } else {
                        return '<img src="' . asset('gambar_kategori/' . $data->gambar) . '" width="50px" class="img-thumbnail">';
                    }
                })
                ->addColumn('aksi', function ($data) {
                    if ($data->name == 'admin') {
                    } else {
                        $button = "
                        <div class='d-flex justify-content-start'>
                            <div class='label-main'>
                            <a class='edit label label-warning
                            btn-warning' href='javascript:' id='" . $data->id . "' data-toggle='modal' data-target='#exampleModal2'>Edit</a>
                            </div>";
                        $button  .= "<div class='label-main'>
                                <a href='javascript;' class='hapus label label-danger'
                                id='" . $data->id . "'>delete</a>
                           </div>
                                </div>
                     ";
                        return $button;
                    }
                })
                ->rawColumns(['aksi', 'gambar'])
                ->make('true');
        }
    }

    public function store(Request $request)
    {
        $validitor = Validator::make($request->all(), [
            'gambar' => 'file|image|max:2048',
            'nama' => 'required'
        ], [
            'nama.required' => 'tidak boleh kosong',
            'gambar.file' => 'harus berupa file',
            'gambar.image' => 'harus file gambar',
            'gambar.max' => 'maksimal 2 MB'
        ]);

        if ($validitor->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validitor->errors()->toArray()
            ]);
        }


        if (!empty($request->gambar)) {

            $gambar_kategori = $request->file('gambar');
            $path_gambar_kategori = public_path() . '/gambar_kategori';
            if (!File::exists($path_gambar_kategori)) {
                File::makeDirectory($path_gambar_kategori, $mode = 0777, true, true);
            }

            $nama_gambar =  'gambar-kategori' . md5(rand()) . uniqid() .
                time() . date('ymd') . '.' . $gambar_kategori->getClientOriginalExtension();

            $gambar_kategori->move($path_gambar_kategori, $nama_gambar);



            $kategori = new Kategori();
            $kategori->nama = $request->nama;
            $kategori->gambar = $nama_gambar;
            $kategori->slug = Str::slug($request->nama);
            $simpan =  $kategori->save();
            if ($simpan) {
                return response()->json([
                    'status' => 'success',
                    'title' => 'Berhasil',
                    'message' => 'Data ditambah'
                ]);
            }
        } else {
            $kategori = new Kategori();
            $kategori->nama = $request->nama;
            $kategori->slug = Str::slug($request->nama);
            $simpan =  $kategori->save();
            if ($simpan) {
                return response()->json([
                    'status' => 'success',
                    'title' => 'Berhasil',
                    'message' => 'Data ditambah'
                ]);
            }
        }
    }


    public function dataById(Request $request)
    {
        $id = $request->id;

        $kategori = Kategori::find($id);

        return response()->json($kategori);
    }

    public function update(Request $request)
    {
        $validitor = Validator::make($request->all(), [
            'gambar' => 'file|image|max:2048',
            'nama' => 'required'
        ], [
            'nama.required' => 'tidak boleh kosong',
            'gambar.file' => 'harus berupa file',
            'gambar.image' => 'harus file gambar',
            'gambar.max' => 'maksimal 2 MB'
        ]);

        if ($validitor->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validitor->errors()->toArray()
            ]);
        }

        if (!empty($request->gambar)) {

            $gambar_kategori = $request->file('gambar');
            $path_gambar_kategori = public_path() . '/gambar_kategori';
            if (!File::exists($path_gambar_kategori)) {
                File::makeDirectory($path_gambar_kategori, $mode = 0777, true, true);
            }

            $nama_gambar =  'gambar-kategori' . md5(rand()) . uniqid() .
                time() . date('ymd') . '.' . $gambar_kategori->getClientOriginalExtension();

            $gambar_kategori->move($path_gambar_kategori, $nama_gambar);



            $id = $request->id;

            $kategori = Kategori::find($id);
            $kategori->nama = $request->nama;
            $kategori->gambar = $nama_gambar;
            $kategori->slug = Str::slug($request->nama);
            $simpan =  $kategori->save();
            if ($simpan) {
                return response()->json([
                    'status' => 'success',
                    'title' => 'Berhasil',
                    'message' => 'Data ditambah'
                ]);
            }
        } else {
            $id = $request->id;

            $kategori = Kategori::find($id);
            $kategori->nama = $request->nama;
            $kategori->slug = Str::slug($request->nama);
            $simpan =  $kategori->save();
            if ($simpan) {
                return response()->json([
                    'status' => 'success',
                    'title' => 'Berhasil',
                    'message' => 'Data ditambah'
                ]);
            }
        }
    }

    public function destroy(Request $request)
    {
        $kategori = Kategori::find($request->id);

        $hapus = $kategori->delete();

        if ($hapus) {
            return response()->json([
                'status' => 'success',
                'title' => 'Berhasil',
                'message' => 'Data dihapus'
            ]);
        }
    }
}
