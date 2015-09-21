<?php

namespace Pugs\Application;

use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Model extends IlluminateModel
{
	use SoftDeletes;
}