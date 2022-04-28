<?php

/**
 * This file is part of the Froxlor project.
 * Copyright (c) 2010 the Froxlor Team (see authors).
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, you can also view it online at
 * http://files.froxlor.org/misc/COPYING.txt
 *
 * @copyright  the authors
 * @author     Froxlor team <team@froxlor.org>
 * @license    http://files.froxlor.org/misc/COPYING.txt GPLv2
 */

use Froxlor\Settings;
use Froxlor\UI\Callbacks\Ftp;
use Froxlor\UI\Listing;

return [
	'ftp_list' => [
		'title' => lng('menue.ftp.accounts'),
		'icon' => 'fa-solid fa-users',
		'self_overview' => ['section' => 'ftp', 'page' => 'accounts'],
		'columns' => [
			'username' => [
				'label' => lng('login.username'),
				'field' => 'username',
			],
			'description' => [
				'label' => lng('panel.ftpdesc'),
				'field' => 'description'
			],
			'homedir' => [
				'label' => lng('panel.path'),
				'field' => 'homedir',
				'callback' => [Ftp::class, 'pathRelative']
			],
			'shell' => [
				'label' => lng('panel.shell'),
				'field' => 'shell',
				'visible' => Settings::Get('system.allow_customer_shell') == '1'
			]
		],
		'visible_columns' => Listing::getVisibleColumnsForListing('ftp_list', [
			'username',
			'description',
			'homedir',
			'shell'
		]),
		'actions' => [
			'edit' => [
				'icon' => 'fa fa-edit',
				'title' => lng('panel.edit'),
				'href' => [
					'section' => 'ftp',
					'page' => 'accounts',
					'action' => 'edit',
					'id' => ':id'
				],
			],
			'delete' => [
				'icon' => 'fa fa-trash',
				'title' => lng('panel.delete'),
				'class' => 'btn-danger',
				'href' => [
					'section' => 'ftp',
					'page' => 'accounts',
					'action' => 'delete',
					'id' => ':id'
				],
			]
		]
	]
];
