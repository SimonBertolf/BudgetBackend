<?php
require_once('./class/class_database.php');
/**
 * Class database_budgetType
 * budget_type tabelle und ihre funktionen
 */
class database_budgetType {
	
	public function getType($id) {
		$db = new class_database();
		$type = null;
		$type = $db->mysql->query("SELECT * FROM budget_type WHERE ID ='" . $id . "'")
											->fetch_row();
		return $type;
	}
	
}