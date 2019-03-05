<?php
if($dok != FALSE){foreach($dok as $dok){
    $thn = $this->loginm->getail('tujuan', array('id',$dok['id_tuju']), 'tahun');
    $pet = $this->loginm->getean('pengguna', array('surel' => $dok['surel_petugas']))[0];
    $nap = $pet['namadepan']." ".$pet['namabelakang'];
    $nam = $dok['namakk'];
    $doa = $this->loginm->getean('data_tanggung', array('id_kk' => $dok['id']));
    $dot = $this->loginm->getean('tujuan', array('id' => $dok['id_tuju']))[0];
}}else{
    echo "<br><h1 align='center'>-Was Gone!</h1><br><h4 align='center' style='color: white;'><i>Пролетарии всех стран, соединяйтесь!</i></h4>";
    exit;
}
//Load Model PDF
$pdf = new Pdf('P', 'mm', 'Legal', true, 'UTF-8', false);
$pdf->SetTitle("Kartu Seleksi Transmigran Tahun $thn Milik $nam");
$pdf->SetFont('times', '', 12, '', 'false');
$pdf->SetHeaderMargin(30);
$pdf->SetTopMargin(15);
$pdf->setFooterMargin(20);
$pdf->SetAutoPageBreak(true);
$pdf->setPrintHeader(false);
$pdf->SetAuthor($nap);
$pdf->SetDisplayMode('real', 'default');

$pdf->AddPage();

$html = '<p style="text-align: center"><b>KARTU SELEKSI TRANSMIGRAN</b></p>';
$html .= '<table cellspacing="0" cellpadding="0" border="1"><tr><td width="110" align="center"><b>DAERAH TUJUAN</b></td></tr></table>';

/* HTML DIMULAI DISINI gunakan "$html.='';" */
$html .= '
<table>
    <tr>
        <td width="110">No. Pendaftaran</td><td width="200">: '.$dok['id'].'</td>
        <td width="200" border="1" rowspan="6">&nbsp;</td>
    </tr>
    <tr>
        <td width="110">Jenis Trans</td><td>: '.$dok['jenis'].'</td>
    </tr>
    <tr>
        <td width="110">Lokasi/UPT</td><td>: '.$dot['lok'].'</td>
    </tr>
    <tr>
        <td width="110">Kabupaten</td><td>: '.$dot['kab'].'</td>
    </tr>
    <tr>
        <td width="110">Provinsi</td><td>: '.$dot['prov'].'</td>
    </tr>
    <tr>
        <td width="110">Tahun Anggaran</td><td>: '.$thn.'</td>
    </tr>
</table>
';
$html .= '<br><br><b>I. DATA CALON TRANSMIGRAN (KK)</b><br>';
$html .= '
<table>
    <tr>
        <td width="110">Nama</td><td>: '.$dok['namakk'].'</td>
        <td width="130">Tempat/Tgl Lahir</td><td>: '.$dok['tmp_lh'].', '.date("d-m-Y", strtotime($dok['tl'])).'</td>
    </tr>
    <tr>
        <td width="110">Alamat Rumah</td><td>: '.$dok['alamat'].'</td>
        <td width="130">Tanggal Kawin</td><td>: '.$dok['ttk'].'</td>
    </tr>
    <tr>
        <td width="110">Kelurahan/Desa</td><td>: '.$dok['desa'].'</td>
        <td width="130">Pendidikan</td><td>: '.$dok['pendidikan'].'</td>
    </tr>
    <tr>
        <td width="110">Kecamatan</td><td>: '.$dok['kecamatan'].'</td>
        <td width="130">Pekerjaan</td><td>: '.$dok['pekerjaan'].'</td>
    </tr>
    <tr>
        <td width="110">Kabupaten/Kota</td><td>: '.$dok['kabupaten'].'</td>
        <td width="130">Pendapatan</td><td>: Rp.'.$dok['pendapatan'].'</td>
    </tr>
    <tr>
        <td width="110">Provinsi</td><td>: '.$dok['provinsi'].'</td>
        <td width="130">Luas Tanah ditinggal</td><td>: '.$dok['luastinggal'].'m<sup>2</sup></td>
    </tr>
</table>
';
$html .= '<br><br><b>II. ANGGOTA KELUARGA YANG MENJADI TANGGUNGAN</b><br>';
$html .= '<table cellspacing="0" cellpadding="3" border="1">';
$html .= '
<tr>
    <td align="center" width="25" rowspan="2">No.</td>
    <td align="center" width="130" rowspan="2">Nama</td>
    <td align="center" width="50" colspan="2">Umur</td>
    <td align="center" width="70" rowspan="2">Hub</td>
    <td align="center" width="70" rowspan="2">Agama</td>
    <td align="center" width="70" rowspan="2">Pendidikan</td>
    <td align="center" width="70" rowspan="2">Pekerjaan</td>
    <td align="center" width="70" rowspan="2">Keterangan</td>
</tr>
<tr>
    <td align="center" width="25">L</td>
    <td align="center" width="25">P</td>
</tr>
';
$x=0;
if($doa != FALSE){foreach($doa as $doa){
    $x++;
    $html .= '
    <tr>
        <td width="25">'.$x.'</td>
        <td width="130">'.$doa['nama'].'</td>';
        if($doa['jk']){
    $html .= '<td  width="25">'.$doa['umur'].'</td>
        <td width="25">&nbsp;</td>';
        }else{
    $html .= '<td width="25">&nbsp;</td>
        <td width="25">'.$doa['umur'].'</td>';
        }
    $html .= '<td width="70">'.$doa['hubungan'].'</td>
        <td width="70">'.$doa['agama'].'</td>
        <td width="70">'.$doa['pendidikan'].'</td>
        <td width="70">'.$doa['pekerjaan'].'</td>
        <td width="70">'.$doa['keterangan'].'</td>
    </tr>
    ';
}}
$html .= '</table>';

$html .= '<br><br><b>III. PERNYATAAN TRANSMIGRAAN</b>';
$html .= '
<ol>
    <li>Bahwa saya dengan penuh kesadaran dan secara sukarela untuk mengikuti program Transmigrasi yang diselenggarakan oleh Pemerintah/Pemerintah Daerah;</li>
    <li>Bahwa saya akan menaati serta melaksanakan ketentuan dan peraturan yang berlaku mengenai Tata Cara Penyelenggaraan Program Transmigrasi oleh Pemerintah/Pemerintah Daerah;</li>
    <li>Bahwa saya tidak akan menuntut atau akan menyelesaikan secara musyawarah, apabila sewaktu waktu terjadi perubahan karena kebijakan Pemerintah/Pemerintah Daerah;</li>
    <li>Bahwa saya belum pernah mengikuti Program Transmigrasi;</li>
    <li>Bahwa Surat Pernyataan ini saya buat dalam keadaan sadar serta tidak ada tekanan dari pihak manapun.</li>
</ol>';

$html .= '
<table cellspacing="0" cellpadding="0" border="1">
<tr>
    <td height="100" align="center">Cap Jempol<br>Tangan Kiri</td>
    <td height="100" align="center">Cap Jempol<br>Tangan Kanan</td>
    <td height="100" align="center">Indramayu, '.strftime('%d %B %Y').' <br>Calon Transmigran</td>
</tr>
</table>
<br pagebreak="true"/>
';

$html .= '<br><br><b>IV. KETERANGAN INSTANSI / PEMERINTAH</b>';
$html .= '
<ol type="a">
    <li>Orang tersebut setelah diadakan penelitian dinyatakan BERKELAKUAN BAIK dan belum pernah tersangkut masalah Polisi;</li>
    <li>Keterangan ini dibuat untuk melengkapi persyaratan yang bersangkutan untuk mengikuti Program Transmigrasi;</li>
</ol>';
$html .= '
<table>
<tr>
    <td height="100" align="center">Mengetahui<br>Camat</td>
    <td height="100" align="center">Kepala Desa/Lurah</td>
</tr>
<tr>
    <td height="40" align="center">NIP. .....................................................</td>
    <td height="40" align="center">...................................................</td>
</tr>
<tr>
    <td height="90" align="center" colspan="2">Kepala Kepolisian Sektor</td>
</tr>
<tr>
    <td colspan="2" align="center">...................................................</td>
</tr>
</table>
';
$html .= '
<ol type="a" start="3">
    <li>Orang tersebut setelah di adakan peneliitian dinyatakan SEHAT;</li>
    <li>Keterangan ini dibuat untuk melengkapi pernyataan mengikuti Program Transmigrasi;</li>
</ol>';
$html .= '<br><br><b>V. PETUGAS PENDAFTARAN</b><br>';
$html .= '<table>
<tr>
    <td width="110">Nama / NIP</td>
    <td width="280">: '.$nap.'/'.$pet['nip'].'</td>
    <td width="110" rowspan="3">TANDA TANGAN</td>
</tr>
<tr>
    <td width="110">Pangkat / Golongan</td><td>: '.$pet['pangkatgol'].'</td>
</tr>
<tr>
    <td width="110" height="30">Jabatan</td><td>: '.$pet['jabatan'].'</td>
</tr>
<tr>
    <td colspan="2">&nbsp;</td>
    <td>..................................</td>
</tr>
';
$html .= '<p>Petugas Pendaftaran telah melakukantugasnya sesuia dengan Keputusan Direktur Jendral Mobilitas Penduduk Nomor 42/MP/VI/2005 tentang Petunjuk Pelaksanaan Keputusan Mentri Tenaga Kerja dan Transmigrasi Republik Indonesia Nomor 208/MEN/X/2004 tentang Syarat dan Tata Kerja Cara Penempatan sebagai Transmigran.</p>';
$html .= '
<table>
<tr>
    <td height="100" align="center">&nbsp;</td>
    <td height="100" align="center">KEPALA DINAS, TENAGA KERJA<br>KABUPATEN INDRAMAYU</td>
</tr>
<tr>
    <td align="center">&nbsp;</td>
    <td align="center">...................................................</td>
</tr>
</table>
';

/* HTML DIAKHIRI DISINI */

$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output("Kartu Transmigran milik $nam - $thn.pdF", 'I');

//echo $this->safe->auto($dok->k_no_srt_pk_kd_kls);
?>