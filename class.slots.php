<?php

class TPoint {
		public int $x = 0;
		public int $y = 0;
		
		public function __construct($_x, $_y) {
			$this->x = $_x;
			$this->y = $_y;
		}
	}

	class CLASS_SLOTS {
	
		private array $_objItems = array ();

		// Value of Items
		private array $_objValueItems = array (
			'objItem8'		=>	35,	// Alex NOTE: Bonus!
			'objItem3'		=>	29,	// Smoking Forbidden NOTE: Bonus!
			'objItem10'		=>	22,	// Vape-Pen
			'objItem1'		=>	19,	// 187 Hamburg
			'objItem12'		=>	15,	// Shisha
			'objItem11'		=>	12,	// Vape
			'objItem4'		=>	10,	// Cloud
			'objItem6'		=>	8,	// Vape-Cloud
			'objItem5'		=>	5,	// Hanf Liquid
			'objItem7'		=>	3,	// Liquid
			'objItem2'		=>	3,	// Woman Vape
			'objItem9'		=>	3,	// Vape Market
		);
		
		private array $Lines = array();
		private array $_AwardValues = array(); 
		
		public function __construct() {
			if (!isset($_SESSION['Bonus'])) {
				$_SESSION['Bonus'] = array();
			}

			// Chances of Items
			$this->itemPush($this->_objItems,'objItem8',	4);	//4		Alex NOTE: Bonus!
			$this->itemPush($this->_objItems,'objItem3',	5);	//9 	Smoking Forbidden NOTE: Bonus!
			$this->itemPush($this->_objItems,'objItem10',	6);	//15 	Vape-Pen
			$this->itemPush($this->_objItems,'objItem1',	7);	//22 	187 Hamburg
			$this->itemPush($this->_objItems,'objItem12',	8);	//30 	Shisha
			$this->itemPush($this->_objItems,'objItem11',	8);	//38 	Vape
			$this->itemPush($this->_objItems,'objItem4',	9);	//47 	Cloud
			$this->itemPush($this->_objItems,'objItem6',	10);	//57 	Vape Cloud
			$this->itemPush($this->_objItems,'objItem5',	10);	//67 	Hanf Liquid
			$this->itemPush($this->_objItems,'objItem7',	11);	//78	Liquid
			$this->itemPush($this->_objItems,'objItem2',	11);	//89 	Woman Vape
			$this->itemPush($this->_objItems,'objItem9',	11);	//100 	Vape Market
			
			
			
			$this->Lines[] = array(new TPoint(0, 1), new TPoint(1, 1), new TPoint(2, 1), new TPoint(3, 1), new TPoint(4, 1)); // Linie 1
			
			$this->Lines[] = array(new TPoint(0, 0), new TPoint(1, 0), new TPoint(2, 0), new TPoint(3, 0), new TPoint(4, 0)); // Linie 2
			$this->Lines[] = array(new TPoint(0, 2), new TPoint(1, 2), new TPoint(2, 2), new TPoint(3, 2), new TPoint(4, 2)); // Linie 3
			$this->Lines[] = array(new TPoint(0, 0), new TPoint(1, 1), new TPoint(2, 2), new TPoint(3, 1), new TPoint(4, 0)); // Linie 4
			$this->Lines[] = array(new TPoint(0, 2), new TPoint(1, 1), new TPoint(2, 0), new TPoint(3, 1), new TPoint(4, 2)); // Linie 5
			
			$this->Lines[] = array(new TPoint(0, 0), new TPoint(1, 0), new TPoint(2, 1), new TPoint(3, 2), new TPoint(4, 2)); // Linie 6
			$this->Lines[] = array(new TPoint(0, 2), new TPoint(1, 2), new TPoint(2, 1), new TPoint(3, 0), new TPoint(4, 0)); // Linie 7
			$this->Lines[] = array(new TPoint(0, 1), new TPoint(1, 2), new TPoint(2, 2), new TPoint(3, 2), new TPoint(4, 1)); // Linie 8
			$this->Lines[] = array(new TPoint(0, 1), new TPoint(1, 0), new TPoint(2, 0), new TPoint(3, 0), new TPoint(4, 1)); // Linie 9
			
			$this->Lines[] = array(new TPoint(0, 1), new TPoint(1, 0), new TPoint(2, 1), new TPoint(3, 2), new TPoint(4, 1)); // Linie 10
			$this->Lines[] = array(new TPoint(0, 1), new TPoint(1, 2), new TPoint(2, 1), new TPoint(3, 0), new TPoint(4, 1)); // Linie 11
			$this->Lines[] = array(new TPoint(0, 2), new TPoint(1, 1), new TPoint(2, 0), new TPoint(3, 0), new TPoint(4, 0)); // Linie 12
			$this->Lines[] = array(new TPoint(0, 0), new TPoint(1, 1), new TPoint(2, 2), new TPoint(3, 2), new TPoint(4, 2)); // Linie 13
			$this->Lines[] = array(new TPoint(0, 0), new TPoint(1, 0), new TPoint(2, 0), new TPoint(3, 1), new TPoint(4, 2)); // Linie 14
			$this->Lines[] = array(new TPoint(0, 2), new TPoint(1, 2), new TPoint(2, 2), new TPoint(3, 1), new TPoint(4, 0)); // Linie 15
			
			$this->Lines[] = array(new TPoint(0, 0), new TPoint(1, 0), new TPoint(2, 0), new TPoint(3, 0), new TPoint(4, 1)); // Linie 16
			$this->Lines[] = array(new TPoint(0, 2), new TPoint(1, 2), new TPoint(2, 2), new TPoint(3, 2), new TPoint(4, 1)); // Linie 17
			$this->Lines[] = array(new TPoint(0, 1), new TPoint(1, 0), new TPoint(2, 0), new TPoint(3, 0), new TPoint(4, 0)); // Linie 18
			$this->Lines[] = array(new TPoint(0, 1), new TPoint(1, 2), new TPoint(2, 2), new TPoint(3, 2), new TPoint(4, 2)); // Linie 19
			$this->Lines[] = array(new TPoint(0, 2), new TPoint(1, 1), new TPoint(2, 1), new TPoint(3, 1), new TPoint(4, 0)); // Linie 20
			
		}
		
		public function itemPush(&$array, $item, $n): void
        {
			for ($i=0; $i < $n; $i++) {
                $array[] = $item;
			}
		}
		
		public function canPlay(): bool
        {
			return ((count($_SESSION['Bonus'])) === 0);
		}
		
		public function isBonus($el) {
			$ret = '';
			switch($el) {
				case 'objItem3': {
					$ret = 'c';
					break;
				}
				case 'objItem8': {
					$ret = 'c';
					break;
				}
			}
			
			if ($ret !== '') {
				$what = str_replace('obj', 'bonus', $el);
				if (!in_array($what, $_SESSION['Bonus'])) {
					$_SESSION['Bonus'][] = $what;
				}
			}
			
			return $ret;
		}
		
		public function CheckLine($LineNumber,$LineItems = array()): string
        {
			$last = '';
			$total = 0;
			$ret = '';
			$ret_add = array();
			
			$LineItems[] = '';
			foreach ($LineItems as $i => $v) {
				if ($v !== $last) {
					if ($total >= 3) 
					{
						//$ret = $ret . ($i-$total).'.'.$total;
						for($z = $i-$total; $z < $i; $z++) {
							$ret_add[] = $this->Lines[$LineNumber][$z]->x . ';' . $this->Lines[$LineNumber][$z]->y;
						}
						$ret .= implode('.', $ret_add);
						$ret_add = array();
						$this->_AwardValues[] = $this->_objValueItems[$last] * ($GLOBALS['base']) * $total . $this->isBonus($last);
					}
					$total = 1;
				} else {
					$total++;
				}
				$last = $v;
			}
			
			if ($ret === '') {
				if(($LineItems[0] === $LineItems[2]) && ($LineItems[2] === $LineItems[4])) {
					$total = 2;
					$last = $LineItems[0];
					for ($z = 0; $z <= 4; $z += 2) {
						$ret_add[] = $this->Lines[$LineNumber][$z]->x . ';' . $this->Lines[$LineNumber][$z]->y;
					}
					$ret .= implode('.', $ret_add);
					$this->_AwardValues[] = $this->_objValueItems[$last] * ($GLOBALS['base']) * $total . $this->isBonus($last);
				}
			}
			
			return $ret;
			
		}
		
		public function DoBonus(): void
		{
			//$curBonus	= array_shift($_SESSION['Bonus']);
			$curBonus 	= 'bonusCauldron';
			$k			= (int)$_GET['k'];
			
			switch($curBonus) {
				case 'bonusCauldron':
					$values = array('50','75','100','150','BONUS!');
					shuffle($values);
					foreach($values as $i => $v) {
						if($i !== ($k-1))
							$values[$i] = "<br/>".$v;
					}
					echo implode('|', $values);
					break;
				case 'bonusCandy':
					break;
			
			}
			
			exit;
		}
		
		
		public function genSlots(): void
		{
			if (!$this->canPlay()) {
				// This currently breaks the game.
				/*
				echo $_SESSION['Bonus'][0];
				exit;
				*/
				
				// This should fix it temporarily
				unset($_SESSION['Bonus'][0]);
			}
		
			$GLOBALS['base'] = (isset($_REQUEST['b'])) ? (int)$_REQUEST['b'] : 1;		
			$GLOBALS['lines'] = (isset($_REQUEST['l'])) ? (int)$_REQUEST['l'] : 1;
		
			$columns = array();
			for ($i=1; $i<=5; $i++) {
				$SlotsItems = array();
				for ($j=1; $j<=3; $j++) {
					//randomize();
					//array_rand($this->_objItems, 1)
					$SlotsItems[] = $this->_objItems[array_rand($this->_objItems, 1)];
				}
				$columns[] = $SlotsItems;
			}
			//print_r($columns);
			
			
			$LinesMatch = array();
			foreach($this->Lines as $i => $v) {
				$CurrentLine = array();
				for ($rr=0; $rr<5; $rr++) {
					$CurrentLine[] = $columns[$v[$rr]->x][$v[$rr]->y];
				}
				
				$r = $this->CheckLine($i, $CurrentLine);
				if ($r !== '') {
					$LinesMatch[] = $i . '=' . $r;
				}
				//echo $i."====> " . $this->CheckLine($CurrentLine) . "\n";
				//print_r($CurrentLine);
				
				if ($i === ($GLOBALS['lines']-1)) break;
			}
			
			$StrItems = array();
			foreach($columns as $i => $v) {
				$StrItem = implode(',', $v);
				$StrItems[] = $StrItem;
			}
			echo implode('|', $StrItems) . '|' . implode(',', $LinesMatch) . '|' . implode(',', $this->_AwardValues);
			//echo "objItem12,objItem6,objItem4|objItem12,objItem12,objItem9|objItem12,objItem9,objItem6|objItem9,objItem4,objItem12|objItem9,objItem6,objItem7||";
			
			exit;
		}
	}
?>
