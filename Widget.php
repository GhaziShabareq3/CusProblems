<?php declare(strict_types = 0);

namespace Widgets\CusProblems;

use Zabbix\Core\CWidget;

class Widget extends CWidget {

	public function getDefaultName(): string {
		return _('CusProblems');
	}

	public function getTranslationStrings(): array {
		return [
			'class.widget.js' => [
				'Collapse' => _('Collapse'),
				'Expand' => _('Expand')
			]
		];
	}
}