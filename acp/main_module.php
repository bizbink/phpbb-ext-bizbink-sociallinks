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

class main_module {

    var $u_action;

    function main($id, $mode) {
        global $db, $user, $auth, $template, $cache, $request;
        global $config, $phpbb_root_path, $phpbb_admin_path, $phpEx;

        $user->add_lang('acp/common');
        $this->tpl_name = 'sociallinks_body';
        $this->page_title = $user->lang('ACP_BIZBINK_SOCIALLINKS_TITLE');
        add_form_key('bizbink/sociallinks');

        if ($request->is_set_post('submit')) {
            if (!check_form_key('bizbink/sociallinks')) {
                trigger_error('FORM_INVALID');
            }

            $config->set('bizbink_sociallinks_twitter', $request->variable('bizbink_sociallinks_twitter', ''));
            $config->set('bizbink_sociallinks_google_plus', $request->variable('bizbink_sociallinks_google_plus', ''));

            trigger_error($user->lang('ACP_BIZBINK_SOCIALLINKS_SETTING_SAVED') . adm_back_link($this->u_action));
        }

        $template->assign_vars(array(
            'U_ACTION' => $this->u_action,
            'BIZBINK_SOCIALLINKS_TWITTER' => $config['bizbink_sociallinks_twitter'],
            'BIZBINK_SOCIALLINKS_GOOGLE_PLUS' => $config['bizbink_sociallinks_google_plus'],
        ));
    }

}
