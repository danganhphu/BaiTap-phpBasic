<?php
require_once('./config.php');

class DataBase {
	//Được sử dụng với các lệnh insert, update, delete
	public static function execute($query) {
		//MO KET NOI
		$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
		mysqli_set_charset($conn, 'utf8');

		//TAO QUERY INSERT/UPDATE/DELETE
		mysqli_query($conn, $query);

		//DONG KET NOI
		mysqli_close($conn);
	}

	//Được sử dụng với lệnh select
	public static function executeResult($query) {
		//MO KET NOI
		$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
		mysqli_set_charset($conn, 'utf8');

		//TAO QUERY SELECT
		$data = [];
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result, 1)) {
			$data[] = $row;
		}
		//DONG KET NOI
		mysqli_close($conn);

		return $data;
	}
}
