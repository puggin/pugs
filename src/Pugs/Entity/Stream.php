<?php

namespace Pugs\Entity;

final class Stream extends \Pugs\Application\Model
{
	protected $fillable = [
		'user_id', 'product_id', 'points', 'subject', 'content'
	];

	public function user()
	{
		return $this->belongsTo('Pugs\Entity\User');
	}

	public function product()
	{
		return $this->belongsTo('Pugs\Entity\Product');
	}
}