<?php

namespace TheFox\Tumblr\Element\Post;

use TheFox\Tumblr\Element\VariableElement;
use TheFox\Tumblr\Element\LabelBlockElement;

class LineBlockElement extends PostBlockElement{
	
	public function setElementsValues(){
		#parent::setElementsValues();
		
		#print __CLASS__.'->'.__FUNCTION__.': "'.$this->getName().'"'."\n";
		
		$post = $this->getContent();
		#ve($post);
		
		$hasLabel = isset($post['label']) && $post['label'];
		$label = $hasLabel ? $post['label'] : '';
		$line = isset($post['line']) && $post['line'] ? $post['line'] : '';
		$alt = isset($post['alt']) && $post['alt'] ? $post['alt'] : '';
		$name = isset($post['name']) && $post['name'] ? $post['name'] : '';
		$userNumber = isset($post['userNumber']) && $post['userNumber'] ? $post['userNumber'] : '';
		
		foreach($this->getChildren(true) as $element){
			$elementName = strtolower($element->getTemplateName());
			
			#print '    element: '.$element->getPath().', '.$elementName.PHP_EOL;
			if($element instanceof VariableElement){
				if($elementName == 'label'){
					#print '        title: '.$element->getPath().''.PHP_EOL;
					if($hasLabel){
						$element->setContent($label);
					}
				}
				elseif($elementName == 'line'){
					#print '        body: '.$element->getPath().''.PHP_EOL;
					$element->setContent($line);
				}
				elseif($elementName == 'alt'){
					#print '        body: '.$element->getPath().''.PHP_EOL;
					$element->setContent($alt);
				}
				elseif($elementName == 'name'){
					#print '        body: '.$element->getPath().''.PHP_EOL;
					$element->setContent($name);
				}
				elseif($elementName == 'usernumber'){
					#print '        body: '.$element->getPath().''.PHP_EOL;
					$element->setContent($userNumber);
				}
			}
			elseif($element instanceof LabelBlockElement){
				$element->setContent($hasLabel);
			}
		}
	}
	
}
