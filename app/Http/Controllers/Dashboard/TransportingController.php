<?php
/**
 * Created by PhpStorm.
 * User: xu
 * Date: 04.02.16
 * Time: 20:56
 */

namespace App\Http\Controllers\Dashboard;


use App\Http\Controllers\Controller;
use App\Models\Transporting;

class TransportingController extends Controller
{
    public function index()
    {
        $transportings = Transporting::all();

        return view('dashboard.transporting.index', ['transportings' => $transportings]);
    }

    public function view($id)
    {

        $transporting = Transporting::find($id);

        return view('dashboard.transporting.view', ['transporting' => $transporting]);
    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}