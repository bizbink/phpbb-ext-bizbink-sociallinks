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

namespace bizbink\sociallinks\acp;

class main_info {

    function module() {
        return array(
            'filename' => '\bizbink\sociallinks\acp\main_module',
            'title' => 'ACP_BIZBINK_SOCIALLINKS_TITLE',
            'version' => '1.0.0',
            'modes' => array(
                'settings' => array('title' => 'ACP_BIZBINK_SOCIALLINKS', 'auth' => 'ext_bizbink/sociallinks && acl_a_board', 'cat' => array('ACP_BIZBINK_SOCIALLINKS_TITLE')),
            ),
        );
    }

}
