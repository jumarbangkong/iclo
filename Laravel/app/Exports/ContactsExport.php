<?php

namespace App\Exports;

use App\Models\ContactSubmission;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ContactsExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ContactSubmission::select('id', 'name', 'email', 'company', 'sector', 'message', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Full Name',
            'Email Address',
            'Company/Institution',
            'Sector',
            'Inquiry Details',
            'Submitted At',
        ];
    }
}
