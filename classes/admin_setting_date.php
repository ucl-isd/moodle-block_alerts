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

namespace block_alerts;

/**
 * Class to render input of type url in settings pages.
 * @package block_alerts
 * @copyright 2023 Stuart Lamour
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class admin_setting_date extends \admin_setting_configtext {

    /**
     * Config url constructor
     *
     * @param string $name unique ascii name, either 'mysetting' for settings that in config, or 'myplugin/mysetting'
     * for ones in config_plugins.
     * @param string $visiblename localised
     * @param string $description long localised info
     * @param string $defaultsetting
     */
    public function __construct($name, $visiblename, $description, $defaultsetting) {
        parent::__construct($name, $visiblename, $description, $defaultsetting, PARAM_RAW, 50);
    }

    /**
     * Generate the HTML output.
     *
     * @param array $data An array of checked values
     * @param string $query
     * @return string HMTL field
     */
    public function output_html($data, $query=''): string {
        $default = $this->get_defaultsetting();
        return format_admin_setting($this, $this->visiblename,
                    '<div class="form-text defaultsnext">
                    <input type="date"
                    id="'.$this->get_id().'"
                    class="form-control"
                    size="10"
                    name="'.$this->get_full_name().'"
                    value="'.s($data).'" /></div>',
                    $this->description, true, '', $default, $query);
    }
}
