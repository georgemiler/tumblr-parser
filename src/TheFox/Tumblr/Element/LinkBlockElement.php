<?php

namespace TheFox\Tumblr\Element;

use TheFox\Tumblr\Post\LinkPost;

class LinkBlockElement extends BlockElement{
	
	public function render(){
		print __CLASS__.'->'.__FUNCTION__.': "'.$this->getName().'"'."\n";
		
		$content = $this->getContent();
		#ve($content);
		
		if($content instanceof LinkPost){
			
			#$hasTitle = (bool)$content->getTitle();
			#$hasTitle = false;
			
			foreach($this->getChildren(true) as $element){
				$elementName = strtolower($element->getTemplateName());
				
				#print '    element: '.get_class($element).', '.$element->getName()."\n";
				
				if($element instanceof VariableElement){
					if($elementName == 'url'){
						$element->setContent($content->getUrl());
					}
					elseif($elementName == 'name'){
						$element->setContent($content->getName());
					}
					elseif($elementName == 'target'){
						$element->setContent($content->getTarget());
					}
				}
			}
		}
		
		return parent::render();
	}
	
}
