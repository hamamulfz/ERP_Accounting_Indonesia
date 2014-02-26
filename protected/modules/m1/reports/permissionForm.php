<?php

class permissionForm extends fpdf {

    function report($model) {
        $this->y0 = $this->GetY();
        $this->Cell(0, 5, '', 'T', 0, 'C');
        $this->Image('shareimages/company/logoAlt1.jpg', 15, 12, 30);
        $this->SetY($this->y0);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(0, 5, '', 'LR');
        $this->Ln();
        $this->Cell(30, 5, '', 'L');
        $this->Cell(0, 5, 'FORMULIR PERMOHONAN IJIN KARYAWAN', 'R', 0, 'C');
        $this->Ln();
        $this->Cell(0, 5, '', 'LBR');
        $this->Ln(7);

        $this->SetFillColor(230, 230, 230);
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(0, 10, $model->person->mCompany(), 0, 0, 'C', true);
        $this->Ln(7);

        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 6, '', 'B', 0, 'C');
        $this->Ln();
        $this->Cell(35, 8, 'Nama', 'L');
        $this->SetFont('Arial', 'B', 10);
        $this->Cell(80, 8, ':  ' . $model->person->employee_name);
        $this->SetFont('Arial', '', 10);
        $this->Cell(50, 8, 'NRK');
        $this->Cell(60, 8, '');
        $this->Cell(0, 8, '', 'R');
        $this->Ln();
        $this->Cell(35, 6, 'Departemen', 'L');
        $this->Cell(80, 6, ':  ' . $model->person->mDepartment());
        $this->Cell(40, 6, '');
        $this->Cell(40, 6, '');
        $this->Cell(0, 6, '', 'R');
        $this->Ln();
        $this->Cell(35, 6, 'Jabatan', 'L');
        $this->Cell(80, 6, ':  ' . $model->person->mJobTitle());
        $this->Cell(0, 6, '', 'R');
        $this->Ln(6);
        $this->Cell(0, 6, '', 'T');
        $this->Ln(1);

        $this->SetFillColor(230, 230, 230);
        $this->SetFont('Arial', '', 10);
        $this->Cell(0, 2, '', 'LTR');
        $this->Ln();
        $this->Cell(60, 6, 'Dengan ini mengajukan ijin:', 'L');
        $this->Cell(0, 6, '', 'R');
        $this->Ln();
        $this->Cell(60, 6, 'Tanggal  ', 'L');
        $this->Cell(30, 6, ': ' . Yii::app()->dateFormatter->format("dd-MM-yyyy", strtotime($model->start_date)));
        $this->Cell(10, 6, 's/d');
        $this->Cell(30, 6, Yii::app()->dateFormatter->format("dd-MM-yyyy", strtotime($model->end_date)));
        $this->Cell(0, 6, '', 'R');
        $this->Ln();
        $this->Cell(60, 6, 'Pukul  ', 'L');
        $this->Cell(30, 6, ': ' . Yii::app()->dateFormatter->format("HH:mm", strtotime($model->start_date)));
        $this->Cell(10, 6, 's/d');
        $this->Cell(30, 6, Yii::app()->dateFormatter->format("HH:mm", strtotime($model->end_date)));
        $this->Cell(0, 6, '', 'R');
        $this->Ln();
        $this->Cell(60, 6, 'Jumlah Hari Kerja', 'L');
        $this->Cell(10, 6, ': ' . $model->number_of_day . '  Hari');
        $this->Cell(0, 6, '', 'R');
        $this->Ln();
        $this->Cell(60, 6, 'Jenis Ijin', 'L');
        $this->Cell(0, 6, ': ' . $model->permission_type->name, 'R');
        $this->Ln();
        $this->Cell(60, 6, 'Dengan alasan', 'L');
        $this->Cell(0, 6, ': ' . $model->permission_reason, 'R');
        $this->Ln();
        $this->Cell(0, 2, '', 'LBR');
        $this->Ln();

        $w = array(63, 63, 64);

        $this->Cell(0, 1, '', 'B');
        $this->Ln();
        $this->SetFont('Arial', '', 9);
        $this->Cell($w[0], 5, 'Diajukan oleh:', 'LTR', 0, 'C', true);
        $this->Cell($w[1], 5, 'Disetujui oleh:', 'LTR', 0, 'C', true);
        $this->Cell($w[2], 5, 'Diketahui oleh:', 'LTR', 0, 'C', true);
        $this->Ln();
        $this->Cell($w[0], 25, '', 'LR');
        $this->Cell($w[1], 25, '', 'LR');
        $this->Cell($w[2], 25, '', 'LR');
        $this->Ln();
        $this->SetFont('Arial', '', 8);
        $this->Cell($w[0], 8, 'Nama:  ' . $model->person->employee_name, 1);
        $this->Cell($w[1], 8, 'Nama:', 1);
        $this->Cell($w[2], 8, 'Nama:', 1);
        $this->Ln();
        $this->Cell($w[0], 6, 'Tanggal:  ' . $model->input_date, 'LTR');
        $this->Cell($w[1], 6, 'Tanggal:', 'LTR');
        $this->Cell($w[2], 6, 'Tanggal:', 'LTR');
        $this->Ln();
        $this->SetFont('Arial', 'B', 8);
        $this->Cell($w[0], 4, 'Karyawan', 'LBR', 0, 'C', true);
        $this->Cell($w[1], 4, 'Atasan Terkait', 'LBR', 0, 'C', true);
        $this->Cell($w[2], 4, 'Pihak HR', 'LBR', 0, 'C', true);
    }

}

?>