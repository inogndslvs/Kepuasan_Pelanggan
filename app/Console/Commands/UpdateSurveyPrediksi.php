<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Survey;

class UpdateSurveyPrediksi extends Command
{
    protected $signature = 'survey:update-prediksi';
    protected $description = 'Update kolom prediksi_kepuasan untuk data survey lama';

    public function handle()
    {
        $this->info('Mulai update prediksi kepuasan...');

        $surveys = Survey::all();
        $total = $surveys->count();
        $updated = 0;

        foreach ($surveys as $survey) {
            $prediksi = $survey->prediksiKepuasan();
            if ($survey->prediksi_kepuasan !== $prediksi) {
                $survey->prediksi_kepuasan = $prediksi;
                $survey->save();
                $updated++;
            }
        }

        $this->info("Selesai! $updated dari $total data berhasil diperbarui.");
    }
}
