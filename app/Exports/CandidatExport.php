<?php

namespace App\Exports;

use App\Models\Candidat;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


class CandidatExport implements FromCollection, WithHeadings, WithMapping, WithEvents, ShouldAutoSize
{
    public $mention_id;
    public $vagues_id;
    public function __construct($mention_id, $vagues_id)
    {
        $this->mention_id = $mention_id;
        $this->vagues_id = $vagues_id;
    }
    public function collection()
    {
        return Candidat::select('num_conc', 'nom')
            ->where('mention_id', $this->mention_id)
            ->where('vagues_id', $this->vagues_id)
            ->whereNotNull('num_conc')->get();
    }

    public function headings(): array
    {
        return [
            'Numéro Concours',
            'Nom et prénoms',
            'Observation',
        ];
    }

    public function map($candidat): array
    {
        return [
            $candidat->num_conc,
            $candidat->nom,
            '',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $sheet = $event->sheet;
                $highestRow = $sheet->getHighestRow();

                $validation = $sheet->getCell('C2')->getDataValidation();
                $validation->setType(DataValidation::TYPE_LIST);
                $validation->setErrorStyle(DataValidation::STYLE_STOP);
                $validation->setAllowBlank(false);
                $validation->setShowDropDown(true);
                $validation->setErrorTitle('Input error');
                $validation->setError('Value is not in list.');
                $validation->setFormula1('"Admis,Recalé"');

                // Clone the validation to all cells in the status column
                for ($row = 2; $row <= $highestRow; $row++) {
                    $sheet->getCell("C{$row}")->setDataValidation(clone $validation);
                }

                $sheet->getStyle('A1:C1')->applyFromArray([
                    'font' => ['bold' => true, 'size' => 12],
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_CENTER,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $sheet->getStyle('A1:C' . $highestRow)->applyFromArray([
                    'alignment' => [
                        'horizontal' => Alignment::HORIZONTAL_LEFT,
                        'vertical' => Alignment::VERTICAL_CENTER,
                    ],
                ]);
                $sheet->getRowDimension(1)->setRowHeight(25);

                for ($i = 2; $i < $highestRow + 1; $i++) {
                    $sheet->getRowDimension($i)->setRowHeight(22);
                }
            },
        ];
    }
}
