<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success_message')) {
                alert()->toast(session('success_message'), 'success');
            }

            return $next($request);
        });
    }
    protected function statCounter($areas, $consumers, $field)
    {
        foreach ($areas as $area) {
            $total[$area->id] = $consumers->where('area_id', $area->id)->count();
            $part[$area->id] = $consumers->where('area_id', $area->id)->where($field, true)->count();
            $progress[$area->id] = ($total[$area->id]) ? (($part[$area->id] / $total[$area->id]) * 100) : 0;
        }
        return [
            'total' => $total,
            'part' => $part,
            'progress' => $progress
        ];
    }
}
