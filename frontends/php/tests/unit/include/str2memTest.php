﻿<?php
/*
** Zabbix
** Copyright (C) 2001-2019 Zabbix SIA
**
** This program is free software; you can redistribute it and/or modify
** it under the terms of the GNU General Public License as published by
** the Free Software Foundation; either version 2 of the License, or
** (at your option) any later version.
**
** This program is distributed in the hope that it will be useful,
** but WITHOUT ANY WARRANTY; without even the implied warranty of
** MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
** GNU General Public License for more details.
**
** You should have received a copy of the GNU General Public License
** along with this program; if not, write to the Free Software
** Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
**/


class Cstr2memTest extends PHPUnit_Framework_TestCase {

	public static function testProvider() {
		return [
			['1', strval(1)],
			['1024', strval(1024)],
			['0', strval(0)],
			['1K', strval(1024)],
			['1k', strval(1024)],
			['1M', strval(1024 * 1024)],
			['1m', strval(1024 * 1024)],
			['1G', strval(1024 * 1024 * 1024)],
			['1g', strval(1024 * 1024 * 1024)],
			['8K', strval(8 * 1024)],
			['8k', strval(8 * 1024)],
			['8M', strval(8 * 1024 * 1024)],
			['8m', strval(8 * 1024 * 1024)],
			['8G', strval(8 * 1024 * 1024 * 1024)],
			['8g', strval(8 * 1024 * 1024 * 1024)]
		];
	}

	/**
	 * @dataProvider testProvider
	 *
	 * @param string $source
	 * @param string $expected
	*/
	public function testTriggerExpressionReplaceHost($source, $expected) {
		$this->assertSame($expected, str2mem($source));
	}
}
