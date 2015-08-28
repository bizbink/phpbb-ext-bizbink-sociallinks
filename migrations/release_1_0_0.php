<?php

/*
 * phpBB Extension - Social Links
 * Copyright (C) 2015 Matthew Vanderende <matthew@vanderende.ca>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace bizbink\sociallinks\migrations;

class release_1_0_0 extends \phpbb\db\migration\migration {

    public function effectively_installed() {
        if(!isset($this->config['bizbink_sociallinks_twitter'])) {
            return FALSE;
        }
        if(!isset($this->config['bizbink_sociallinks_google_plus'])) {
            return FALSE;
        }
        return TRUE;
    }

    static public function depends_on() {
        return array('\phpbb\db\migration\data\v310\alpha2');
    }

    public function update_data() {
        return array(
            array('config.add', array('bizbink_sociallinks_twitter', '')),
            array('config.add', array('bizbink_sociallinks_google_plus', '')),
            array('module.add', array(
                    'acp',
                    'ACP_CAT_DOT_MODS',
                    'ACP_BIZBINK_SOCIALLINKS_TITLE'
                )),
            array('module.add', array(
                    'acp',
                    'ACP_BIZBINK_SOCIALLINKS_TITLE',
                    array(
                        'module_basename' => '\bizbink\sociallinks\acp\main_module',
                        'modes' => array('settings'),
                    ),
                )),
        );
    }

}
