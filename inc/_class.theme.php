<?PHP
class theme { 
	public function __construct($theme = "thm_default.thm") {
		if(isset($_SESSION['theme'])) { $theme = $_SESSION['theme']; }
		$this->theme_load($theme);
	}
	
	function theme_load($theme) {
		$theme_items = explode("\n", file_get_contents('assets/'.$theme));
		$this->theme_loaded = array();
		foreach($theme_items as $th) { 
			$temp = explode("=",$th); 
			$this->theme_loaded[$temp[0]]=$temp[1];
		}
	}
	
	public function theme_selector() { 
		$c = 0;
		$themes = array();
		$themes_items = array();
		$theme_files = glob("assets/*.thm");
		foreach($theme_files as $theme) { 
			$theme_items = explode("\n", file_get_contents($theme));
			foreach($theme_items as $th) { 
				$temp = explode("=",$th); 
				if($temp[0] == "name") { $themes[$c]['name'] = $temp[1]; $themes[$c]['file']= $theme; }
				$c++;
			}
		}
		$selected = "";
		echo '<form action="index.php" method="post"><select name="theme">';
		foreach($themes as $t) { 
			if(isset($_SESSION['theme'])) { 
				if($_SESSION['theme'] == substr($t['file'],6)) { $selected = "selected"; } else { $selected = ""; } 
			} else {if($t['file'] == "assets/thm_default.thm") { $selected = "selected"; } }
			echo '<option value="'.$t['file'].'" '.$selected.'>'.$t['name'].'</option>'; 
			$selected = "";
		}
		echo '</select>&nbsp;&nbsp;<input value="Change Theme" type="submit"></form>';
	}
	
	public function theme_value($property) { 
		$value = $this->theme_loaded[$property];
		return $value;
	}
	
	public function theme_icon($icon) { 
		switch($icon) { 
			case "refresh":
				echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="icon"><path d="M440-122q-121-15-200.5-105.5T160-440q0-66 26-126.5T260-672l57 57q-38 34-57.5 79T240-440q0 88 56 155.5T440-202v80Zm80 0v-80q87-16 143.5-83T720-440q0-100-70-170t-170-70h-3l44 44-56 56-140-140 140-140 56 56-44 44h3q134 0 227 93t93 227q0 121-79.5 211.5T520-122Z"/></svg>';
				break;
			case "back":
				echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="icon"><path d="M760-200v-160q0-50-35-85t-85-35H273l144 144-57 56-240-240 240-240 57 56-144 144h367q83 0 141.5 58.5T840-360v160h-80Z"/></svg>';
				break;
			case "icao":
				echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="icon"><path d="M120-120v-80h720v80H120Zm74-200L80-514l62-12 70 62 192-52-162-274 78-24 274 246 200-54q32-9 58 12t26 56q0 22-13.5 39T830-492L194-320Z"/></svg>';
				break;
			case "close":
				echo '<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" class="icon-inner"><path d="m336-280 144-144 144 144 56-56-144-144 144-144-56-56-144 144-144-144-56 56 144 144-144 144 56 56ZM480-80q-83 0-156-31.5T197-197q-54-54-85.5-127T80-480q0-83 31.5-156T197-763q54-54 127-85.5T480-880q83 0 156 31.5T763-763q54 54 85.5 127T880-480q0 83-31.5 156T763-197q-54 54-127 85.5T480-80Zm0-80q134 0 227-93t93-227q0-134-93-227t-227-93q-134 0-227 93t-93 227q0 134 93 227t227 93Zm0-320Z"/></svg>';
				break;
		}
	}
}
?>