<?php

namespace Pugs\Entity;

use Pugs\Application\Model;

final class Auth extends Model
{
	protected $fillable = [
		'token', 'expires_at'
	];

}