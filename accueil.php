<?php

$link_db = connect_to_db();
$honeys = get_all_honeys($link_db);
close_db($link_db);

function afficheMiels() {
	global $honeys;
	global $admin;
	
	foreach ($honeys as $honeyData) {
		if (isset($admin)) {
			$honeyData["admin"] = true;
		} else {
		$honeyData["admin"] = false;}
		$honey = new Miel($honeyData);

		echo $honey->displayProduct();
	}
}

?>


<div id="accueil">
	<?php afficheMiels(); ?>
</div>
