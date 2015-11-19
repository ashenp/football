<?php
class image extends file {
	
	  /**
     * mark logo for an image
     *
     * @param string $oriImageFile
     * @param string $targetFileName
     * @return boolean
     */
	static public function markLogo($oriImageFile, $logFileName="", $targetFileName=""){
		if (empty($targetFileName)) {
			$targetFileName = $oriImageFile;
		}
		if (empty($logFileName)) {
			$logFileName = DEFAULT_IMAGE_LOGO;
		}
		$oriImageFile = self::getFullFilePath($oriImageFile);
		$targetFileName  = self::getFullFilePath($targetFileName);
		
		//$logFileName = self::getFullFilePath($logFileName);
		$image = self::createImage($oriImageFile);
		$imageWidth = imagesx($image);
		$imageHeight = imagesy($image);

		// for logo
		$logo = self::createImage($logFileName);
		$logoWidth = imagesx($logo);
		$logoHeight = imagesy($logo);
		$x = self::getLogoPosX($imageWidth,$logoWidth);
		$y = self::getLogoPosY($imageHeight,$logoHeight);
		imagecopy($image, $logo, $x, $y, 0, 0, $logoWidth,$logoHeight);
		
		// make file
		return self::saveImage($image, $targetFileName);
	}
	
    /**
     * get an image object from file
     *
     * @param string $imageName
     * @return image
     */
	static private function createImage($imageName, $ext=""){
		if (empty($ext)) {
			$ext = strtolower(substr($imageName, strrpos($imageName, "."), 
									strlen($imageName)-strrpos($imageName, ".")));
		}
		if($ext==".jpeg" || $ext==".jpg"){
			return imagecreatefromjpeg($imageName);
		}elseif($ext==".gif"){
			return imagecreatefromgif($imageName);
		}elseif($ext==".png"){
			return imagecreatefrompng($imageName);
		}
		return false;
	}
	
    /**
     * get an image object from file
     *
     * @param string $imageName
     * @return image
     */
	static private function saveImage($image, $targetFileName){
		$ext = self::getExtName($targetFileName);
		if($ext=="jpeg" || $ext=="jpg"){
			return imagejpeg($image, $targetFileName);
		} elseif($ext=="gif"){
			return imagegif($image, $targetFileName);
		}elseif($ext=="png"){
			return imagepng($image, $targetFileName);
		}
		return false;
	}
   /**
	 * 获取扩展名
	 *
	 * @param string $fileName 文件名称
	 * @return string 文件扩展名
	 */
	static public function getExtName($fileName){
		$tmpFile = explode(".", $fileName);
		if (count($tmpFile) == 1) {
			return "";
		}
		return isset($tmpFile[count($tmpFile)-1])?strtolower($tmpFile[count($tmpFile)-1]) : "";		
	}
    /**
     * resize a big image
     *
     * @param string $oriImageFile
     * @param string $targetFileName
     * @return boolean
     */
	static public function resizeToBig($oriImageFile, $isMark = true){
		$targetFileName = substr_replace($oriImageFile, '4', 0, 1);
		$r = self::resize($oriImageFile, $targetFileName, MAX_IMAGE_WIDTH, MAX_IMAGE_HEIGHT);
		if ($r && $isMark === true) {
			$result = self::markLogo($targetFileName);
		}
		return $r;
	}
	
    /**
     * resize a big image
     *
     * @param string $oriImageFile
     * @param string $targetFileName
     * @return boolean
     */
	static public function resizeToSmall($oriImageFile, $isMark = false){
		$targetFileName = substr_replace($oriImageFile, '3', 0, 1);
		$r = self::resize($oriImageFile, $targetFileName, SMALL_IMAGE_WIDTH, SMALL_IMAGE_HEIGHT);
		if ($r && $isMark === true) {
			return self::markLogo($targetFileName);
		}
		return $r;		
	}
	
    /**
     * resize an image
     *
     * @param string $oriImageFile
     * @param string $targetFileName
     * @param integer $maxWidth
     * @param integer $maxHeight
     * @return boolean
     */
	static public function resize($oriImageFile, $targetFileName, $maxWidth, $maxHeight, $iswater = false){
		$oriImageFile   = self::getFullFilePath($oriImageFile);
		$targetFileName = self::getFullFilePath($targetFileName);
		
		$oldImage = self::createImage($oriImageFile);
		$oldWidth = imagesx($oldImage);
		$oldHeight = imagesy($oldImage);
		$newWidth = $oldWidth;
		$newHeight = $oldHeight;
		if($oldWidth > $maxWidth && $oldHeight < $maxHeight){
			$rapporto = $maxWidth / $oldWidth;
			$newWidth = $oldWidth * $rapporto;
			$newHeight = $oldHeight * $rapporto;
		}else if($oldWidth < $maxWidth && $oldHeight > $maxHeight){
			$rapporto = $maxHeight / $oldHeight;
			$newWidth = $oldWidth * $rapporto;
			$newHeight = $oldHeight * $rapporto;
		}else if($oldWidth > $maxWidth && $oldHeight > $maxHeight){
			$rapporto_1 = $maxWidth / $oldWidth;
			$rapporto_2 = $maxHeight / $oldHeight;
			if($rapporto_1 > $rapporto_2){
				$rapporto = $rapporto_2;
			}else{
				$rapporto = $rapporto_1;
			}
			$newWidth = $oldWidth * $rapporto;
			$newHeight = $oldHeight * $rapporto;
		}

		$newImage = imagecreatetruecolor($newWidth, $newHeight);
		imagecopyresized($newImage, $oldImage, 0, 0, 0, 0, $newWidth, $newHeight, $oldWidth, $oldHeight);
		
		// make file
		return self::saveImage($newImage, $targetFileName);
	}
	
    /**
     * make a big thumb
     *
     * @param string $oriImageFile
     * @param string $targetFileName
     * @return boolean
     */
	static public function makeThumb($oriImageFile, $targetFileName = ''){
		if($targetFileName == '') {
			$targetFileName = substr_replace($oriImageFile, '2', 0, 1);
		}
		return self::makeThumbFile($oriImageFile, $targetFileName, DEFAULT_THUMB_WIDTH, DEFAULT_THUMB_HEIGHT);
	}
	
    /**
     * make a small thumb
     *
     * @param string $oriImageFile
     * @param string $targetFileName
     * @return boolean
     */
	static public function makeSmallThumb($oriImageFile, $targetFileName = ''){
		if($targetFileName == '') {
			$targetFileName = substr_replace($oriImageFile, '1', 0, 1);
		}
		return self::makeThumbFile($oriImageFile, $targetFileName,SMALL_THUMB_WIDTH, SMALL_THUMB_HEIGHT);
	}
	
    /**
     * make a thumb
     *
     * @param string $oriImageFile
     * @param string $targetFileName
     * @param integer $thumbWidth
     * @param integer $thumbHeight
     * @return boolean
     */
	static public function makeThumbFile($oriImageFile, $targetFileName, $thumbWidth, $thumbHeight){
		$oriImageFile = self::getFullFilePath($oriImageFile);
		$targetFileName = self::getFullFilePath($targetFileName);
	 
		$image = self::createImage($oriImageFile);
		$imageWidth  = imagesx($image);
		$imageHeight = imagesy($image);
		
		$rapporto = $thumbWidth / $imageWidth;
		if($imageWidth < $imageHeight){
			$rapporto = $thumbHeight / $imageHeight;
		}
		
		$thumbWidth  = intval($imageWidth * $rapporto);
		$thumbHeight = intval($imageHeight * $rapporto);

		$thumb = imagecreatetruecolor($thumbWidth, $thumbHeight);
		imagecopyresized($thumb, $image, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $imageWidth, $imageHeight);
		return self::saveImage($thumb, $targetFileName);
	}

	static private function getLogoPosX($imageW, $logoW){
		$posX = DEFAULT_IMAGE_LOGO_POS_X;
		switch($posX){
			case 'CENTER':
				return $imageW / 2 - $logoW / 2; 
			case 'REIGHT':
				return $imageW - $logoW;
		}
		return 0;		// else posX is LEFT
	}
        
	static private function getLogoPosY($imageH,$logoH){
		$posY = DEFAULT_IMAGE_LOGO_POS_Y;
		switch($posY){
			case 'MIDDLE':
				return $imageH / 2 - $logoH / 2;
			case 'BOTTOM':
				return $imageH - $logoH;
		}
		return 0;		// else posY is TOP
	}
	
    /**
     * get width and height
     *
     * @param string $imageFile
     * @return iObject
     */
	static public function getWidthAndHeight($imageFile){
		$imageFile = self::getFullFilePath($imageFile);
		$info = getimagesize($imageFile);
		if(!empty($info)) {
			return array('width'=>$info[0], 'height'=>$info[1]);
		}
		return array("width"=>0, "height"=>0);
	}
	 
	
	
 	
	
}


?>