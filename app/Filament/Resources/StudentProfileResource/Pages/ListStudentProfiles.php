<?php

namespace App\Filament\Resources\StudentProfileResource\Pages;

use App\Filament\Resources\StudentProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ListStudentProfiles extends ListRecords
{
    protected static string $resource = StudentProfileResource::class;

    // protected static ?string $navigationLabel = 'My Students';
    public function getTitle(): string
    {
        return 'P Skill'; // This will set the title of the list page
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Add P Skill'),
        ];
    }

    public function getTableQuery(): ?Builder
    {
        if (Auth::user()->hasRole('super_admin')) {
            return parent::getTableQuery();
        }
        if (Auth::user()->hasRole('student')) {
            return parent::getTableQuery()->where('user_id', Auth::id());
        }
        if (Auth::user()->hasRole('Mentor')) {
            return parent::getTableQuery()->whereIn('user_id', function ($subQuery) {
                $subQuery->select('id')
                    ->from('users')
                    ->where('mentor_name', Auth::user()->name);
            });
        }
    }
}
