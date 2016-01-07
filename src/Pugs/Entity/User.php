<?php

namespace Pugs\Entity;

final class User extends \Pugs\Application\Model
{
	protected $fillable = [
		'username', 'nickname', 'email'
	];

	protected $guarded = [
		'password'
	];
}