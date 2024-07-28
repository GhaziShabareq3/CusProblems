<?php declare(strict_types = 0);

/**
 * Problems widget view.
 *
 * @var CView $this
 * @var array $data
 */

use Modules\CusProblems\Includes\WidgetProblems;

$item = new WidgetProblems($data);

(new CWidgetView($data))
	->addItem($item)
	->show();