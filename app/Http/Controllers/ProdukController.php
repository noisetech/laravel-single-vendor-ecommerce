<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ProdukController extends Controller
{
    public function index()
    {
        return view('pages.produk.index');
    }

    public function data()
    {
        if (request()->ajax()) {

            $data = Produk::with('kategori')->get();

            // dd($data);

            return datatables()->of($data)
                ->addColumn('kategori', function ($data) {
                    return $data->kategori->nama;
                })
                ->editColumn('gambar', function ($data) {
                    if (empty($data->gambar)) {
                        return 'belum mengupload gambar';
                    } else {
                        return '<img src="' . asset('gambar_produk/' . $data->gambar) . '" width="50px" class="img-thumbnail">';
                    }
                })
                ->addColumn('aksi', function ($data) {
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
                })
                ->rawColumns(['aksi', 'gambar', 'kategori'])
                ->make('true');
        }
    }

    public function store(Request $request)
    {
        $validitor = Validator::make($request->all(), [
            'gambar' => 'file|image|max:2048',
            'nama' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required',
            'berat' => 'required',
            'harga' => 'required',
            'ketersediaan' => 'required',
            'potongan_harga' => 'required',
        ], [
            'nama.required' => 'tidak boleh kosong',
            'gambar.file' => 'harus berupa file',
            'gambar.image' => 'harus file gambar',
            'gambar.max' => 'maksimal 2 MB',
            'kategori_id.required' => 'tidak bileh kosong',
            'deskripsi.required' => 'tidak bileh kosong',
            'berat.required' => 'tidak bileh kosong',
            'harga.required' => 'tidak bileh kosong',
            'ketersediaan.required' => 'tidak bileh kosong',
            'potongan_harga.required' => 'tidak bileh kosong',
        ]);

        if ($validitor->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validitor->errors()->toArray()
            ]);
        }



        if (!empty($request->gambar)) {

            $gambar_produk = $request->file('gambar');
            $path_gambar_produk = public_path() . '/gambar_produk';
            if (!File::exists($path_gambar_produk)) {
                File::makeDirectory($path_gambar_produk, $mode = 0777, true, true);
            }

            $nama_gambar =  'gambar-produk' . md5(rand()) . uniqid() .
                time() . date('ymd') . '.' . $gambar_produk->getClientOriginalExtension();

            $gambar_produk->move($path_gambar_produk, $nama_gambar);

            $produk = new Produk();
            $produk->nama = $request->nama;
            $produk->slug = Str::slug($request->nama);
            $produk->gambar = $nama_gambar;
            $produk->kategori_id =  $request->kategori_id;
            $produk->deskripsi =  $request->deskripsi;
            $produk->berat =  $request->berat;
            $produk->harga =  $request->harga;
            $produk->ketersediaan =  $request->ketersediaan;
            $produk->potongan_harga =  $request->potongan_harga;
            $simpan =  $produk->save();
            if ($simpan) {
                return response()->json([
                    'status' => 'success',
                    'title' => 'Berhasil',
                    'message' => 'Data ditambah'
                ]);
            }
        } else {


            $produk = new Produk();
            $produk->nama = $request->nama;
            $produk->slug = Str::slug($request->nama);
            $produk->kategori_id =  $request->kategori_id;
            $produk->deskripsi =  $request->deskripsi;
            $produk->berat =  $request->berat;
            $produk->harga =  $request->harga;
            $produk->ketersediaan =  $request->ketersediaan;
            $produk->potongan_harga =  $request->potongan_harga;
            $simpan =  $produk->save();
            if ($simpan) {
                return response()->json([
                    'status' => 'success',
                    'title' => 'Berhasil',
                    'message' => 'Data ditambah'
                ]);
            }
        }
    }

    public function list_kategori(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = Kategori::select("id", "nama")
                ->Where('nama', 'LIKE', "%$search%")
                ->get();
        }
        return response()->json($data);
    }

    public function dataById(Request $request)
    {
        $id = $request->id;

        $produk = Produk::find($id);

        return response()->json($produk);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        $produk = Produk::find($id);

        $produk->delete();

        return response()->json([
            'status' => 'success',
            'title' => 'Berhasil',
            'message' => 'Data dihapus'
        ]);
    }

    public function kategoriByProduk(Request $request)
    {
        $kategori = Kategori::where('id', $request->id)->get();

        return response()->json($kategori);
    }

    public function update(Request $request)
    {
        $validitor = Validator::make($request->all(), [
            'gambar' => 'file|image|max:2048',
            'nama' => 'required',
            'kategori_id' => 'required',
            'deskripsi' => 'required',
            'berat' => 'required',
            'harga' => 'required',
            'ketersediaan' => 'required',
            'potongan_harga' => 'required',
        ], [
            'nama.required' => 'tidak boleh kosong',
            'gambar.file' => 'harus berupa file',
            'gambar.image' => 'harus file gambar',
            'gambar.max' => 'maksimal 2 MB',
            'kategori_id.required' => 'tidak bileh kosong',
            'deskripsi.required' => 'tidak bileh kosong',
            'berat.required' => 'tidak bileh kosong',
            'harga.required' => 'tidak bileh kosong',
            'ketersediaan.required' => 'tidak bileh kosong',
            'potongan_harga.required' => 'tidak bileh kosong',
        ]);

        if ($validitor->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validitor->errors()->toArray()
            ]);
        }

        if (!empty($request->gambar)) {

            $gambar_produk = $request->file('gambar');
            $path_gambar_produk = public_path() . '/gambar_produk';
            if (!File::exists($path_gambar_produk)) {
                File::makeDirectory($path_gambar_produk, $mode = 0777, true, true);
            }

            $nama_gambar =  'gambar-produk' . md5(rand()) . uniqid() .
                time() . date('ymd') . '.' . $gambar_produk->getClientOriginalExtension();

            $gambar_produk->move($path_gambar_produk, $nama_gambar);

            $produk = Produk::find($request->id);
            $produk->nama = $request->nama;
            $produk->slug = Str::slug($request->nama);
            $produk->gambar = $nama_gambar;
            $produk->kategori_id =  $request->kategori_id;
            $produk->deskripsi =  $request->deskripsi;
            $produk->berat =  $request->berat;
            $produk->harga =  $request->harga;
            $produk->ketersediaan =  $request->ketersediaan;
            $produk->potongan_harga =  $request->potongan_harga;
            $simpan =  $produk->save();
            if ($simpan) {
                return response()->json([
                    'status' => 'success',
                    'title' => 'Berhasil',
                    'message' => 'Data diubah'
                ]);
            }
        } else {
            $produk = Produk::find($request->id);
            $produk->nama = $request->nama;
            $produk->slug = Str::slug($request->nama);
            $produk->kategori_id =  $request->kategori_id;
            $produk->deskripsi =  $request->deskripsi;
            $produk->berat =  $request->berat;
            $produk->harga =  $request->harga;
            $produk->ketersediaan =  $request->ketersediaan;
            $produk->potongan_harga =  $request->potongan_harga;
            $simpan =  $produk->save();
            if ($simpan) {
                return response()->json([
                    'status' => 'success',
                    'title' => 'Berhasil',
                    'message' => 'Data diubah'
                ]);
            }
        }
    }
}
