<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Consumer;
use Carbon\Carbon;
use Illuminate\Support\Facades\URL;

class EmployeeConsumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    private function getAreas()
    {
        $areas = auth()->user()->areas;
        $id = [];
        foreach ($areas as $area) {
            $id[] = ($area->id);
        }
        $areas = Area::find($id);
        return $areas;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $areas = $this->getAreas();
        $consumer = Consumer::find($id);
        $area_id = $consumer->area_id;
        $area = Area::find($area_id);
        return view('employee.consumer.show', compact('consumer', 'areas', 'area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $areas = $this->getAreas();
        $consumer = Consumer::find($id);
        $area_id = $consumer->area_id;
        $area = Area::find($area_id);
        return view('employee.consumer.edit', compact('consumer', 'areas', 'area'));
    }

    /**
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
        $data['crawl_date'] = Carbon::now()->format('d.m.Y');
        $consumer->update($data);
        // $request->session()->put('id', $id);
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
        //
    }
}
