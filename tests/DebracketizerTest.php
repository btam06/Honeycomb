<?php

class MethodSortTest extends \Codeception\Test\Unit
{

	protected function _before()
	{

	}

	protected function _after()
	{
	}

	public function testReplacement()
	{
        $template = "Hello {{ name }}, how are you? I am {{ feeling }}";
        $params   = [
            'name' => 'Avery',
            'feeling' => 'fine'
        ];

        $this->assertEquals(
            Honeycomb\debracketize($template, $params),
            "Hello Avery, how are you? I am fine"
        );
    }
}
