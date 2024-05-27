<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'title', 'body'];
    public static function list()
    {
        return self::all();
    }
    public static function store($request, $id = null)
    {
        $data = $request->only('title', 'body');
        $data = self::updateOrCreate(['id' => $id], $data);
        return $data;
    }
    public static function show($id)
    {
        return self::find($id);
    }
    public static function destroy($id)
    {
        return self::find($id)->delete();
    }
}
