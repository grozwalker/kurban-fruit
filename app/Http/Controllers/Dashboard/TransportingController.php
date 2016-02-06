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
use Illuminate\Http\Request;

class TransportingController extends Controller
{
    /**
     * Список всех транспортировок
     *
     * @return mixed
     */
    public function index()
    {
        $transportings = Transporting::all();

        return view('dashboard.transporting.index', ['transportings' => $transportings]);
    }

    /**
     * Просмотр и форма редактирования транспортировки
     *
     * @param $id
     * @return mixed
     */
    public function view($id)
    {

        $transporting = Transporting::find($id);

        return view('dashboard.transporting.view', ['transporting' => $transporting]);
    }

    /**
     * Форма добавления транспортировки
     */
    public function create()
    {
        $transporting = new Transporting();

        return view('dashboard.transporting.view', ['transporting' => $transporting]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'destination' => 'required',
        ]);

        /** @var Transporting $transporting */
        $transporting = Transporting::find($id);

//        $transporting->fill($request->all());
//        $transporting->save();

        $transporting->update($request->all());

        return redirect(route('dashboard.transporting.index'));
    }

    /**
     * Действие сохранения новой транспортировки
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'destination' => 'required',
        ]);


        $transporting = new Transporting();

        $transporting->name = $request->get('name');
        $transporting->destination = $request->get('destination');

        $transporting->save();

        return redirect(route('dashboard.transporting.index'));
    }

    public function destroy($id)
    {
        /** @var Transporting $transporting */
        $transporting = Transporting::find($id);

        $transporting->delete();

        return redirect(route('dashboard.transporting.index'));
    }
}