<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request as HttpRequest;

use Illuminate\Support\Facades\Storage;

class Consumer extends Model
{
    use SoftDeletes;

    protected $table = 'consumers';
    protected $fillable =
    [
        'personal_account',
        'full_name',
        'district',
        'street',
        'house',
        'building',
        'apartment',
        'model',
        'number',
        'verif_date',
        'seal',
        'year_release',
        'day_zone',
        'crawl_date',
        'reading',
        'note',
        'photo',
        'file',
        'area_id'
    ];

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public static function uploadImage(HttpRequest $request, $path = null)
    {

        if ($request->hasFile('photo')) {
            if ($path) {
                Storage::delete($path);
            }
            $folder = date('Y-m-d');
            return $request->file('photo')->store("img/$folder");
        }
        return $path;
    }

    public function getImage()
    {
        if (!$this->photo) {
            return asset('assets/image/no-image.jpg');
        }
        return asset("assets/$this->photo");
    }
}
