<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use DB;

class FinalsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         $customer_data = DB::table('finals')->get();
    }
    public function headings(): array
    {
        return [
              'username' ,
       'faculty'  ,
       'dept'   ,
       'degree'  ,
       'payment_key'  ,
       'id' 
        ];
    }
}
