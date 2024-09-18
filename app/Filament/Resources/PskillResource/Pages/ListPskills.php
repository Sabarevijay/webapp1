<?php

namespace App\Filament\Resources\PskillResource\Pages;

use App\Filament\Resources\PskillResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ListPskills extends ListRecords
{
    protected static string $resource = PskillResource::class;

    public function getTitle(): string
    {
        return 'My Students'; // This will set the title of the list page
    }

    // public function get(): string
    // {
    //     return 'My Students'; // This will set the title of the list page
    // }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Add My students'),
        ];
    }

    public function getTableQuery(): ?Builder
    {
        // $query = parent::getTableQuery();
        if (Auth::user()->hasRole('super_admin')) {
            // Admins see all records
            return parent::getTableQuery();
        }
        if (Auth::user()->hasRole('student')) {
            return parent::getTableQuery()->where('user_id', Auth::id());
        }
        if (Auth::user()->hasRole('Mentor')) {
            return parent::getTableQuery(); //->where('user_id', Auth::id());
        }
    }
}
