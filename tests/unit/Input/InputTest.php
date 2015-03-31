<?php


	namespace LiftKit\Tests\Input;

	use LiftKit\Input\Input;
	use PHPUnit_Framework_TestCase;


	class InputTest extends PHPUnit_Framework_TestCase
	{


		public function testRecursiveToArray ()
		{
			$seed = [
				'value' => 1,
				'array' => [
					1,
					2,
					3,
					4,
					'object' => (object) [
						'test1' => 1,
						'test2' => 2,
						'test3' => 3,
						'test4' => 4,
					]
				],
				'object' => (object) [
					'test1' => 1,
					'test2' => 2,
					'test3' => 3,
					'test4' => 4,
				]
			];

			$input = new Input($seed);

			$input->recursiveToArray();

			$this->assertEquals(
				[
					'value' => 1,
					'array' => [
						1,
						2,
						3,
						4,
						'object' => [
							'test1' => 1,
							'test2' => 2,
							'test3' => 3,
							'test4' => 4,
						]
					],
					'object' => [
						'test1' => 1,
						'test2' => 2,
						'test3' => 3,
						'test4' => 4,
					]
				],
				$input->recursiveToArray()
			);
		}
	}