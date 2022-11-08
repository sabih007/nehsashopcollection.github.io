<?php

namespace App\Exports;

use App\Models\Customer;
use App\Models\user;
use Excel;
use PHPExcel_Style_Border;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\FromView;
use RealRashid\SweetAlert\Facades\Alert;


use DB;

class CustomersExport implements FromCollection , WithHeadingRow ,WithHeadings ,WithStyles , WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Customer::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'Order No',
            'Customer Name',
            'Image',    
            'Customer Address',
            'Order Details',
            'Payment Status',
            'Discount',
            'Payment Method',
            'Delivery Charges	',
            ' Delivery Zone	',
            ' Order Creation Date and time',
        ];
    Alert::success('Deleted.!', 'Customer Deleted  Successfully.!');

      
    }
    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle('A1:M1')->getFont()->setBold(true);
        $sheet->getStyle('A1:M1')->getFont()->setBold(true);
        return [
          

            // Styling a specific cell by coordinate.
            // 'A:M' => ['font' => ['italic' => true]],

            // Styling an entire column.
            'A1:M1'  => ['font' => ['size' => 11]],
        ];
        // $sheet->setAutoSize(true);

    }
    public function registerEvents(): array
    {
        return [
            
            AfterSheet::class    => function(AfterSheet $event) {
                // $event->getSheet()->getDelegate()->getStyle('A1:G1')->applyFromArray(
                //     array(
                //         'borders' => array(
                //             'allborders' => array(
                //                 'style' => \PHPExcel_Style_Border::BORDER_THIN,
                //                 'color' => array('rgb' => '000000')
                //             )
                //         )
                //     )
                // );
                $active_sheet = $event->sheet->getDelegate();

                $default_font_style = [
                    'font' => ['name' => 'poppins', 'size' => 9]
                ];
                $active_sheet->getParent()->getDefaultStyle()->applyFromArray($default_font_style);

                // $event->sheet->getDelegate()->getRowDimension('1')->setRowHeight(40);
                $event->sheet->getDelegate()->getColumnDimension('A')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('B')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('C')->setWidth(40);
                $event->sheet->getDelegate()->getColumnDimension('D')->setWidth(10);
                $event->sheet->getDelegate()->getColumnDimension('E')->setWidth(80);
                $event->sheet->getDelegate()->getColumnDimension('F')->setWidth(80);
                $event->sheet->getDelegate()->getColumnDimension('G')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('H')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('I')->setWidth(40);
                $event->sheet->getDelegate()->getColumnDimension('J')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('K')->setWidth(20);
                $event->sheet->getDelegate()->getColumnDimension('L')->setWidth(40);
                $event->sheet->getDelegate()->getColumnDimension('M')->setWidth(60);
     
            },
        ];
    }
}
