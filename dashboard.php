<?php
require 'common.php';

$all_cities = keyFormat($common->getCities(), ['id', 'name']);
$all_cities[0] = 'All';
$all_verticals = $verticals;
$all_verticals[0] = 'All';
$city_id = i($QUERY, 'city_id', 0);
$group_id = i($QUERY, 'group_id', 0);

$city_check = '';
$city_check_ugp = '';
if($city_id) {
	$city_check = "U.city_id=$city_id AND ";
	$city_check_ugp = "((UGP.city_id != 0 AND UGP.city_id=$city_id) OR (UGP.city_id = 0 AND U.city_id=$city_id)) AND ";
}

$total_volunteers = $sql->getOne("SELECT COUNT(id) FROM User U WHERE $city_check U.status='1' AND U.user_type='volunteer'");
$total_filled = $sql->getOne("SELECT COUNT(DISTINCT user_id) FROM FAM_UserGroupPreference UGP
	INNER JOIN User U ON UGP.user_id=U.id
	WHERE $city_check_ugp preference=1 AND year=$year");
$fellowship_applications = $sql->getOne("SELECT COUNT(DISTINCT user_id) FROM FAM_UserGroupPreference UGP
	INNER JOIN User U ON UGP.user_id=U.id
	WHERE $city_check_ugp preference=1 AND UGP.year=$year AND UGP.group_id IN (SELECT id FROM `Group` WHERE type='fellow' OR type='strat')");

// Data source
// 2018-19 Requirement Sheet - https://docs.google.com/spreadsheets/d/150mVAUvisYObaW2MVUZfi2tjbKxvd2tZalB3gfr091o/edit?ts=5aacf12d#gid=675197629
// 2018-19 CSV - https://docs.google.com/spreadsheets/d/e/2PACX-1vTf7uqEdn1CWZjwG8YALAS52jGVMABAfo1Xpb6YR3g69jSHir_govSZvFz_F_J_ACX1W50byaNE0ibS/pub?output=csv
// 2019-20 Requirement Sheet - https://docs.google.com/spreadsheets/d/1FsypDbY5KDpTwD5696Hz0ZSd1UZpMyrFNauoDWvLBGQ/edit?ts=5c90f9b4#gid=675197629
$requirements = getRequirementFromSheet("https://docs.google.com/spreadsheets/d/e/2PACX-1vRzSwv2Yr5vT9YCjqRpraem2ZBpVKy2VT_UU9L2iA3364MIBiN1zhdVCX2bIq_3CIg7owI2yQx86q1q/pub?gid=675197629&single=true&output=csv");
$requirements['total_group'][0] = array_sum($requirements['total_group']);
$requirements['total_city'][0] = array_sum($requirements['total_city']);

$applicants = [];
foreach ($verticals as $this_group_id => $name) {
	$applicant_counts = $sql->getAll("SELECT U.city_id,COUNT(DISTINCT user_id) AS applicant_count FROM FAM_UserGroupPreference UGP
		INNER JOIN User U ON UGP.user_id=U.id
		WHERE $city_check_ugp preference=1 AND UGP.year=$year AND UGP.group_id=$this_group_id
		GROUP BY U.city_id");

	// Initialize the array
	$applicants[0][$this_group_id] = 0;
	foreach ($all_cities as $this_city_id => $city_name) {
		$applicants[$this_city_id][$this_group_id] = 0;
	}
	
	foreach($applicant_counts as $row) {
		$applicants[$row['city_id']][$this_group_id] = $row['applicant_count'];
		$applicants[0][$this_group_id] += $row['applicant_count'];
	}
}
// dump($applicants);

// $selected = [];
// foreach ($verticals as $this_group_id => $name) {
// 	$selected[$this_group_id] = $sql->getOne("SELECT COUNT(DISTINCT user_id) FROM FAM_UserGroupPreference UGP
// 		INNER JOIN User U ON UGP.user_id=U.id
// 		WHERE $city_check preference=1 AND group_id=$this_group_id AND UGP.status='selected'");
// }

$multiplication_factor = 3;

render();
