<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = [
        'nama',
        'whatsapp',
        'status',
        'harga_perkilo',
        'harga_sepadan_kualitas',
        'kerapihan',
        'kewangian',
        'kecepatan',
        'rekomendasi',
        'pelayanan',
        'membantu',
        'lokasi',
        'kebersihan_lingkungan',
        'kritik_saran',
        'prediksi_kepuasan',
    ];
    

    protected static function booted()
    {
        static::creating(function ($survey) {
            $survey->prediksi_kepuasan = \App\Helpers\SatisfactionHelper::predictSatisfaction($survey);
        });
    }

    public function prediksiKepuasan()
    {
        return \App\Helpers\SatisfactionHelper::predictSatisfaction($this);
    }
}
