<?php

namespace CoreDev\LaravelSmartConnect;

use Illuminate\Support\Facades\Facade;

class Smart extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'smart';
	}
}