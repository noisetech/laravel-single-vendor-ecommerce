<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Permission;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    public function index()
    {
        return view('pages.permission.index');
    }

    public function data()
    {
        if (request()->ajax()) {

            $data = Permission::all();

            return datatables()->of($data)

                ->addColumn('aksi', function ($data) {
                    $button = "
            <div class='d-flex justify-content-start'>
                <div class='label-main'>
                <a class='edit label label-warning
                btn-warning' href='javascript:' id='" . $data->id . "' data-toggle='modal' data-target='#exampleModal2'>Edit</a>
                </div>";
                    $button  .= "<div class='label-main'>
                    <a href='javascript;' class='hapus label label-danger'
                    id='" . $data->id . "'>Hapus</a>
               </div>
                    </div>
         ";
                    return $button;
                })
                ->rawColumns(['aksi'])
                ->make('true');
        }
    }

    public function store(Request $request)
    {

        $validitor = Validator::make($request->all(), [
            'permission' => 'required'
        ], [
            'permission.required' => 'tidak boleh kosong'
        ]);

        if ($validitor->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validitor->errors()->toArray()
            ]);
        }

        $permission = new Permission();
        $permission->name = $request->permission;
        $permission->guard_name = 'web';
        $simpan =  $permission->save();

        if ($simpan) {
            return response()->json([
                'status' => 'success',
                'title' => 'Berhasil',
                'message' => 'Data  ditambahkan'
            ]);
        }
    }

    public function dataById(Request $request)
    {
        $id = $request->id;

        $permission = Permission::find($id);

        return response()->json($permission);
    }

    public function update(Request $request)
    {

        $validitor = Validator::make($request->all(), [
            'permission' => 'required'
        ], [
            'permission.required' => 'tidak boleh kosong'
        ]);

        if ($validitor->fails()) {
            return response()->json([
                'status' => 'error',
                'error' => $validitor->errors()->toArray()
            ]);
        }

        $permission = Permission::find($request->id);
        $permission->name = $request->permission;
        $permission->guard_name = 'web';
        $simpan =  $permission->save();

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
        $id = $request->id;

        $permission = Permission::find($id);

        $hapus =    $permission->delete();

        if ($hapus) {
            return response()->json([
                'status' => 'success',
                'title' => 'Berhasil',
                'message' => 'Data  dihapus.'
            ]);
        }
    }
}
