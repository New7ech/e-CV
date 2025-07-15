<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CvView extends Model
{
    use HasFactory;

    protected $fillable = [
        'cv_id',
        'ip_address',
        'user_agent',
    ];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
