<?php
namespace App\Helpers;

class ImageResize{
	/*image resize start*/
	   public static function imgResize($target,$newcopy,$width,$height,$file_ext){
			   //list($w_original,$h_original)=getimagesize($target);
			   list($w_original,$h_original)=getimagesize($target);
			  $scale_ratio=$w_original/$h_original;
			  if(($width/$height)>$scale_ratio){
			    $width=$height*$scale_ratio;
			  }else{
			    $height=$width/$scale_ratio;
			  }

			  $img="";
			  if($file_ext=="gif"||$file_ext=="GIF"){
			    $img=imagecreatefromgif($target);
			  }elseif($file_ext=="png"||$file_ext=="PNG"){
			    $img=imagecreatefrompng($target);
			  }else{
			    $img=imagecreatefromjpeg($target);
			  }

			  $tci=imagecreatetruecolor($width,$height);


			  imagecopyresampled($tci,$img,0,0,0,0,$width,$height,$w_original,$h_original);
			 
			  imagejpeg($tci,$newcopy,80);
	 
	 }
	  /*image resize stop*/
	  public static function name($name){
	  	echo'asshole'.$name;
	  }
}


?>