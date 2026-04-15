<?php
class pixelDiv {

public final  function __construct($nombreimg = null) {

      $im = @imagecreatefrompng ($nombreimg); /* Intento de apertura */
    if (!$im) { /* Comprobar si ha fallado */
        $im  = imagecreate (30, 30); /* Crear una imagen en blanco */
        $bgc = imagecolorallocate ($im, 255,255, 255);
        imagefilledrectangle ($im, 0, 0, 30, 30, $bgc);
    }
    $this->img = $im;
    $this->imgHeight = imagesy($im);
    $this->imgWidth = imagesx($im);
    

   }//__construct
   
   
   public function printSprite($pixelWidth = 1, $id = null) {
      $sprite = '<div id="'. $id .'" style="width:'. $this->imgWidth * $pixelWidth .'px;height:'. 
      $this->imgHeight * $pixelWidth .'px">';
      $pixelCount = $this->imgWidth * $this->imgHeight;
      for ($i = 1 ; $i <= $pixelCount ; $i++) {
         $rgb = $this->getPixel($i);
         $r = $rgb[0];
         $g = $rgb[1];
         $b = $rgb[2];
         
         $sprite .= '<div style="float:left;width:'. $pixelWidth .'px;height:'. 
            $pixelWidth .'px;background:rgb('. $r .','. $g .','. $b .');"></div>';         
      }
      $sprite .= '</div>';
      echo $sprite;      
   }//printSprite
      
   
   
   private function getPixel ($index) {
      $x = $this->pixelX($index);
      $y = $this->pixelY($index);
      $rgb = ImageColorAt($this->img, $x, $y);
      return array (($rgb >> 16) & 0xFF, //RED
                  ($rgb >> 8) & 0xFF, //GREEN
                  $rgb & 0xFF );//BLUE
   }//getPixel
      
   
   private function pixelIndex($x, $y) {
      return $y * $this->imgWidth + $x +1;
   }//pixelIndex
   
   private function pixelX($index) {
      return ($index - 1) % $this->imgWidth;
   }//pixelX
   
   private function pixelY($index) {
      return intval(($index - 1) / $this->imgWidth);
   }//pixelY
   
   
   
}//class pixelDiv



