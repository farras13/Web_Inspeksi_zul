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
        $datauser = $this->session->userdata('datauser');
		if ($datauser['level'] != 1) {
			redirect('Home', 'refresh');
		}
    }

    public function index()
    {
    }

    public function harian()
    {
        $t = $this->input->get('tgle');
        $o = $this->input->get('orde');
        $bln = date('F', strtotime($t));
        if ($o == 0) {
            $sts = "Proses";
        } elseif ($o == 1) {
            $sts = "Valid";
        } else {
            $sts = "Denied";
        }

        $spreadsheet = new Spreadsheet;
        $spreadsheet->getProperties()->setCreator('Inspektor Ispat Indonesia')
            ->setLastModifiedBy('Inspektor');
        $sheet = $spreadsheet->getActiveSheet();

        if ($t != null && $o == null) {
            $sheet->setTitle($bln);
            $semua_pengguna = $this->m->Filter('tgl_inspeksi', $t, 'harian')->result();
        } elseif ($o != null && $t != null) {
            $semua_pengguna = $this->m->FilterS($o, 'harian')->result();
            $sheet->setTitle("Laporan" . $sts);
        } else {
            $semua_pengguna = $this->m->getData('harian')->result();
            $sheet->setTitle("Pembukuan");
        }

        $sheet->mergeCells('A1:B3');
        $sheet->mergeCells('C1:C3');
        $sheet->mergeCells("A7:A8");
        $sheet->mergeCells("B7:B8");
        $sheet->mergeCells("C7:C8");
        $sheet->getColumnDimension("B")->setAutoSize("20");
        $sheet->getColumnDimension("B")->setWidth("20");
        $sheet->getColumnDimension("C")->setWidth('60');
        $spreadsheet->getActiveSheet()->getRowDimension("6")->setRowHeight('5');

        $sheet->setCellValue('C1', 'LAPORAN HARIAN')
            ->setCellValue('A7', 'No')
            ->setCellValue('B7', 'TANGGAL INSPEKSI')
            ->setCellValue('C7', 'LAPORAN');

        $kolom = 9;
        $nomor = 1;
        foreach ($semua_pengguna as $pengguna) {

            $sheet
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, date('j F Y', strtotime($pengguna->tgl_inspeksi)))
                ->setCellValue('C' . $kolom, $pengguna->masalah);

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
            'font' => [
                'bold' => true,
            ]
        ];
        $styleArray1 = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment1' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ]
        ];
        $kolom = $kolom - 1;
        $spreadsheet->getActiveSheet()->getStyle('A1:C3')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A7:C8')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A9:C' . $kolom)->applyFromArray($styleArray1);
        // $spreadsheet->getDefaultStyle('A1:D' . $i)->applyFromArray($styleArray);
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="harian.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function shk()
    {
        $t = $this->input->get('tgle');
        $o = $this->input->get('orde');
        $bln = date('F', strtotime($t));
        if ($o == 0) {
            $sts = "Proses";
        } elseif ($o == 1) {
            $sts = "Valid";
        } else {
            $sts = "Denied";
        }

        $spreadsheet = new Spreadsheet;
        $spreadsheet->getProperties()->setCreator('Inspektor Ispat Indonesia')
            ->setLastModifiedBy('Inspektor');
        $sheet = $spreadsheet->getActiveSheet();

        if ($t != null && $o == null) {
            $sheet->setTitle($bln);
            $semua_pengguna = $this->m->Filter('tanggal_shk', $t, 'shk')->result();
        } elseif ($o != null && $t != null) {
            $semua_pengguna = $this->m->FilterS($o, 'shk')->result();
            $sheet->setTitle("Laporan" . $sts);
        } else {
            $semua_pengguna = $this->m->getData('shk')->result();
            $sheet->setTitle("Pembukuan");
        }

        $sheet->mergeCells('A1:B3');
        $sheet->mergeCells('C1:E3');
        $sheet->mergeCells('D7:E7');
        for ($i = 'A'; $i < 'D'; $i++) {
            $sheet->mergeCells($i . "7:" . $i . "8");
        }
        $sheet->getColumnDimension("A")->setAutoSize("8");
        $sheet->getColumnDimension("B")->setWidth("20");
        $sheet->getColumnDimension("C")->setWidth("20");
        $sheet->getColumnDimension("D")->setWidth('60');
        $sheet->getColumnDimension("E")->setWidth('60');
        $spreadsheet->getActiveSheet()->getRowDimension("6")->setRowHeight('5');

        $sheet->setCellValue('C1', 'HASIL TEMUAN SAFETY HOUSE KEEPING PATROL')
            ->setCellValue('A7', 'No')
            ->setCellValue('B7', 'LOKASI')
            ->setCellValue('C7', 'TANGGAL INSPEKSI')
            ->setCellValue('D7', 'HASIL TEMUAN')
            ->setCellValue('D8', 'PROBLEM')
            ->setCellValue('E8', 'ACTION');

        $kolom = 9;
        $nomor = 1;
        foreach ($semua_pengguna as $pengguna) {

            $sheet
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $pengguna->lokasi)
                ->setCellValue('C' . $kolom, date('j F Y', strtotime($pengguna->tanggal_shk)))
                ->setCellValue('D' . $kolom, $pengguna->problem)
                ->setCellValue('E' . $kolom, $pengguna->action);

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
            'font' => [
                'bold' => true,
            ]
        ];
        $styleArray1 = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ]
        ];
        $styleArray2 = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_JUSTIFY,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ]
        ];
        $kolom = $kolom - 1;
        $spreadsheet->getActiveSheet()->getStyle('A1:E3')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A7:E8')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A9:C' . $kolom)->applyFromArray($styleArray1);
        $spreadsheet->getActiveSheet()->getStyle('D9:E' . $kolom)->applyFromArray($styleArray2);
        // $spreadsheet->getDefaultStyle('A1:D' . $i)->applyFromArray($styleArray);
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="shk.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function apar()
    {
        $t = $this->input->get('tgle');
        $o = $this->input->get('orde');

        $spreadsheet = new Spreadsheet;
        $spreadsheet->getProperties()->setCreator('Inspektor Ispat Indonesia')
            ->setLastModifiedBy('Inspektor');
        $sheet = $spreadsheet->getActiveSheet();

        $bln = date('F', strtotime($t));
        if ($o == 0) {
            $sts = "Proses";
        } elseif ($o == 1) {
            $sts = "Valid";
        } else {
            $sts = "Denied";
        }

        if ($t != null && $o == null) {
            $sheet->setTitle($bln);
            $semua_pengguna = $this->m->Filter('tanggal_apar', $t, 'apar')->result();
        } elseif ($o != null && $t != null) {
            $semua_pengguna = $this->m->FilterS($o, 'apar')->result();
            $sheet->setTitle("Laporan" . $sts);
        } else {
            $semua_pengguna = $this->m->getData('apar')->result();
            $sheet->setTitle("Pembukuan");
        }


        $sheet->getColumnDimension("A")->setWidth("5");
        $sheet->getColumnDimension("B")->setWidth("20");
        $sheet->getColumnDimension("C")->setWidth("18");
        $sheet->getColumnDimension("D")->setWidth('15');
        $sheet->getColumnDimension("E")->setWidth('15');
        $sheet->getColumnDimension("F")->setWidth('15');
        $sheet->getColumnDimension("G")->setWidth('15');
        $sheet->getColumnDimension("H")->setWidth('15');
        $sheet->getColumnDimension("I")->setWidth('20');
        $sheet->getColumnDimension("J")->setWidth('30');
        // $sheet->getRowDimension("1")->setRowHeight('20');
        $sheet->mergeCells('A1:B3');
        $sheet->mergeCells('C1:J3');
        for ($i = 'A'; $i < 'K'; $i++) {
            $sheet->getStyle($i . '5')->getAlignment()->setWrapText(true);
            $sheet->mergeCells($i . '5:' . $i . '6');
        }

        $sheet->setCellValue('C1', 'CHECKLIST ALAT PEMADAM API RINGAN (APAR)')
            ->setCellValue('A5', 'SL NO.')
            ->setCellValue('B5', 'FIRE EXTINGUISHER No. & JENIS')
            ->setCellValue('C5', 'REFFILING TANGGAL')
            ->setCellValue('D5', 'BERLAKU TANGGAL')
            ->setCellValue('E5', 'KONDISI TABUNG')
            ->setCellValue('F5', 'HOSE')
            ->setCellValue('G5', 'PEN PENGAMAN')
            ->setCellValue('H5', 'SEGEL PENGAMAN')
            ->setCellValue('I5', 'PRESSURE')
            ->setCellValue('J5', 'PETUGAS / TGL ');

        $kolom = 7;
        $nomor = 1;
        foreach ($semua_pengguna as $pengguna) {

            $sheet
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $pengguna->fire_extinguisher)
                ->setCellValue('C' . $kolom, date('j F Y', strtotime($pengguna->tgl_refil)))
                ->setCellValue('D' . $kolom, date('j F Y', strtotime($pengguna->tgl_berlaku)))
                ->setCellValue('E' . $kolom, $pengguna->kondisi_tabung)
                ->setCellValue('F' . $kolom, $pengguna->hose)
                ->setCellValue('G' . $kolom, $pengguna->pen_pengaman)
                ->setCellValue('H' . $kolom, $pengguna->segel_pengaman)
                ->setCellValue('I' . $kolom, $pengguna->pressure)
                ->setCellValue('J' . $kolom, $pengguna->petugas . ' / ' . $pengguna->tanggal_apar);

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
        $styleArray1 = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'font' => [
                'bold' => true,
                'size' => 16
            ],
        ];
        $kolom = $kolom - 1;
        $spreadsheet->getActiveSheet()->getStyle('A1:J3')->applyFromArray($styleArray1);
        $spreadsheet->getActiveSheet()->getStyle('A5:J' . $kolom)->applyFromArray($styleArray);
        // $spreadsheet->getDefaultStyle('A1:D' . $i)->applyFromArray($styleArray);
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="apar.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function hydrant()
    {
        $t = $this->input->get('tgle');
        $o = $this->input->get('orde');

        $spreadsheet = new Spreadsheet;
        $spreadsheet->getProperties()->setCreator('Inspektor Ispat Indonesia')
            ->setLastModifiedBy('Inspektor');
        $sheet = $spreadsheet->getActiveSheet();

        $bln = date('F', strtotime($t));
        if ($o == 0) {
            $sts = "Proses";
        } elseif ($o == 1) {
            $sts = "Valid";
        } else {
            $sts = "Denied";
        }

        if ($t != null && $o == null) {
            $sheet->setTitle($bln);
            $semua_pengguna = $this->m->Filter('tanggal_hydrant', $t, 'hydrant')->result();
        } elseif ($o != null && $t != null) {
            $sheet->setTitle("Laporan" . $sts);
            $semua_pengguna = $this->m->FilterS($o, 'hydrant')->result();
        } else {
            $sheet->setTitle("Pembukuan");
            $semua_pengguna = $this->m->getData('hydrant')->result();
        }


        $sheet->getColumnDimension("A")->setWidth("5");
        $sheet->getColumnDimension("B")->setWidth("20");
        $sheet->getColumnDimension("C")->setWidth("35");
        $sheet->getColumnDimension("D")->setWidth('10');
        $sheet->getColumnDimension("E")->setWidth('10');
        $sheet->getColumnDimension("F")->setWidth('10');
        $sheet->getColumnDimension("G")->setWidth('10');
        $sheet->getColumnDimension("H")->setWidth('10');
        $sheet->getColumnDimension("I")->setWidth('10');
        $sheet->getColumnDimension("J")->setWidth('15');
        $sheet->getColumnDimension("K")->setWidth('18');
        $sheet->getColumnDimension("L")->setWidth('30');
        $sheet->getRowDimension("6")->setRowHeight('5');
        $sheet->mergeCells('A1:B3');
        $sheet->mergeCells('C1:L3');
        for ($i = 'A'; $i < 'M'; $i++) {
            $sheet->getStyle($i . '7')->getAlignment()->setWrapText(true);
            $sheet->mergeCells($i . '7:' . $i . '8');
        }

        $sheet->setCellValue('C1', 'CONTROL PERALATAN HYDRANT')
            ->setCellValue('A7', 'SL NO.')
            ->setCellValue('B7', 'HYDRANT')
            ->setCellValue('C7', 'LOKASI')
            ->setCellValue('D7', 'PIPE HYDRANT')
            ->setCellValue('E7', 'VALVE HYDRANT')
            ->setCellValue('F7', 'MACHINO')
            ->setCellValue('G7', 'HOSE HYDRANT')
            ->setCellValue('H7', 'BOX HYDRANT')
            ->setCellValue('I7', 'NOZZLE')
            ->setCellValue('J7', 'PRESSURE')
            ->setCellValue('K7', 'TANGAL')
            ->setCellValue('L7', 'PETUGAS');

        $kolom = 9;
        $nomor = 1;
        foreach ($semua_pengguna as $pengguna) {

            $sheet
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $pengguna->hydrant)
                ->setCellValue('C' . $kolom, $pengguna->lokasi)
                ->setCellValue('D' . $kolom, $pengguna->pipe_hydrant)
                ->setCellValue('E' . $kolom, $pengguna->valve_hydrant)
                ->setCellValue('F' . $kolom, $pengguna->machino)
                ->setCellValue('G' . $kolom, $pengguna->hose_hydrant)
                ->setCellValue('H' . $kolom, $pengguna->box_hydrant)
                ->setCellValue('I' . $kolom, $pengguna->nozzle)
                ->setCellValue('J' . $kolom, $pengguna->pressure_hydrant)
                ->setCellValue('K' . $kolom, date('j F Y', strtotime($pengguna->tanggal_hydrant)))
                ->setCellValue('L' . $kolom, $pengguna->petugas);

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
        $styleArray1 = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'font' => [
                'bold' => true,
                'size' => 16
            ],
        ];
        $kolom = $kolom - 1;
        $spreadsheet->getActiveSheet()->getStyle('A1:L3')->applyFromArray($styleArray1);
        $spreadsheet->getActiveSheet()->getStyle('A7:L' . $kolom)->applyFromArray($styleArray);
        // $spreadsheet->getDefaultStyle('A1:D' . $i)->applyFromArray($styleArray);
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="hydrant.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
    public function fire()
    {
        $t = $this->input->get('tgle');
        $o = $this->input->get('orde');

        $spreadsheet = new Spreadsheet;
        $spreadsheet->getProperties()->setCreator('Inspektor Ispat Indonesia')
            ->setLastModifiedBy('Inspektor');
        $sheet = $spreadsheet->getActiveSheet();

        $bln = date('F', strtotime($t));
        if ($o == 0) {
            $sts = "Proses";
        } elseif ($o == 1) {
            $sts = "Valid";
        } else {
            $sts = "Denied";
        }

        if ($t != null && $o == null) {
            $sheet->setTitle($bln);
            $semua_pengguna = $this->m->Filter('tanggal_inspeksi', $t, 'fire_alarm')->result();
        } elseif ($o != null && $t != null) {
            $sheet->setTitle("Laporan" . $sts);
            $semua_pengguna = $this->m->FilterS($o, 'fire_alarm')->result();
        } else {
            $sheet->setTitle("Pembukuan");
            $semua_pengguna = $this->m->getData('fire_alarm')->result();
        }
        
        $sheet->getColumnDimension("A")->setWidth("5");
        $sheet->getColumnDimension("B")->setWidth("30");
        $sheet->getColumnDimension("C")->setWidth("15");
        $sheet->getColumnDimension("D")->setWidth('8');
        $sheet->getColumnDimension("E")->setWidth('8');
        $sheet->getColumnDimension("F")->setWidth('8');
        $sheet->getColumnDimension("G")->setWidth('15');
        $sheet->getColumnDimension("H")->setWidth('15');
        $sheet->getColumnDimension("I")->setWidth('30');
        $sheet->getColumnDimension("J")->setWidth('15');
        $sheet->getRowDimension("6")->setRowHeight('5');
        $sheet->mergeCells('A1:B3');
        $sheet->mergeCells('A7:A8');
        $sheet->mergeCells('C1:J3');
        for ($i = 'C'; $i < 'K'; $i++) {
            $sheet->getStyle($i . '7')->getAlignment()->setWrapText(true);
            $sheet->mergeCells($i . '7:' . $i . '8');
        }

        $sheet->setCellValue('C1', 'CONTROL FIRE ALARM')
            ->setCellValue('A7', 'NO.')
            ->setCellValue('B7', 'PERALATAN YANG DI CHECK')
            ->setCellValue('B8', 'LOKASI')
            ->setCellValue('C7', 'JUMLAH INSTALASI(bh)')
            ->setCellValue('D7', 'Smoke')
            ->setCellValue('E7', 'Heat')
            ->setCellValue('F7', 'Equip')
            ->setCellValue('G7', 'TANGGAL INSPEKSI')
            ->setCellValue('H7', 'KONIDISI PERALATAN')
            ->setCellValue('I5', 'BULAN : ')
            ->setCellValue('I7', 'KETERANGAN')
            ->setCellValue('J7', 'PETUGAS');
        $kolom = 9;
        $nomor = 1;
        foreach ($semua_pengguna as $pengguna) {

            $sheet
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $pengguna->peralatan . ' / ' . $pengguna->lokasi)
                ->setCellValue('C' . $kolom, $pengguna->jumlah_instalasi)
                ->setCellValue('D' . $kolom, $pengguna->smoke)
                ->setCellValue('E' . $kolom, $pengguna->heat)
                ->setCellValue('F' . $kolom, $pengguna->equip)
                ->setCellValue('G' . $kolom, date('j F Y', strtotime($pengguna->tanggal_inspeksi)))
                ->setCellValue('H' . $kolom, $pengguna->kondisi_peralatan)
                ->setCellValue('I' . $kolom, $pengguna->keterangan)
                ->setCellValue('J' . $kolom, $pengguna->petugas);

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
        $styleArray1 = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'font' => [
                'bold' => true,
                'size' => 16
            ],
        ];
        $kolom = $kolom - 1;
        $spreadsheet->getActiveSheet()->getStyle('A1:J3')->applyFromArray($styleArray1);
        $spreadsheet->getActiveSheet()->getStyle('A7:J' . $kolom)->applyFromArray($styleArray);
        // $spreadsheet->getDefaultStyle('A1:D' . $i)->applyFromArray($styleArray);
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="fire.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function p3k()
    {
        $t = $this->input->get('tgle');
        $o = $this->input->get('orde');

        $spreadsheet = new Spreadsheet;
        $spreadsheet->getProperties()->setCreator('Inspektor Ispat Indonesia')
            ->setLastModifiedBy('Inspektor');
        $sheet = $spreadsheet->getActiveSheet();
        
        $bln = date('F', strtotime($t));
        if ($o == 0) {
            $sts = "Proses";
        } elseif ($o == 1) {
            $sts = "Valid";
        } else {
            $sts = "Denied";
        }

        if ($t != null && $o == null) {
            $sheet->setTitle($bln);
            $pk = $this->m->Filter('inspect_date', $t, 'p3k')->result();
        } elseif ($o != null && $t != null) {
            $sheet->setTitle("Laporan" . $sts);
            $pk = $this->m->FilterS($o, 'p3k')->result();
        } else {
            $sheet->setTitle("Pembukuan");
            $pk = $this->m->getData('p3k')->result();
        }

        $stok = $this->m->getPk()->result();
        
        $sheet->setTitle("Pembukuan");
        $sheet->mergeCells('A1:D3');
        $sheet->mergeCells('E1:AT3');
        $sheet->mergeCells('AT7:AT9');
        $sheet->mergeCells("A7:A9");
        $sheet->mergeCells("B7:B9");
        $sheet->mergeCells("AS7:AS9");
        $sheet->mergeCells("C7:AR7");
        $a = 'C';
        $i = 'D';
        do {
            $sheet->mergeCells($a . "8:" . $i . "8");
            $sheet->getColumnDimension($a)->setWidth("5");
            $sheet->getColumnDimension($i)->setWidth("5");
            $a++;
            $i++;
            $a++;
            $i++;
        } while ($i >= 'AR');
        $b = 'AA';
        $c = 'AB';
        do {
            $sheet->mergeCells($b . "8:" . $c . "8");
            $sheet->getColumnDimension($b)->setWidth("5");
            $sheet->getColumnDimension($c)->setWidth("5");
            $b++;
            $c++;
            $b++;
            $c++;
        } while ($c <= 'AR');
        $sheet->getColumnDimension("A")->setWidth("8");
        $sheet->getColumnDimension("B")->setWidth("20");
        $sheet->getColumnDimension("AS")->setAutoSize("5");
        $spreadsheet->getActiveSheet()->getRowDimension("6")->setRowHeight('5');
        $spreadsheet->getActiveSheet()->getRowDimension("8")->setRowHeight('30');
        $sheet->getStyle('AT7')->getAlignment()->setWrapText(true);


        $sheet->setCellValue('E1', 'CONTROL KOTAK P3K')
            ->setCellValue('A5', 'BULAN :')
            ->setCellValue('A7', 'No')
            ->setCellValue('B7', 'DEPARTEMEN')
            ->setCellValue('C7', 'JENIS OBAT - OBATAN P3K')
            ->setCellValue('AS7', 'TANGGAL PENGISIAN')
            ->setCellValue('AT7', 'PENGAWAS');
        $z = 'C';
        $y = 'D';
        $x = 'C';
        $w = 10;
        $v = 1;
        foreach ($pk as $key) {
            foreach ($stok as $s) {
                if ($v < 22) {
                    $sheet->setCellValue($x . '9', 'Stok');
                    $sheet->setCellValue($y . '9', 'Add');
                    $sheet->setCellValue($z . '8', $s->list_p3k);
                    $sheet->getStyle($z . '8')->getAlignment()->setWrapText(true);
                    $z++;
                    $z++;
                }
                if ($s->id_p3k == $key->id_p3k) {
                    $sheet->setCellValue($x . $w, $s->stok);
                    $sheet->setCellValue($y . $w, $s->add);
                    if ($v % 21 == 0) {
                        $w++;
                        $y = 'B';
                        $x = 'A';
                    }
                    $x++;
                    $x++;
                    $y++;
                    $y++;
                    $v++;
                }
            }
        }

        $kolom = 10;
        $nomor = 1;
        foreach ($pk as $p) {
            $sheet
                ->setCellValue('A' . $kolom, $nomor)
                ->setCellValue('B' . $kolom, $p->lokasi)
                ->setCellValue('AS' . $kolom, date('j F Y', strtotime($p->inspect_date)))
                ->setCellValue('AT' . $kolom, $p->checked_by);
            $kolom++;
            $nomor++;
        }
        $kolom = $kolom - 1;
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
            'font' => [
                'bold' => true,
            ]
        ];
        $styleArray1 = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment1' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ]
        ];
        $spreadsheet->getActiveSheet()->getStyle('A1:AT3')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A7:AT9')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->getStyle('A10:AT' . $kolom)->applyFromArray($styleArray1);
        // $spreadsheet->getDefaultStyle('A1:D' . $i)->applyFromArray($styleArray);
        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="p3k.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}

/* End of file Export.php */
