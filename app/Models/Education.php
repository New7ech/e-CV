<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $fillable = [
        'cv_id',
        'diplome',
        'etablissement',
        'dates',
    ];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
