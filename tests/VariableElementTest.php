<?php

use TheFox\Tumblr\Element\VariableElement;

class VariableElementTest extends PHPUnit_Framework_TestCase{
	
	public function testRender(){
		$element = new VariableElement();
		$element->setContent('cont1');
		
		$html = $element->render();
		$this->assertEquals('cont1', $html);
	}
	
}
