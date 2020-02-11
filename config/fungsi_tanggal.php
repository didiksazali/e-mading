<?php
function TanggalIndo($date){
	$BulanIndo = array("Jan", "Febr", "Mar", "Apr", "Mei", "Juni", "Juli", "Agus", "Sept", "Okto", "Nov", "Des");
 	$tgl   = substr($date, 8, 2);
	$bulan = substr($date, 5, 2);
	$tahun = substr($date, 0, 4);
 
	$result = $tahun . " " . $BulanIndo[(int)$bulan-1] . " ". $tgl;		
	return($result);
}
?>