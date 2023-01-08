<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index()
    {
        return view('pages.slider.index');
    }

    public function data()
    {
        if (request()->ajax()) {

            $data = Slider::all();

            return datatables()->of($data)
                ->editColumn('image', function ($data) {
                    return '<img src="' . asset('gambar_slider/' . $data->image) . '" width="100px" class="img-thumbnail">';
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
                ->rawColumns(['aksi', 'image'])
                ->make('true');
        }
    }

    public function store(Request $request)
    {
        $validitor = Validator::make($request->all(), [
            'image' => 'required|file|max:2048'
        ], [
            'image.required' => 'tidak boleh kosong',
            'image.file' => 'harus berupa file',
            'image.max' => 'maksimal 2MB',
        ]);

        if ($validitor->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validitor->errors()->toArray()
            ]);
        }

        $gambar_slider = $request->file('image');
        $path_gambar_slider = public_path() . '/gambar_slider';
        if (!File::exists($path_gambar_slider)) {
            File::makeDirectory($path_gambar_slider, $mode = 0777, true, true);
        }

        $nama_gambar =  'gambar-slider' . md5(rand()) . uniqid() .
            time() . date('ymd') . '.' . $gambar_slider->getClientOriginalExtension();

        $gambar_slider->move($path_gambar_slider, $nama_gambar);

        $slider = new Slider();
        $slider->image = $nama_gambar;
        $simpan =  $slider->save();

        if ($simpan) {
            return response()->json([
                'status' => 'success',
                'title' => 'Berhasil',
                'message' => 'Data ditambah'
            ]);
        }
    }

    public function dataById(Request $request)
    {
        $slider = Slider::find($request->id);

        return response()->json($slider);
    }

    public function update(Request $request)
    {
        $validitor = Validator::make($request->all(), [
            'image' => 'required|file|max:2048'
        ], [
            'image.required' => 'tidak boleh kosong',
            'image.file' => 'harus berupa file',
            'image.max' => 'maksimal 2MB',
        ]);

        if ($validitor->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validitor->errors()->toArray()
            ]);
        }

        $gambar_slider = $request->file('image');
        $path_gambar_slider = public_path() . '/gambar_slider';
        if (!File::exists($path_gambar_slider)) {
            File::makeDirectory($path_gambar_slider, $mode = 0777, true, true);
        }

        $nama_gambar =  'gambar-slider' . md5(rand()) . uniqid() .
            time() . date('ymd') . '.' . $gambar_slider->getClientOriginalExtension();

        $gambar_slider->move($path_gambar_slider, $nama_gambar);

        $slider = Slider::find($request->id);
        $slider->image = $nama_gambar;
        $simpan =  $slider->save();

        if ($simpan) {
            return response()->json([
                'status' => 'success',
                'title' => 'Berhasil',
                'message' => 'Data diubah'
            ]);
        }
    }

    public function destroy(Request $request)
    {
        $slider = Slider::find($request->id);

        $hapus =  $slider->delete();

        if ($hapus) {
            return response()->json([
                'status' => 'success',
                'title' => 'Berhasil',
                'message' => 'Data dihapus'
            ]);
        }
    }
}
