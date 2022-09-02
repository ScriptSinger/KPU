<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;
use App\Http\Requests\AreaRequest;
use App\Models\Consumer;
use Illuminate\Support\Facades\URL;


class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $start = microtime(true);
        $areas = Area::orderBy('created_at')->get();
        $consumers = Consumer::orderBy('created_at')->get();
        if (!$areas->isEmpty()) {
            $readingStat = $this->statCounter($areas, $consumers, 'reading');
            $photoStat = $this->statCounter($areas, $consumers, 'photo');
            // dump('Скрипт был выполнен за ' . (microtime(true) - $start) . ' секунд');
            return view('admin.area.index', compact('areas', 'readingStat', 'photoStat'));
        }
        return view('admin.area.index', compact('areas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.area.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AreaRequest $request)
    {
        Area::create($request->all());
        return redirect()->route('areas.index')->withSuccessMessage('Локация добавлена');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $uri = URL::full();
        $request->session()->put('uri', $uri);
        $consumers = Consumer::where('area_id', $id)->paginate(50);
        $area = Area::find($id);
        return view('admin.area.show', compact('consumers', 'area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);
        return view('admin.area.edit', compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AreaRequest $request, $id)
    {
        $area = Area::find($id);
        $area->update($request->all());
        return redirect()->route('areas.index')->withSuccessMessage('Локация отредактирована');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Area::destroy($id);
        return redirect()->route('areas.index')->withSuccessMessage('Локация удалена');
    }
}
