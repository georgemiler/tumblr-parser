<?php

namespace TheFox\Tumblr\Element\Post;

class PhotosBlockElement extends PhotoBlockElement{
	
	public function render(){
		#print __CLASS__.'->'.__FUNCTION__.': "'.$this->getPath().'"'."\n";
		
		$html = '';
		$photos = $this->getContent();
		#\Doctrine\Common\Util\Debug::dump($photos);
		
		if($photos && is_array($photos)){
			foreach($photos as $photoId => $photo){
				$this->setContent($photo);
				$this->setElementsValues();
				$html .= parent::render();
			}
		}
		
		// Reset original content.
		$this->setContent($photos);
		
		return $html;
	}
	
}
