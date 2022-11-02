<?php

session_start();

//var_dump($_SESSION['Bonus']);

include_once("class.slots.php");
		
$slotMachine = new CLASS_SLOTS;
$bonus = $_GET['a'] ?? '';

switch($bonus) {
	case 'bonus':
		$slotMachine->DoBonus();
		break;
	case 'lucky':
		$slotMachine->genSlots();
		break;
}
