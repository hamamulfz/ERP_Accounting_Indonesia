<?php

class attendanceSummaryByDept extends fpdf {

    //Page footer
    function Footer() {
        //Position at 1.5 cm from bottom
        $this->SetY(-15);
        //Arial italic 8
        $this->SetFont('Arial', 'I', 6);
        //Page number
        $this->Cell(0, 10, 'Printed Date: ' . Yii::app()->dateFormatter->format("dd-MM-yyyy", time()) . '                        ' .
                'Page: ' . $this->PageNo() . '/{nb}' . '                        ' .
                'Issued By: APHRIS - Agung Podomoro Land, Tbk', 0, 0, 'C');
    }

    function myheader($rows, $w) {
        $this->y0 = $this->GetY();
        $this->Cell(0, 5, '', 'T', 0, 'C');
        $this->Image('shareimages/company/logoAlt1.jpg', 15, 12, 30);
        $this->SetY($this->y0);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 5, '', 'LR');
        $this->Ln();
        $this->Cell(30, 5, '', 'L');
        $this->Cell(0, 5, 'PERHITUNGAN KEHADIRAN PER DEPARTEMEN', 'R', 0, 'C');
        $this->Ln();
        $this->Cell(0, 5, '', 'LBR');
        $this->Ln(1);

        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 6, '', 'B', 0, 'C');
        $this->Ln();
        $this->Cell(35, 6, '', 'L');
        $this->Cell(80, 6, '');
        $this->Cell(0, 6, '', 'R');
        $this->Ln(6);
        $this->Cell(0, 6, '', 'T');
        $this->Ln(1);

        $this->SetFillColor(230, 230, 230);

        $this->Cell(0, 1, '', 'B');
        $this->Ln();
        $this->SetFont('Arial', 'B', 9);
        $this->Cell($w[0], 4, 'No', 'LTR', 0, 'C');
        $this->Cell($w[1], 4, 'Nama', 'LTR', 0, 'C');
        $this->Cell($w[2], 4, 'Nama Jabatan', 'LTR', 0, 'C');
        $this->Cell($w[3], 4, 'Cuti', 'LTR', 0, 'C');
        $this->Cell($w[4], 4, 'Alpha', 'LTR', 0, 'C');
        $this->Cell($w[5] + $w[6], 4, 'TERLAMBAT', 1, 0, 'C');
        $this->Cell($w[7] + $w[8], 4, 'PULANG CEPAT', 1, 0, 'C');
        $this->Cell($w[9], 4, 'TAD', 'LTR', 0, 'C');
        $this->Cell($w[10], 4, 'TAP', 'LTR', 0, 'C');
        $this->Cell($w[11], 4, 'KETERANGAN', 'LTR', 0, 'C');
        $this->Ln();
        $this->Cell($w[0], 4, '', 'BLR', 0, 'C');
        $this->Cell($w[1], 4, '', 'BLR', 0, 'C');
        $this->Cell($w[2], 4, '', 'BLR', 0, 'C');
        $this->Cell($w[3], 4, '', 'BLR', 0, 'C');
        $this->Cell($w[4], 4, '', 'BLR', 0, 'C');
        $this->Cell($w[5], 4, 'jmlh', 'BLR', 0, 'C');
        $this->Cell($w[6], 4, 'menit', 'BLR', 0, 'C');
        $this->Cell($w[7], 4, 'jmlh', 'BLR', 0, 'C');
        $this->Cell($w[8], 4, 'menit', 'BLR', 0, 'C');
        $this->Cell($w[9], 4, '', 'BLR', 0, 'C');
        $this->Cell($w[10], 4, '', 'BLR', 0, 'C');
        $this->Cell($w[11], 4, '', 'BLR', 0, 'C');
        $this->Ln();
    }

    function report($rows) {
        $w = array(8, 49, 58, 10, 10, 15, 15, 15, 15,10,10,62);
        $this->myheader($rows, $w);
        $dept = null;
        $counter = 1;

        foreach ($rows as $row) {
            if ($row['department'] != $dept) {
                if ($dept != null) {
                    $this->Cell(0, 5, '', 'T');
                    $this->AddPage();
                    $this->myheader($rows, $w);
                    $counter = 1;
                }
                $this->SetFont('Arial', 'B', 9);
                $this->Cell(0, 7, $row['department'], 1, 0, 'C');
                $this->Ln();
                $dept = $row['department'];
            }
            $this->SetFont('Arial', '', 9);
            $this->Cell($w[0], 5, $counter, 'L', 0, 'R');
            $this->Cell($w[1], 5, $row['employee_name'], 'L');
            $this->Cell($w[2], 5, substr($row['job_title'], 0, 37), 'LR');
            $this->Cell($w[3], 5, $row['cuti'], 'LR', 0, 'C');
            $this->Cell($w[4], 5, $row['alpha'], 'LR', 0, 'C');
            $this->Cell($w[5], 5, $row['ijin'], 'LR', 0, 'C');
            $this->Cell($w[6], 5, '', 'LR', 0, 'C');

            $this->Cell($w[7], 5, '', 'LR', 0, 'C');
            $this->Cell($w[8], 5, '', 'LR');
            $this->Cell($w[9], 5, '', 'LR');
            $this->Cell($w[10], 5, '', 'LR');
            $this->Cell($w[11], 5, '', 'LR');
            $this->Ln();
            $counter++;

            if ($this->GetY() > 180) {
                $this->Cell(0, 5, '', 'T');
                $this->AddPage();
                $dept = null;
                $this->myheader($rows, $w);
            }
        }
        $this->Cell(0, 5, '', 'T');
    }

}

?>