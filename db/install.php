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
 * Faculty block install functions
 *
 * @package   block_faculty_tbird
 * @copyright 2013 onwards Johan Reinalda (http://www.thunderbird.edu)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

function xmldb_block_faculty_tbird_install() {

	$catid = 1; //default 'Other' profile category
	//insert new profile category
	//$category = new stdClass();
	//$category->name = get_string('categoryname','block_faculty_tbird');
	//$category->sortorder = 1;
	//$catid = $DB->insert_record('user_info_category',$category);
	
	// Initial insert of some new faculty related profile fields
	$field = new stdClass();
	
	//default settings; hide field for all but user.
	$field->descriptionformat = 1;
	$field->categoryid = $catid;
	$field->required = 0;
	$field->locked = 1;
	$field->visible = 0;	// admin only; i.e. not visible on profile (by user nor others)
	$field->forceunique = 0;
	$field->signup = 0;
	$field->defaultdataformat = 0;
	$field->param1 = 60;
	$field->param2 = 2048;
	//$field->defaultdata = '';
	//$field->param3 = 0;
	//$field->param4 = 
	//$field->param5 =

	$field->shortname = 'facultyheadertbird';	//NOTE: moodle does not all - or _ in this field!
	$field->name = get_string('facultytitlename','block_faculty_tbird');
	$field->datatype = 'text';
	$field->description = get_string('facultytitledescr','block_faculty_tbird');
	$field->sortorder = 1;
	addField($field);
	
	$field->shortname = 'officetbird';	//NOTE: moodle does not all - or _ in this field!
	$field->name = get_string('officename','block_faculty_tbird');
	$field->datatype = 'text';
	$field->description = get_string('officedescr','block_faculty_tbird');
	$field->sortorder = 2;
	addField($field);
	
	$field->shortname = 'officehourstbird';	//NOTE: moodle does not all - or _ in this field!
	$field->name = get_string('officehoursname','block_faculty_tbird');
	$field->datatype = 'text';
	$field->description = get_string('officehoursdescr','block_faculty_tbird');
	$field->sortorder = 3;
	addField($field);
	
	$field->shortname = 'biourltbird';	//NOTE: moodle does not all - or _ in this field!
	$field->name = get_string('facultybiourlname','block_faculty_tbird');
	$field->datatype = 'text';
	$field->description = get_string('facultybiourldescr','block_faculty_tbird');
	$field->sortorder = 4;
	addField($field);
	
	return true;
}

/**
 * addField() - add a new custom profile field to the table
 * 
 * @param Object $field - the sql row to add to the {user_info_field} table
 */
function addField($field) {
	global $DB;
	
	//see if this field name already exists. This could be if block was uninstalled and later reinstalled
	$fieldsql = "SELECT id FROM {user_info_field} WHERE shortname = '" . $field->shortname . "'";
	if(!$DB->record_exists_sql($fieldsql))
		$id = $DB->insert_record('user_info_field', $field);
	else
		echo '<p>' . get_string('customprofilefieldstring','block_faculty_tbird') . ' "' . $field->shortname . '" '
				. get_string('alreadyexists','block_faculty_tbird') . '</p>';
}
