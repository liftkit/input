<?php

	/*
	 *
	 *	LiftKit MVC PHP Framework
	 *
	 *
	 */


	namespace LiftKit\Input;

	use LiftKit\Collection\Collection;


	class Input extends Collection
	{


		public function recursiveToArray ($seed = null)
		{
			if (is_null($seed)) {
				$seed = $this->toArray();
			} else {
				$seed = (array) $seed;
			}

			foreach ($seed as $key => $value) {
				if (is_array($value) || is_object($value)) {
					$seed[$key] = $this->recursiveToArray($value);
				}
			}

			return $seed;
		}
	}