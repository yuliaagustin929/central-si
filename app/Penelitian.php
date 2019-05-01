<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    protected $table = 'penelitian';
    protected $guarded = [];

    // Tambahkan Kode yang diperlukan dibawah ini
    public function anggotas()
    {
        return $this->hasMany(PenelitianUser::class);
    }
}
