<?php 
    class MyCaptcha{

      private function getStr(){
        $string = '';
    
        for($i=0;$i<4;$i++){
          $arr = [[48,57],[65,90],[97,122]];
          $arrRnd = array_rand($arr,1);
          $a = $arr[$arrRnd];
          $string .= chr(rand($a[0],$a[1]));
        }
        return $string;
      }

      private function imgSaver(){
        $image = imagecreate(100, 30);
        $white = imagecolorallocate($image, 255, 255, 255);
        $color = imagecolorallocate($image, 200, 100, 90); // red
        $rndm = self::getStr();
        imagestring($image, 5, 30, 5, $rndm, $color);
        imagepng($image,"captcha/$rndm.png");
        imagedestroy($image);

        return $rndm;
      }

      public static function get(){
        return self::imgSaver();
      }
    }
    MyCaptcha::get();
?>