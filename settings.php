<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Faculty block settings
 *
 * @package   block_faculty_tbird
 * @copyright 2013 onwards Johan Reinalda (http://www.thunderbird.edu)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die;

if ($ADMIN->fulltree) {

	$settings->add(new admin_setting_configtext('block_faculty_tbird/configtitle', get_string('configtitle', 'block_faculty_tbird'),
				get_string('configtitledescr', 'block_faculty_tbird'),
				get_string('configtitledefault', 'block_faculty_tbird'), PARAM_RAW, 30 ));
	
	// select what roles to use as faculty
	$choices = Array();
	// get all the global roles
	$allroles = get_all_roles();
	foreach ($allroles as $role) {
		$choices[$role->id] = $role->name;
	}
	$default = Array();
	$default[3] = 1;	// 3 = Teacher
	// and then allow each role to be selected for showing in the roster reports.
	$settings->add(new admin_setting_configmulticheckbox('block_faculty_tbird/facultyroles', get_string('facultyroles', 'block_faculty_tbird'),
			get_string('facultyrolesdescription', 'block_faculty_tbird'), $default, $choices));

	$settings->add(new admin_setting_configcheckbox('block_faculty_tbird/configshowifempty', get_string('configshowifempty', 'block_faculty_tbird'),
				get_string('configshowifemptydescr', 'block_faculty_tbird'), 0));

	$settings->add(new admin_setting_configcheckbox('block_faculty_tbird/configallownewtitle', get_string('configallownewtitle', 'block_faculty_tbird'),
				get_string('configallownewtitledescr', 'block_faculty_tbird'), 0));

	$settings->add(new admin_setting_configcheckbox('block_faculty_tbird/configallowcustom', get_string('configallowcustom', 'block_faculty_tbird'),
				get_string('configallowcustomdescr', 'block_faculty_tbird'), 0));

	$settings->add(new admin_setting_confightmleditor('block_faculty_tbird/configfooter', get_string('configfooter', 'block_faculty_tbird'),
				get_string('configfooterdescr', 'block_faculty_tbird'), ''));
}