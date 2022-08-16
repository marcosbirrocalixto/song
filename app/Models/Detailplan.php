<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Detailplan extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $table = 'detailplans';

    protected $fillable = ['plan_id', 'name'];

    public function plan()
    {
        return $this->belongsTo(Plan::class); //Retorna apenas um plano
    }
}
