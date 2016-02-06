<?php

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Good;
use App\Models\Transporting;

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

        return view('dashboard.good.index', ['transporting' => $transporting]);
    }

    public function view($transportingId)
    {
        $transporting = Transporting::find($transportingId);

        return view('dashboard.good.view', ['transporting' => $transporting]);
    }
}