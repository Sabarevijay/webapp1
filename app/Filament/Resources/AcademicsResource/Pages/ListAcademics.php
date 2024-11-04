<?php

namespace App\Filament\Resources\AcademicsResource\Pages;

use App\Filament\Resources\AcademicsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ListAcademics extends ListRecords
{
    protected static string $resource = AcademicsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
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
            return parent::getTableQuery()->where('Reg no', Auth::User()->reg_number);
        }
        if (Auth::user()->hasRole('Mentor')) {
            // Mentors see leaves of their allocated students
            return parent::getTableQuery()->whereIn('Reg no', function ($subQuery) {
                $subQuery->select('id')
                    // ->from('students')
                    // ->where('mentor_id', Auth::id());
                    ->from('users')
                    ->where('mentor_name', Auth::user()->name);
            });
        }
    }
}
