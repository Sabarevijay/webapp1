<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AcademicsResource\Pages;
use App\Models\Academics;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class AcademicsResource extends Resource
{
    protected static ?string $model = Academics::class;

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('subject_name')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\Select::make('semester')
                //     ->label('Year')
                //     ->options([
                //         'I' => 'I',
                //         'II' => 'II',
                //         'III' => 'III',
                //         'IV' => 'IV',
                //         'V' => 'V',
                //         'VI' => 'VI',
                //         'VII' => 'VII',
                //         'VIII' => 'VIII', ]),
                // Forms\Components\TextInput::make('grade')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\Select::make('status')
                //     ->label('Status')
                //     ->options([
                //         'Pass' => 'Pass',
                //         'Arrear' => 'Arrear', ]),
                // Forms\Components\Hidden::make('user_id')
                //     ->default(Auth::id()),
            ]);
    }

    public static function table(Table $table): Table
    {

        $user = Auth::user();
        $isAdmin = $user && $user->hasRole('student'); // Adjust this line based on your role checking method

        $columns = [
            Tables\Columns\TextColumn::make('Course Code')->searchable(),
            Tables\Columns\TextColumn::make('Course Title')->searchable(),
            Tables\Columns\TextColumn::make('Exam Name')->searchable(),
            Tables\Columns\TextColumn::make('Semester')->searchable(),
            Tables\Columns\TextColumn::make('Total Mark')->searchable(),

        ];

        if (! $isAdmin) {
            $columns = array_merge(
                //  [Tables\Columns\TextColumn::make('user_id')->searchable()],
                [Tables\Columns\TextColumn::make('Student name')->searchable()->label('Student Name')],
                [Tables\Columns\TextColumn::make('Reg no')->searchable()->label('Reg no')],
                $columns
            );
        }

        return $table
            ->columns($columns) // Pass the columns array directly
            ->filters([
                //
            ])
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAcademics::route('/'),
            'create' => Pages\CreateAcademics::route('/create'),
            'edit' => Pages\EditAcademics::route('/{record}/edit'),
        ];
    }
}
