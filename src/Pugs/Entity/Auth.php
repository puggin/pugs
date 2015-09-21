<?php

namespace Pugs\Entity;

use Pugs\Application\Model;

class Auth extends Model
{
	protected $fillable = [
		'token', 'expires_at'
	];

}