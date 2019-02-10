<?php
if($dok != FALSE){foreach($dok as $dok){
    $thn = $this->loginm->getail('tujuan', array('id',$dok['id_tuju']), 'lok');
    $ndp = $this->loginm->getail('pengguna', array('surel',$dok['surel_petugas']) , 'namadepan');
    $nbp = $this->loginm->getail('pengguna', array('surel',$dok['surel_petugas']) , 'namabelakang');
    $nap = $ndp." ".$nbp;
    $nam = $dok['namakk'];
}}else{
    echo "<br><h1 align='center'>-Was Gone!</h1><br><h4 align='center' style='color: white;'><i>Пролетарии всех стран, соединяйтесь!</i></h4>";
    exit;
}

//Load Model PDF
$pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetTitle("Kartu Seleksi Transmigran Tahun $thn Milik $nam");
$pdf->SetFont('times', '', 12, '', 'false');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(20);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->setPrintHeader(false);
$pdf->SetAuthor($nap);
$pdf->SetDisplayMode('real', 'default');

$pdf->AddPage();

$html = '<p style="text-align: center"><b>KARTU SELEKSI TRANSMIGRAN</b></p>';
$html.= '<table cellspacing="0" cellpadding="0" border="1"><tr><td width="110" align="center"><b>DAERAH TUJUAN</b></td></tr></table>';

/* HTML DIMULAI DISINI gunakan "$html.='';" */
$html.='
<table>
    
</table>
';
/* HTML DIAKHIRI DISINI */

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output("Kartu Transmigran milik $nam - $thn.pdF", 'I');

//echo $this->safe->auto($dok->k_no_srt_pk_kd_kls);
?>