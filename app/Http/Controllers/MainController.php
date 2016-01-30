<?php

namespace App\Http\Controllers;

use App\Models\Transporting;

class MainController extends Controller
{
    public function index ()
    {
        $transportings = Transporting::all();

        return view('main/index', ['transportings' => $transportings]);
    }


    public function view ($id)
    {
        $transporting = Transporting::find($id);

        return view('main/view', ['transporting' => $transporting]);
    }
}