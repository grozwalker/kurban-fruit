<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Good;
use App\Models\Transporting;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Input;

class GoodController extends Controller
{
    public function index ($transportingId)
    {
//        $goods = Good::where('transporting_id', '=', $transportingId)->get();

        $transporting = Transporting::find($transportingId);
        $goods = $transporting->goods;

        return view('dashboard.good.index', ['transporting' => $transporting, 'goods' => $goods]);
    }

    public function create($transportingId)
    {
        $transporting = Transporting::find($transportingId);
        $good = new Good();

        return view('dashboard.good.view', ['transporting' => $transporting, 'good' => $good]);
    }

    /**
     * @param $transportingId
     * @return mixed
     * @internal param $goodId
     */
    public function view($transportingId, $goodID)
    {
        $transporting = Transporting::find($transportingId);
        $good =  Good::find($goodID);

        return view('dashboard.good.view', ['transporting' => $transporting, 'good' => $good]);
    }

    /**
     * @param Request $request
     * @param $transportingId
     * @param $goodID
     * @return mixed
     */
    public function update(Request $request, $transportingId, $goodID)
    {

        $this->validate($request, [
            'name' => 'required',
            'weight' => 'required',
        ]);

        $good =  Good::find($goodID);
        $good->update($request->all());

// read image from temporary file
        //$img = Image::make($_FILES['image']['tmp_name']);

// resize image
       //$img->fit(300, 200);

// save image
        //File::exists(storage_path('foo')) or File::makeDirectory(storage_path('foo'));
        //$img->save('/foo/bar.jpg');


        //$image = Input::file('image');
        $image = $request->file('image');
        $filename  = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('img/products/' . $filename);
        Image::make($image->getRealPath())->resize(468, 249)->save($path);
        File::exists(storage_path('img/products/')) or File::makeDirectory(storage_path('img/products/'));
        $product->image = 'img/products/'.$filename;
        $product->save();

        return view('dashboard.good.index', ['transporting' => $transporting, 'goods' => $goods]);
    }

    public function store(Request $request, $transportingId)
    {
        $this->validate($request, [
            'name' => 'required',
            'weight' => 'required',
        ]);

        $good = New Good();

        $good->name = $request->get('name');
        $good->weight = $request->get('weight');
        $good->transporting_id = $transportingId;

        $good->save();

        $transporting = Transporting::find($transportingId);
        $goods = $transporting->goods;

        return redirect(route('dashboard.good.index', ['transporting' => $transporting, 'goods' => $goods]));

    }

    public function destroy($transportingId, $goodId)
    {

        $good = Good::find($goodId);

        $good->delete();


        $transporting = Transporting::find($transportingId);
        $goods = $transporting->goods;

        return redirect(route('dashboard.good.index', ['transporting' => $transporting, 'goods' => $goods]));

    }
}