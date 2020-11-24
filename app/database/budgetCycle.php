<?php
require_once('./class/class_database.php');
/**
 * Class database_budgetCycle
 * budget_cycle Tabelle und ihre funktionen
 */
class database_budgetCycle {
	
	public function getCycle($id) {
		$db = new class_database();
		$cycle = null;
		$cycle = $db->mysql->query("SELECT * FROM budget_cycle WHERE ID ='" . $id . "'")
											->fetch_row();
		return $cycle;
	}
	
}