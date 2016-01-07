<?php

namespace Pugs\Entity;

class User extends \Pugs\Application\Model
{
	protected $fillable = [
		'username', 'nickname', 'email'
	];

	protected $guarded = [
		'password'
	];
}