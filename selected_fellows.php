<?php
require 'common.php';

$all_cities = keyFormat($common->getCities(), ['id', 'name']);

$total_volunteers = $sql->getOne("SELECT COUNT(id) FROM User WHERE status='1' AND user_type='volunteer'");
$total_filled = $sql->getOne("SELECT COUNT(DISTINCT user_id) FROM FAM_UserGroupPreference UGP
	INNER JOIN User U ON UGP.user_id=U.id
	WHERE preference=1");

$verticals = [
	'2'		=> "City Team Lead",
	'19'	=> "Ed Support",
	'378'	=> "Aftercare",
	'272'	=> "Transition",
	'370'	=> "Fundraising",
	'269'	=> "Shelter Ops",
	'4'		=> "Shelter Support",
	'5'		=> "Human Capital",
	'15'	=> "Finance",
	'11'	=> "Campaigns",
	'375'	=> "Foundational Programme",
];

// Data source - https://docs.google.com/spreadsheets/d/150mVAUvisYObaW2MVUZfi2tjbKxvd2tZalB3gfr091o/edit?ts=5aacf12d#gid=675197629
$requirements = getRequirementFromSheet("https://docs.google.com/spreadsheets/d/e/2PACX-1vTf7uqEdn1CWZjwG8YALAS52jGVMABAfo1Xpb6YR3g69jSHir_govSZvFz_F_J_ACX1W50byaNE0ibS/pub?output=csv");

$applications = [];
$selected = [];

foreach ($all_cities as $city_id => $city_name) {
	foreach ($verticals as $vertical_id => $vertical_name) {

		$applications[$city_id][$vertical_id] = $sql->getOne("SELECT GROUP_CONCAT(DISTINCT U.name) as fellow_names
			FROM User U
			INNER JOIN FAM_UserStage US ON US.user_id = U.id
			INNER JOIN FAM_UserGroupPreference UGP ON UGP.user_id = U.id
			INNER JOIN City C ON ((UGP.city_id != 0 AND UGP.city_id=C.id) OR (UGP.city_id = 0 AND U.city_id=C.id))
			WHERE US.stage_id = 4
				AND US.status = 'selected'
				AND C.id = ".$city_id."
				AND US.group_id = ".$vertical_id."
			ORDER BY C.name, U.name ASC");

	}
}


// dump($applications);

// $template->addResource("js/library/DataTables/datatables.min.css", 'css');
// $template->addResource("js/library/DataTables/datatables.js", 'js');

$multiplication_factor = 3;
render();