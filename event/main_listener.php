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

namespace bizbink\sociallinks\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Event listener
 */
class main_listener implements EventSubscriberInterface {

    static public function getSubscribedEvents() {
        return array(
            'core.user_setup' => 'load_language_on_setup',
            'core.page_header' => array(
                array('add_twitter', 0),
                array('add_google_plus', 5),
            ),
        );
    }

    /* @var \phpbb\config\config */
    protected $config;

    /* @var \phpbb\template\template */
    protected $template;

    /**
     * Constructor
     *
     * @param \phpbb\config\config      $config     Template object
     * @param \phpbb\template\template  $template   User object
     */
    public function __construct(\phpbb\config\config $config, \phpbb\template\template $template) {
        $this->config = $config;
        $this->template = $template;
        $this->template->assign_vars(array(
            'BIZBINK_SOCIALLINKS_ENABLED' => TRUE,
        ));
    }

    public function load_language_on_setup($event) {
        $lang_set_ext = $event['lang_set_ext'];
        $lang_set_ext[] = array(
            'ext_name' => 'bizbink/sociallinks',
            'lang_set' => 'common',
        );
        $event['lang_set_ext'] = $lang_set_ext;
    }

    public function add_twitter($event) {
        $this->template->assign_vars(array(
            'BIZBINK_SOCIALLINKS_TWITTER' => $this->config['bizbink_sociallinks_twitter'],
        ));
    }

    public function add_google_plus($event) {
        $this->template->assign_vars(array(
            'BIZBINK_SOCIALLINKS_GOOGLE_PLUS' => $this->config['bizbink_sociallinks_google_plus'],
        ));
    }

}
