<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consumer;
use App\Models\Area;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ConsumersExport;
use App\Imports\ConsumersImport;
use Illuminate\Support\Facades\URL;

class ConsumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $uri = URL::full();
        $request->session()->put('uri', $uri);
        $consumers = Consumer::paginate(50);
        return view('admin.consumer.index', compact('consumers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::pluck('name', 'id')->all();
        return view('admin.consumer.create', compact('areas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consumer = Consumer::find($id);
        $area = Area::find($consumer->area_id);
        return view('admin.consumer.edit', compact('consumer', 'area'));
    }

    /**`
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $uri = session('uri');
        $request->validate([
            'crawl_date' => 'nullable',
            'year_release' => 'nullable',
            'reading' => 'nullable',
            'note' => 'nullable',
            'photo' => 'nullable|image'
        ]);
        $consumer = Consumer::find($id);
        $data = $request->all();
        $data['photo'] = Consumer::uploadImage($request, $consumer->photo);
        $consumer->update($data);
        return redirect($uri . "#$id")->withSuccessMessage('Данные успешно сохранены');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $uri = session('uri');
        Consumer::destroy($id);
        return redirect($uri . "#$id")->withSuccessMessage("Данные о потребителе $id мягко удалены");;
    }

    public function export(Request $request)
    {
        $id = $request->area_id;
        $name = $request->name;
        return Excel::download(new ConsumersExport($id), $name . '.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);
        $id = $request->area_id;
        $path = $request->file('file')->store('import');
        ini_set('memory_limit', '-1');
        Excel::import(new ConsumersImport($id), $path);
        return redirect()->route('areas.show', ['area' => $id])->withSuccessMessage('Файл импортирован');
    }
}
