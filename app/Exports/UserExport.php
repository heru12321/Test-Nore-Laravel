<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class UserExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }

    public function headings(): array
    {
        return ["Name", "Bio"];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select('name', 'bio')->get();
    }
}
