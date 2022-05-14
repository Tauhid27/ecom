<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $result['data'] = Brand::all();
        return view('admin/brand', $result);
    }


    public function manage_brand(Request $request, $id = '')
    {
        if ($id > 0) {
            $arr = Brand::where(['id' => $id])->get();
            $result['name'] = $arr['0']->name;
            $result['image'] = $arr['0']->image;
            $result['status'] = $arr['0']->status;
            $result['id'] = $arr['0']->id;
        } else {
            $result['name'] = '';
            $result['image'] = '';
            $result['status'] = '';
            $result['id'] = 0;
        }
        // echo '<pre>';
        // print_r($result['data']);
        // die();
        return view('admin/manage_brand', $result);
    }
    public function manage_brand_process(Request $request)
    {
        $request->validate([
            'image' => 'mimes:jpeg,jpg,png',
            'name' => 'required|unique:brands,name,' . $request->post('id'),

        ]);

        if ($request->post('id') > 0) {
            $model =  Brand::find($request->post('id'));
            $msg = "Brand updated";
        } else {
            $model = new Brand();
            $msg = "Brand inserted";
        }
        if ($request->hasfile('image')) {
            if ($request->post('id') > 0) {
                $arrImage = DB::table('brands')->where(['id' => $request->post('id')])->get();
                if (Storage::exists('/public/media/model/' . $arrImage[0]->image)) {
                    Storage::delete('/public/media/model/' . $arrImage[0]->image);
                }
            }
            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('/public/media/model', $image_name);
            $model->image = $image_name;
        }

        $model->name = $request->post('name');
        $model->status = 1;
        $model->save();
        $request->session()->flash('message', $msg);
        return redirect('admin/brand');
    }
    public function  delete(Request $request, $id)
    {
        $model = Brand::find($id);
        $model->delete();
        $request->session()->flash('message', 'Color deleted sucessfully');
        return redirect('admin/brand');
    }
    public function  status(Request $request,$status, $id)
    {
        $model = Brand::find($id);
        $model->status=$status;
        $model->save();
        $request->session()->flash('message', 'Status updated sucessfully');
        return redirect('admin/brand');
    }
}
