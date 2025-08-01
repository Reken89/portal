<?php

namespace App\Core\Dto;

/**
 * BaseDTO class
 */
abstract class BaseDto
{
    /**
     * BaseDto constructor
     *
     * @param array $data
     */
	public function __construct(array $data)
	{
		foreach ($data as $property => $value) {
			$this->$property = $value;
		}
	}
}

