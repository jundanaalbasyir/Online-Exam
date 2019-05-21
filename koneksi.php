<?php
session_start();

/* variabel konfigurasi */
$konfigurasi['h']			= "localhost";		// server
$konfigurasi['u']			= "root";			// db username
$konfigurasi['p']			= "";				// db password
$konfigurasi['d'] 			= "_ppdb";			// db name 
$konfigurasi['pengguna']	= "smk";			// tingkat pengguna pilihan = "smk" atau "smp"


mysql_connect($konfigurasi['h'], $konfigurasi['u'], $konfigurasi['p']) or die (mysql_error());
mysql_select_db($konfigurasi['d']) or die (mysql_error());


function cmbDB ($name, $selected) {

	echo "<select name='$name'><option value='' >--</option>";
	if($selected == 1){
		echo "<option value='1' selected >Islam</option>";	
	}else{
		echo "<option value='1' >Islam</option>";
	}
	
	if($selected == 2){
		echo "<option value='2' selected>Kristen Katolik</option>";
	}else{
		echo "<option value='2' >Kristen Katolik</option>";
	}
	
	if($selected == 3){
		echo "<option value='3' selected >Kristen Protestan</option>";	
	}else{
		echo "<option value='3' >Kristen Protestan</option>";
	}
	
	if ($selected == 4) {
		echo "<option value='4' selected>Hindu</option>";
	}else{
		echo "<option value='4' >Hindu</option>";
	}
	
	if ($selected == 5) {
		echo "<option value='5' selected>Budha</option>";
	}else{
		echo "<option value='5' >Budha</option>";
	}
	
	if ($selected == 6) {
		echo "<option value='6' selected>Kong Hu Chu</option>";
	}else{
		echo "<option value='6' >Kong Hu Chu</option>";
	}
	
	echo "</select>";
}

function cInput($label, $name, $size, $value) {
	echo "<tr><td width=\"20%\">$label</td><td colspan=\"3\"><input type=\"text\" name=\"$name\" size=\"$size\" value=\"$value\" class=\"required\"></td></tr>";
}

function cInputDis($label, $name, $size, $value) {
	echo "<tr><td width=\"20%\">$label</td><td><input type=\"text\" name=\"$name\" disabled size=\"$size\" value=\"$value\" class=\"required\"></td><td><b>Di isi oleh panitia</b></td></tr>";
}

function cInput2($label, $name, $size, $value) {
	$pc_label = explode("|", $label);
	$pc_name  = explode("|", $name);
	$pc_size  = explode("|", $size);
	$pc_value = explode("|", $value);
	
	$label1 = $pc_label[0]; $label2 = $pc_label[1];
	$name1 = $pc_name[0]; $name2 = $pc_name[1];
	$size1 = $pc_size[0]; $size2 = $pc_size[1];
	$value1 = $pc_value[0]; $value2 = $pc_value[1];
	
	echo "
	<tr>
	<td width=\"20%\">$label1</td><td width=\"30%\"><input type=\"text\" name=\"$name1\" size=\"$size1\" value=\"$value1\" class=\"required\"></td>
	<td width=\"20%\">$label2</td><td width=\"30%\"><input type=\"text\" name=\"$name2\" size=\"$size2\" value=\"$value2\" class=\"required\"></td>
	</tr>";
}

function cCmbTglLahir($tmp_lhr_value, $d, $m, $y) {
	echo "<tr><td width=\"20%\">Tempat Lahir</td>
	<td colspan=\"3\"><input type=\"text\" name=\"tmp_lahir\" size=\"30\" value=\"$tmp_lhr_value\"> , 
	Tgl. Lahir ";
	
	echo "<select name='tgl_lahir'><option value=''>Tanggal</option>";
	for ($tg =1; $tg <=31; $tg++) {
		if ($tg == $d) {
			echo "<option value='$tg' selected>$tg</option>";		
		} else {
			echo "<option value='$tg'>$tg</option>";		
		}
	}	
	
	echo "</select> - <select name='bln_lahir'><option value=''>Bulan</option>";
	for ($bl =1; $bl <=12; $bl++) {
		if ($bl == $m) {
			echo "<option value='$bl' selected>$bl</option>";		
		} else {
			echo "<option value='$bl'>$bl</option>";		
		}
	}
		
	echo "</select> - <select name='thn_lahir'><option value=''>Tahun</option>";
	for ($th = 2012; $th >=1990; $th--) {
		if ($th == $y) {
			echo "<option value='$th' selected>$th</option>";		
		} else {
			echo "<option value='$th'>$th</option>";		
		}
	}
	echo "</td></tr>";
}


function cCmbPekerjaan($val1, $val2) {
	echo "<td width=\"20%\">Pekerjaan Ayah</td><td width=\"30%\"><select name='pkj_ay'><option value=''>--</option>";
	if($val1 == 1){
		echo "<option value='1' selected >Tani</option>";	
	}else{
		echo "<option value='1'>Tani</option>";
	}
	
	if ($val1 == 2) {
		echo "<option value='2' selected>Karyawan Swasta</option>";
	}else{
		echo "<option value='2'>Karyawan Swasta</option>";
	}

	if ($val1 == 3) {
		echo "<option value='3' selected>Wiraswasta</option>";
	}else{
		echo "<option value='3'>Wiraswasta</option>";
	}

	if ($val1 == 4) {
		echo "<option value='4' selected>PNS</option>";
	}else{
		echo "<option value='4'>PNS</option>";
	}

	if ($val1 == 5) {
		echo "<option value='5' selected>TNI/Polri</option>";
	}else{
		echo "<option value='5'>TNI/Polri</option>";
	}
	
	if ($val1 == 6) {
		echo "<option value='6' selected>Perangkat Desa</option>";
	}else{
		echo "<option value='6'>Perangkat Desa</option>";
	}
	
	if ($val1 == 7) {
		echo "<option value='7' selected>Buruh</option>";
	}else{
		echo "<option value='7'>Buruh</option>";
	}
	
	if ($val1 == 8) {
		echo "<option value='8' selected>Nelayan</option>";
	}else{
		echo "<option value='8'>Nelayan</option>";
	}
	
	if ($val1 == 9) {
		echo "<option value='9' selected>IRT (Ibu Rumah Tangga)</option>";
	}else{
		echo "<option value='9'>IRT (Ibu Rumah Tangga)</option>";
	}
	
	if ($val1 == 10) {
		echo "<option value='10' selected>Lain-lainnya</option>";
	}else{
		echo "<option value='10'>Lain-lainnya</option>";
	}
	

	echo "</select></td><td width=\"20%\">Pekerjaan Ibu</td><td width=\"30%\"><select name='pkj_ib'><option value=''>--</option>";
	if($val2 == 1){
		echo "<option value='1' selected >Tani</option>";	
	}else{
		echo "<option value='1'>Tani</option>";
	}
	
	if ($val2 == 2) {
		echo "<option value='2' selected>Karyawan Swasta</option>";
	}else{
		echo "<option value='2'>Karyawan Swasta</option>";
	}

	if ($val2 == 3) {
		echo "<option value='3' selected>Wiraswasta</option>";
	}else{
		echo "<option value='3'>Wiraswasta</option>";
	}

	if ($val2 == 4) {
		echo "<option value='4' selected>PNS</option>";
	}else{
		echo "<option value='4'>PNS</option>";
	}

	if ($val2 == 5) {
		echo "<option value='5' selected>TNI/Polri</option>";
	}else{
		echo "<option value='5'>TNI/Polri</option>";
	}
	
	if ($val2 == 6) {
		echo "<option value='6' selected>Perangkat Desa</option>";
	}else{
		echo "<option value='6'>Perangkat Desa</option>";
	}
	
	if ($val2 == 7) {
		echo "<option value='7' selected>Buruh</option>";
	}else{
		echo "<option value='7'>Buruh</option>";
	}
	
	if ($val2 == 8) {
		echo "<option value='8' selected>Nelayan</option>";
	}else{
		echo "<option value='8'>Nelayan</option>";
	}
	
	if ($val2 == 9) {
		echo "<option value='9' selected>IRT (Ibu Rumah Tangga)</option>";
	}else{
		echo "<option value='9'>IRT (Ibu Rumah Tangga)</option>";
	}
	
	if ($val2 == 10) {
		echo "<option value='10' selected>Lain-lainnya</option>";
	}else{
		echo "<option value='10'>Lain-lainnya</option>";
	}

	echo "</select></td></tr>";
}

function cCmbPendidikan($val1, $val2) {
	echo "<td width=\"20%\">Pendidikan Ayah</td><td width=\"30%\"><select name='pend_ay'><option value=''>--</option>";
	if ($val1 == 1) {
		echo "<option value='1' selected>Tidak Sekolah</option>";
	}else{
		echo "<option value='1'>Tidak Sekolah</option>";
	}
	
	if ($val1 == 2) {
		echo "<option value='2' selected>SD/MI</option>";
	}else{
		echo "<option value='2'>SD/MI</option>";
	}
	
	if ($val1 == 3) {
		echo "<option value='3' selected>SMP/MTs</option>";
	}else{
		echo "<option value='3'>SMP/MTs</option>";
	}
	
	if ($val1 == 4) {
		echo "<option value='4' selected>SMA/SMK/MA</option>";
	}else{
		echo "<option value='4'>SMA/SMK/MA</option>";
	}
	
	if ($val1 == 5) {
		echo "<option value='5' selected>Diploma</option>";
	}else{
		echo "<option value='5'>Diploma</option>";
	}
	
	if ($val1 == 6) {
		echo "<option value='6' selected>Sarjana</option>";
	}else{
		echo "<option value='6'>Sarjana</option>";
	}
	
	if ($val1 == 7) {
		echo "<option value='7' selected>S-2</option>";
	}else{
		echo "<option value='7'>S-2</option>";
	}
	
	if ($val1 == 8) {
		echo "<option value='8' selected>S-3</option>";
	}else{
		echo "<option value='8'>S-3</option>";
	}
	

	echo "</select></td><td width=\"20%\">Pendidikan Ibu</td><td width=\"30%\"><select name='pend_ib'><option value=''>--</option>";
	if ($val2 == 1) {
		echo "<option value='1' selected>Tidak Sekolah</option>";
	}else{
		echo "<option value='1'>Tidak Sekolah</option>";
	}
	
	if ($val2 == 2) {
		echo "<option value='2' selected>SD/MI</option>";
	}else{
		echo "<option value='2'>SD/MI</option>";
	}
	
	if ($val2 == 3) {
		echo "<option value='3' selected>SMP/MTs</option>";
	}else{
		echo "<option value='3'>SMP/MTs</option>";
	}
	
	if ($val2 == 4) {
		echo "<option value='4' selected>SMA/SMK/MA</option>";
	}else{
		echo "<option value='4'>SMA/SMK/MA</option>";
	}
	
	if ($val2 == 5) {
		echo "<option value='5' selected>Diploma</option>";
	}else{
		echo "<option value='5'>Diploma</option>";
	}
	
	if ($val2 == 6) {
		echo "<option value='6' selected>Sarjana</option>";
	}else{
		echo "<option value='6'>Sarjana</option>";
	}
	
	if ($val2 == 7) {
		echo "<option value='7' selected>S-2</option>";
	}else{
		echo "<option value='7'>S-2</option>";
	}
	
	if ($val2 == 8) {
		echo "<option value='8' selected>S-3</option>";
	}else{
		echo "<option value='8'>S-3</option>";
	}

	echo "</select></td></tr>";
}

function cRadio($label1, $name, $label, $value, $isi) {
	$pc_label = explode("|", $label);
	$pc_value = explode("|", $value);
	$j_radio = count($pc_label);
	
	echo "\r<tr>\r<td width=\"20%\">$label1</td>\r<td colspan=\"3\">";
	for ($i = 0; $i < $j_radio; $i++) {
		if ($pc_value[$i] == $isi) {
			echo "\r<label><input type='radio' name='$name' value='$pc_value[$i]' checked>&nbsp;$pc_label[$i]</label>&nbsp;";
		} else {
			echo "\r<label><input type='radio' name='$name' value='$pc_value[$i]'>&nbsp;$pc_label[$i]</label>&nbsp;";
		}
	}
	echo "</td>\r</tr>";
}

function cPrestasi($val_nama, $val_tkt) {
	$pc_val_nama 	= explode("|", $val_nama);
	$pc_val_tkt		= explode("|", $val_tkt);
	
	for ($i=1; $i<=3; $i++) {
		$idx = $i-1;
		echo "<tr><td width=\"20%\">Prestasi $i</td><td colspan=\"3\">
		<input type='text' size='50' name='namapres$i' value='$pc_val_nama[$idx]'>&nbsp;&nbsp;&nbsp;
		Tingkat <select name='tgkt$i'><option value=''>--</option>";
		if ($pc_val_tkt[$idx] == 1) {
			echo "<option value='1' selected>Kabupaten</option>";
		}else{
			echo "<option value='1'>Kabupaten</option>";
		}
		
		if ($pc_val_tkt[$idx] == 2) {
			echo "<option value='2' selected>Provinsi</option>";
		}else{
			echo "<option value='2'>Provinsi</option>";
		}
		
		if ($pc_val_tkt[$idx] == 3) {
			echo "<option value='3' selected>Nasional</option>";
		}else{
			echo "<option value='3'>Nasional</option>";
		}
		
		if ($pc_val_tkt[$idx] == 4) {
			echo "<option value='4' selected>Internasional</option>";
		}else{
			echo "<option value='4'>Internasional</option>";
		}
		
		echo "</select></td></tr>";
	}
}

function cPilihanJurusan($val) {	
	echo "<td width=\"20%\">Pilihan Jurusan</td><td width='30%'><select name='jur'><option value=''>--</option>";
		$q = mysql_query("SELECT * FROM t_jurusan ORDER BY id_jur ASC");
		while ($a = mysql_fetch_array($q)) {
			if ($a[0] == $val) {
				echo "<option value='$a[0]' selected>$a[1]</option>";	
			} else {
				echo "<option value='$a[0]'>$a[1]</option>";		
			}
		}
}

function getNilaiPrestasi($tkt) {
	if ($tkt == 1) { $nilai = 1; } 
	elseif ($tkt == 2) { $nilai = 2; } 
	elseif ($tkt == 3) { $nilai = 3; } 
	elseif ($tkt == 4) { $nilai = 4; } 
	else {$nilai = 0; }
	
	return $nilai;
}

function getAgama($id_agama) {

	if($id_agama == 1) {
		$a[1] = 'Islam';
	} elseif( $id_agama == 2 ) {
		$a[1] = 'Kristen Katolik';
	} elseif( $id_agama == 3 ) {
		$a[1] = 'Kristen Protestan';
	} elseif( $id_agama == 4 ) {
		$a[1] = 'Hindu';
	} elseif( $id_agama == 5 ) {
		$a[1] = 'Budha';
	} elseif ($id_agama == 6) {
		$a[1] = 'Kong Hu Chu';
	} else{
		$a[1] = '--';
	}

	return $a[1];
}

function getPendidikan($id_pddk) {
	if($id_pddk == 1) {
		$a[1] = 'Tidak Sekolah';
	} elseif( $id_pddk == 2 ) {
		$a[1] = 'SD/MI';
	} elseif( $id_pddk == 3 ) {
		$a[1] = 'SMP/MTs';
	} elseif( $id_pddk == 4 ) {
		$a[1] = 'SMA/SMK/MA';
	} elseif( $id_pddk == 5 ) {
		$a[1] = 'Diploma';
	} elseif( $id_pddk == 6 ) {
		$a[1] = 'Sarjana';
	} elseif( $id_pddk == 7 ) {
		$a[1] = 'S-2';
	} elseif ($id_pddk == 8) {
		$a[1] = 'S-3';
	} else {
		$a[1] = '--';
	}

	return $a[1];
}

function getPekerjaan($id_pkj) {
	if($id_pkj == 1) {
			$a[1] = 'Tani';
		} elseif( $id_pkj == 2 ) {
			$a[1] = 'Karyawan Swasta';
		} elseif( $id_pkj == 3 ) {
			$a[1] = 'Wiraswasta';
		} elseif( $id_pkj == 4 ) {
			$a[1] = 'PNS';
		} elseif( $id_pkj == 5 ) {
			$a[1] = 'TNI/Polri';
		} elseif( $id_pkj == 6 ) {
			$a[1] = 'Perangkat Desa';
		} elseif( $id_pkj == 7 ) {
			$a[1] = 'Buruh';
		} elseif( $id_pkj == 8 ) {
			$a[1] = 'Nelayan';
		} elseif( $id_pkj == 9 ) {
			$a[1] = 'IRT (Ibu Rumah Tangga';
		} elseif ($id_pkj == 10) {
			$a[1] = 'Lain-lainnya';
		} else {
			$a[1] = '--';
		}	

	return $a[1];
}

function getTktPrestasi($id_pres) {
	if($id_pres == 1) {
			$a[1] = 'Kabupaten';
		} elseif( $id_pres == 2 ) {
			$a[1] = 'Provinsi';
		} elseif( $id_pres == 3 ) {
			$a[1] = 'Nasional';
		} elseif( $id_pres == 4){
			$a[1] = 'Internasional';
		} else{
			$a[1] = '-';
		}

	return $a[1];
}

function getJurusan($id_jur) {
	$q = mysql_query("SELECT * FROM t_jurusan WHERE id_jur='$id_jur'");
	$a = mysql_fetch_array($q);
	return $a[1];
}

function getJK($jk) {
	if ($jk == 1) {
		return "Laki-Laki";
	} else if ($jk == 2) {
		return "Perempuan";
	} else {
		return "Undefined";
	}
}

function getBertindik($bertindik) {
	if ($bertindik == 1) {
		return "Ya";
	} else if ($bertindik == 2) {
		return "Tidak";
	} else {
		return "Undefined";
	}
}

function getBertato($bertato) {
	if ($bertato == 1) {
		return "Ya";
	} else if ($bertato == 2) {
		return "Tidak";
	} else {
		return "Undefined";
	}
}

function getButaWarna($buta_warna) {
	if ($buta_warna == 1) {
		return "Ya";
	} else if ($buta_warna == 2) {
		return "Tidak";
	} else if ($buta_warna == 3) {
		return "Parsial";
	} else {
		return "Undefined";
	}
}

function getKondMata($kond_mata) {
	if ($kond_mata == 1) {
		return "Cacat";
	} else if ($kond_mata == 2) {
		return "Tidak";
	} else {
		return "Undefined";
	}
}

function getKondTangan($kond_tangan) {
	if ($kond_tangan == 1) {
		return "Cacat";
	} else if ($kond_tangan == 2) {
		return "Tidak";
	} else {
		return "Undefined";
	}
}

function getKondKaki($kond_kaki) {
	if ($kond_kaki == 1) {
		return "Cacat";
	} else if ($kond_kaki == 2) {
		return "Tidak";
	} else {
		return "Undefined";
	}
}

function getStatusAnak($status) {
	if ($status == 1) {
		return "Anak Kandung";
	} else if ($status == 2) {
		return "Anak Tiri";
	} else if ($status == 3) {
		return "Anak Asuh";
	} else {
		return "Undefined";
	}
}

function getStatusSklh($status) {
	if ($status == 1) {
		return "Negeri";
	} else if ($status == 2) {
		return "Swasta";
	} else {
		return "Undefined";
	}
}

function getVerifikasi($verifikasi) {
	if ($verifikasi == 0) {
		return "Menunggu";
	} else if ($verifikasi == 1) {
		return "Diterima";
	} else if ($verifikasi == 2) {
		return "Ditolak";
	} else{
		return "Undefined";
	}
}

function cCmb($val, $label, $sel) {
	$pc_val = explode("|", $val);
	$pc_lab = explode("|", $label);
	$j_opt  = count($pc_val);
	echo "<option value=''>--</option>";
	for ($i = 1; $i <= $j_opt; $i++) {
		$idx = $i-1;
		if ($pc_val[$idx] == $sel) {
			echo $sel;
			echo "<option value='?p=data_statistik&by=$pc_val[$idx]' selected>$pc_lab[$idx]</option>";	
		} else  {
			echo "<option value='?p=data_statistik&by=$pc_val[$idx]'>$pc_lab[$idx]</option>";
		}
	}
}

function getEkstensiFile($file) {
	$pc = explode(".", $file);
	$jA = count($pc);
	$letakEx = $jA-1;
	$ekstensi = $pc[$letakEx];
	return $ekstensi;	
}

function cFDfield($label, $data) {
	echo "<tr><td>$label</td><td>: $data</td></tr>";
}

function acakHuruf() {
	$panjangacak = 5;
	$base='ABCDEFGHKLMNOPQRSTWXYZabcdefghjkmnpqrstwxyz123456789';
	$max=strlen($base)-1;
	$acak='';
	mt_srand((double)microtime()*1000000);
	
	while (strlen($acak)<$panjangacak) {
		$acak.=$base{mt_rand(0,$max)};
	}
	return $acak;
}

function getValue($tabel, $field, $fk, $id) {
	$pc_fk 		= explode("|", $fk);
	$pc_id 		= explode("|", $id);
	$j_syarat 	= count($pc_fk);
	
	if ($j_syarat > 1) {
		$where = "WHERE $pc_fk[0] = '$pc_id[0]' AND $pc_fk[1] = '$pc_id[1]' LIMIT 1";
	} else {
		$where = "WHERE $fk = '$id' LIMIT 1";
	}	
	$q = mysql_query("SELECT $field FROM $tabel $where");
	// if ($q === FALSE) {
 //    	die(mysql_error());
	// }
	$a = mysql_fetch_array($q);
	return $a[0];
	// echo "$tabel";
	// echo "$field";
	// echo "$where";
}
?>