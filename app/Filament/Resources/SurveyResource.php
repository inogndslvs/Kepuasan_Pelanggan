<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SurveyResource\Pages;
use App\Models\Survey;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class SurveyResource extends Resource
{
    protected static ?string $model = Survey::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Data Survey';
    protected static ?string $navigationGroup = 'Survey Pelanggan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')->label('Nama')->required(),
                TextInput::make('whatsapp')->label('Nomor Whatsapp')->required(),

                Select::make('status')->label('Status Pelanggan')->options([
                    'pekerja' => 'Pekerja',
                    'mahasiswa' => 'Mahasiswa',
                ])->required(),

                Select::make('harga_perkilo')->label('1. Penilaian harga perkilo')->options([
                    3 => 'Sangat Murah',
                    2 => 'Murah',
                    1 => 'Mahal',
                    0 => 'Sangat Mahal',
                ])->required(),

                Select::make('harga_sepadan_kualitas')->label('2. Harga sepadan kualitas')->options([
                    3 => 'Sangat Setuju',
                    2 => 'Setuju',
                    1 => 'Tidak Setuju',
                    0 => 'Sangat Tidak Setuju',
                ])->required(),

                Select::make('kerapihan')->label('3. Penilaian kerapihan')->options([
                    3 => 'Sangat Rapi',
                    2 => 'Rapi',
                    1 => 'Tidak Rapi',
                    0 => 'Sangat Tidak Rapi',
                ])->required(),

                Select::make('kewangian')->label('4. Penilaian kewangian')->options([
                    3 => 'Sangat Wangi',
                    2 => 'Wangi',
                    1 => 'Tidak Wangi',
                    0 => 'Sangat Tidak Wangi',
                ])->required(),

                Select::make('kecepatan')->label('5. Penilaian kecepatan layanan')->options([
                    3 => 'Sangat Cepat',
                    2 => 'Cepat',
                    1 => 'Tidak Cepat',
                    0 => 'Sangat Tidak Cepat',
                ])->required(),

                Select::make('rekomendasi')->label('6. Rekomendasi ke orang lain')->options([
                    3 => 'Sangat Merekomendasikan',
                    2 => 'Rekomendasikan',
                    1 => 'Tidak Rekomendasikan',
                    0 => 'Sangat Tidak Rekomendasikan',
                ])->required(),

                Select::make('pelayanan')->label('7. Penilaian kinerja pelayanan')->options([
                    3 => 'Sangat Ramah',
                    2 => 'Ramah',
                    1 => 'Tidak Ramah',
                    0 => 'Sangat Tidak Ramah',
                ])->required(),

                Select::make('membantu')->label('8. Apakah sangat membantu')->options([
                    3 => 'Sangat Membantu',
                    2 => 'Membantu',
                    1 => 'Tidak Membantu',
                    0 => 'Sangat Tidak Membantu',
                ])->required(),

                Select::make('lokasi')->label('9. Penilaian lokasi laundry')->options([
                    3 => 'Sangat Mudah',
                    2 => 'Mudah',
                    1 => 'Sulit',
                    0 => 'Sangat Sulit',
                ])->required(),

                Select::make('kebersihan_lingkungan')->label('10. Penilaian kebersihan lingkungan')->options([
                    3 => 'Sangat Bersih',
                    2 => 'Bersih',
                    1 => 'Kotor',
                    0 => 'Sangat Kotor',
                ])->required(),

                Textarea::make('kritik_saran')->label('Kritik dan Saran')->rows(4)->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->searchable(),
                TextColumn::make('whatsapp'),
                TextColumn::make('status')->label('Status'),
                TextColumn::make('harga_perkilo')->label('Harga'),
                TextColumn::make('pelayanan')->label('Pelayanan'),
                TextColumn::make('kebersihan_lingkungan')->label('Kebersihan'),
                TextColumn::make('prediksi_kepuasan')
                    ->label('Prediksi Kepuasan')
                    ->badge()
                    ->color(fn (string $state): string => $state === 'Puas' ? 'success' : 'danger'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSurveys::route('/'),
            'create' => Pages\CreateSurvey::route('/create'),
            'edit' => Pages\EditSurvey::route('/{record}/edit'),
        ];
    }
}
