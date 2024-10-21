<?php

namespace App\Exports;

use App\Models\Candidat;
use App\Models\Concours;
use App\Models\Mention;
use App\Models\Vague;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class CandidatPresence implements FromCollection, WithHeadings, WithMapping, WithEvents, WithColumnWidths
{
    private $mentionId;
    private $vagueId;
    private $mentionName;
    private $concoursDate;
    private $count = 1;

    public function __construct($mentionId, $vagueId)
    {
        $this->mentionId = $mentionId;
        $this->vagueId = $vagueId;
        $this->mentionName = Mention::findOrFail($mentionId)->design;
        $this->concoursDate = Vague::findOrFail($vagueId)->deb_conc;
    }

    public function collection()
    {
        return Candidat::with('mention')
            ->where('mention_id', $this->mentionId)
            ->where('vagues_id', $this->vagueId)
            ->whereNotNull('num_conc')
            ->orderBy('num_conc', 'asc')
            ->get();
    }

    public function headings(): array
    {
        return ['N°', 'MATRICULE', 'NOM ET PRENOM', 'TELEPHONE', 'NOTE'];
    }

    public function map($candidat): array
    {
        return [$this->count++, $candidat->num_conc, $candidat->nom, $candidat->tel, ''];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $this->formatSheet($event->sheet);
            },
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 5,
            'B' => 25,
            'C' => 45,
            'D' => 16,
            'E' => 12,
        ];
    }

    private function formatSheet($sheet)
    {
        $this->insertHeaderRows($sheet);
        $this->setHeaderContent($sheet);
        $this->formatHeaderStyles($sheet);
        $this->formatDataRows($sheet);
        $this->setPageLayout($sheet);
        $this->addFooterContent($sheet);
    }

    private function insertHeaderRows($sheet)
    {
        for ($i = 0; $i < 11; $i++) {
            $sheet->insertNewRowBefore(1, 1);
        }
    }

    private function setHeaderContent($sheet)
    {
        $sheet->setCellValue('A1', "UNIVERSITE ACEEM")->mergeCells('A1:B1');
        $sheet->setCellValue('A2', "Manakambahiny ")->mergeCells('A2:B2');
        $sheet->setCellValue('A4', "Mention: " . $this->mentionName)->mergeCells('A4:B4');
        $sheet->setCellValue('A5', "Année Universitaire : " . date('Y') . " - " . (date('Y') + 1))->mergeCells('A5:B5');
        $sheet->setCellValue('D5', "Niveau : LICENCE 1")->mergeCells('D5:E5');
        $sheet->setCellValue('A7', "CONCOURS D'ENTREE EN LICENCE 1")->mergeCells('A7:E7');

        $formattedDate = $this->getFormattedDate();
        $sheet->setCellValue('A8', $formattedDate)->mergeCells('A8:E8');

        $sheet->setCellValue('A10', "Matière: ....................................................................................................")->mergeCells('A10:E10');
    }

    private function formatHeaderStyles($sheet)
    {
        $sheet->getStyle('D5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A7:E8')->applyFromArray([
            'font' => ['bold' => true, 'size' => 12],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);
    }

    private function formatDataRows($sheet)
    {
        $highestRow = 12 + $this->count - 1;

        $sheet->getStyle('A12:E12')->applyFromArray([
            'font' => ['bold' => true, 'size' => 11],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->getStyle('A12:B' . $highestRow)->applyFromArray([
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        $sheet->getStyle('C13:C' . $highestRow)->applyFromArray([
            'font' => ['size' => 10],
            'alignment' => ['vertical' => Alignment::VERTICAL_CENTER],
        ]);

        for ($i = 12; $i <= $highestRow; $i++) {
            $sheet->getRowDimension($i)->setRowHeight(25);
        }

        $sheet->getStyle('A12:E' . $highestRow)->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
    }

    private function setPageLayout($sheet)
    {
        $sheet->getPageSetup()->setPaperSize(PageSetup::PAPERSIZE_A4);
        $sheet->getPageSetup()->setOrientation(PageSetup::ORIENTATION_PORTRAIT);
        $sheet->getPageSetup()->setFitToWidth(1);
        $sheet->getPageSetup()->setFitToHeight(0);

        $sheet->getPageMargins()->setTop(0.5);
        $sheet->getPageMargins()->setRight(0.5);
        $sheet->getPageMargins()->setLeft(0.5);
        $sheet->getPageMargins()->setBottom(0.5);
    }

    private function addFooterContent($sheet)
    {
        $highestRow = 12 + $this->count - 1;

        $sheet->setCellValue('D' . ($highestRow + 1), "Date:");
        $sheet->setCellValue('A' . ($highestRow + 3), "Nb de présent : ")->mergeCells('A' . ($highestRow + 3) . ':B' . ($highestRow + 3));
        $sheet->setCellValue('C' . ($highestRow + 3), "Nb des absents : ");
        $sheet->getStyle('C' . ($highestRow + 3))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('D' . ($highestRow + 3), "Nb de copies remise : ");
        $sheet->setCellValue('A' . ($highestRow + 5), "Surveillant ")->mergeCells('A' . ($highestRow + 5) . ':B' . ($highestRow + 5));
        $sheet->getStyle('A' . ($highestRow + 5))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $sheet->setCellValue('C' . ($highestRow + 5), "Enseignant responsable ")->mergeCells('C' . ($highestRow + 5) . ':D' . ($highestRow + 5));
        $sheet->getStyle('C' . ($highestRow + 5))->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
    }

    private function getFormattedDate()
    {
        Carbon::setLocale('fr');
        $date = Carbon::parse($this->concoursDate);
        return ucfirst($date->translatedFormat('l')) . ' ' . $date->day . ' ' . ucfirst($date->translatedFormat('F')) . ' ' . $date->year;
    }
}
