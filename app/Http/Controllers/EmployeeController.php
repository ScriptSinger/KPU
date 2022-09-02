<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Area;
use App\Models\Consumer;
use Illuminate\Support\Facades\URL;


class EmployeeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = $request->user();
        if ($user->hasRole('super-user')) {
            return redirect()->route('index');
        }
        $areas = $this->getAreas();
        $consumers = Consumer::cursor();
        if (!$areas->isEmpty()) {
            $stat = $this->statCounter($areas, $consumers, 'reading');
            return view('employee.home', compact('areas', 'stat'));
        }

        return view('employee.home', compact('areas'));
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
    public function show(Request $request, $id)
    {
        $uri = URL::full();
        $area = Area::find($id);
        $request->session()->put('uri', $uri);
        $areas = $this->getAreas();
        $consumers = Consumer::where('area_id', $id)->paginate(50);
        return view('employee.consumer.index', compact('consumers', 'areas', 'area'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // 
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
        //
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
