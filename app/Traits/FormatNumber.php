<?php

namespace App\Traits;

use Illuminate\Support\Number;
use Carbon\Carbon;

trait FormatNumber{

	public function formatWithPrecision($number, $comma = true){
		if($comma){
			// return Number::format($number, app('company')['number_precision']);
			return number_format($number, 2, ".", "");
		}else{
			//return str_replace(',', '', Number::format($number, app('company')['number_precision']));

			return number_format($number, 2, ".", ",");
		}
	}

	public function formatQuantity($number){
		// return str_replace(',', '', Number::format($number, app('company')['quantity_precision']));
		return number_format($number, 2, ".", "");
	}

	public function spell($number){
		// return Number::spell($number);
		return $number;
	}

}
