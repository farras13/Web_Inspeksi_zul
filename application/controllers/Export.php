<?php

defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Export extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model', 'm');
    }

    public function index()
    {
    }

    public function apar()
    {
        $semua_pengguna = $this->m->getData('apar')->result();

        $spreadsheet = new Spreadsheet;
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->mergeCells('E1:E2');
        $sheet->setCellValue('A1', 'SL')
            ->setCellValue('A2', 'No')
            ->setCellValue('B1', 'FIRE EXTINGUISHER')
            ->setCellValue('B2', 'No. & JENIS')
            ->setCellValue('C1', 'REFFILING')
            ->setCellValue('C2', 'TANGGAL')
            ->setCellValue('D1', 'BERLAKU')
            ->setCellValue('D2', 'Tanggal')
            ->setCellValue('E1', 'Hose');

        $kolom = 3;
        $nomor = 1;
        foreach ($semua_pengguna as $pengguna) {

            $sheet
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $pengguna->fire_extinguisher)
                ->setCellValue('C' . $kolom, date('j F Y', strtotime($pengguna->tgl_refil)))
                ->setCellValue('D' . $kolom, date('j F Y', strtotime($pengguna->tgl_berlaku)))
                ->setCellValue('E' . $kolom, $pengguna->hose);

            $kolom++;
            $nomor++;
        }

        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];
        $kolom = $kolom - 1;
        $spreadsheet->getActiveSheet()->getStyle('A1:E' . $kolom)->applyFromArray($styleArray);
        // $spreadsheet->getDefaultStyle('A1:D' . $i)->applyFromArray($styleArray);
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="latihanpar.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

/* End of file Export.php */
