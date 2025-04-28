<?php

namespace App\Helpers;

class SatisfactionHelper
{
    public static function predictSatisfaction($survey): string
    {
        $fields = [
            'harga_sepadan_kualitas',
            'kerapihan',
            'kewangian',
            'kecepatan',
            'rekomendasi',
            'pelayanan',
            'membantu',
            'lokasi',
            'kebersihan_lingkungan',
        ];

        $total = 0;
        $count = 0;

        foreach ($fields as $field) {
            if (!is_null($survey->$field)) {
                $total += (int) $survey->$field;
                $count++;
            }
        }

        if ($count === 0) {
            return 'Tidak Puas';
        }

        $average = $total / $count;

        if ($average >= 4) {
            return 'Puas';
        } elseif ($average >= 2.5) {
            return 'Puas';
        } else {
            return 'Tidak Puas';
        }
    }
}
