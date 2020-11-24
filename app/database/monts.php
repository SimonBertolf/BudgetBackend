<?php
require_once('./class/class_database.php');
/**
 * Class database_months
 * Months Tabelle und ihre funktionen
 */
class database_months {
	
	public function getMonth($id) {
		$db = new class_database();
		$months = null;
		$months = $db->mysql->query("SELECT * FROM months WHERE ID ='" . $id . "'")
											->fetch_row();
		return $months;
	}
	
}