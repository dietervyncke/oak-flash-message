<?php

namespace Tnt\FlashMessage\Facade;

use Oak\Facade;
use Tnt\FlashMessage\Contracts\FlashNotifierInterface;

class Flash extends Facade
{
	protected static function getContract(): string
	{
		return FlashNotifierInterface::class;
	}
}