<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $guarded = [];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function storeFile($request)
    {
        $file = $request->file('image');
        $data = [];
        $data['name'] = $file->getClientOriginalName();
        $data['path'] = $file->store('images', 'public');
        $data['mime_type'] = $file->getMimeType();
        $data['size'] = $file->getSize();

        return File::create($data);
    }
}
