<?php

function convertDateTime($date, $start = true) {
	$date = explode ( " ", $date );
	if (is_array ( $date ) && count ( $date ) > 0) {
		if (count ( $date ) > 1) {
			$date [0] = implode ( "-", array_reverse(explode ( "/", $date [0] ))  );
			$date = implode ( " ", $date );
		} else {
			$date = implode ( "-", array_reverse(explode ( "/", $date [0] )));
			$date .= ($start ? " 00:00:00" : " 23:59:59");
		}
	} else {
		$date = date ( "Y-m-d " . ($start ? "00:00:00" : "23:59:59") );
	}
	return $date;
}

function convertDate($date) {
	$date = explode ( " ", $date );
	if (is_array ( $date ) && count ( $date ) > 0) {
		return implode ( "-", array_reverse ( explode ( "/", $date [0] ) ) );
	}
	return date ( "Y-m-d" );
}

function convertDateTimeRev($date, $start = true) {
	$date = explode ( " ", $date );
	if (is_array ( $date ) && count ( $date ) > 0) {
		if (count ( $date ) > 1) {
			$date [0] = implode ( "/", array_reverse ( explode ( "-", $date [0] ) ) );
			$date = implode ( " ", $date );
		} else {
			$date = implode ( "/", array_reverse ( explode ( "-", $date [0] ) ) );
			$date .= ($start ? " 00:00:00" : " 23:59:59");
		}
	} else {
		$date = date ( "Y/m/d " . ($start ? "00:00:00" : "23:59:59") );
	}
	return $date;
}

function extractDateTime($date) {
	$date = explode ( " ", str_replace ( "/\s*/", " ", $date ) );
	if (is_array ( $date ) && count ( $date ) > 0) {
		if (count ( $date ) > 1) {
			return array (
					$date [0],
					$date [1] 
			);
		} else {
			return array (
					$date [0],
					false 
			);
		}
	}
	return array (
			false,
			false 
	);
}

function indexar($datos=array()){
	$nuevo = array();
	if(is_array($datos)){
		foreach($datos as $f){
			$index = ((int)$f->fila*10)+(int)$f->columna;
			$nuevo[intval($index)] = $f;
		}
	}	
	return $nuevo;
}

?>