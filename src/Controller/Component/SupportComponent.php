<?php

namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;


// Компонент вспомогательных функций
class SupportComponent extends Component{
    

    public function mimeTypeCheck($file = null, $file_size){

        //debug($file);
        //print_r($file);
        
        $blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
        
        foreach ($blacklist as $item){
            
            if(preg_match("/$item\$/i", $file['name'])){
                
                $ne_tot = false;
                return $ne_tot;
                break;
            }
            $type = $file['type'];
            $size = $file['size'];
            //debug($type);
            if (($type != "image/jpg") && ($type != "image/jpeg") && ($type != "image/png") && ($type != "image/gif")){
                $ne_tot = false;
                return $ne_tot;
                break;
            }
            
            if ($size > $file_size){
                
                $ne_tot = false;
                return $ne_tot;
                break;
            }
            
                $ne_tot = true;
        }
        //debug($ne_tot);
        //print_r($ne_tot);
        //exit();
        return $ne_tot;
    }
    
    public function customResizeImg($file = array(), $pos_x = 0, $pos_y = 0, $img_width, $img_height, $crup_w, $crup_h){
		if(!is_uploaded_file($file['tmp_name'])){
			return false;
		}
		
        $file['name'] = strtolower($file['name']);
        $ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['name']));
        //debug($file['name']);

		  $fileName = $this->newNameFile($ext);

        
        $path = WWW_ROOT . '/img/upload/' . $fileName;
        
		if(!move_uploaded_file($file['tmp_name'], $path)){
			return false;
		}        

        $resize = $this->resizeCropImg($path, $pos_x, $pos_y, $img_width, $img_height, $crup_w, $crup_h, $ext);
        
		if($resize == true){
		  
          return $fileName;
		}else{
		  return false;
		}        
        
       
    }
    
	public function newNameFile($ext){
		$name = md5(microtime()) . ".{$ext}";
		if(is_file(WWW_ROOT . '/img/upload_messages/' . $name)){
			$name = $this->newNameFile($ext);
		}
		return $name;
	} 
    
	public function resizeCropImg($target, $pos_x = 0, $pos_y = 0, $wmax = 1024, $hmax = 768, $crup_w, $crup_h, $ext){
		/*
		$target - путь к оригинальному файлу
		$pos_x - позиция по X
        $pos_y - позиция по Y
		$wmax - максимальная ширина
		$hmax - максимальная высота
        $crup_w - ширина обреза
        $crup_h - высота обреза
		$ext - расширение файла
        $type - нужно ли подгонять размер под ширину или длину 1-нет 2-да
		*/
        //debug($target);
		list($w_orig, $h_orig) = getimagesize($target);
        if($crup_w){
            $w_orig = $crup_w;
        }else{
            $w_orig = 768;
        }
        if($crup_h){
            $h_orig = $crup_h;
        }else{
            $h_orig = 515;
        }
        
		$ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

        
        if($w_orig <= $wmax){
            $wmax = $w_orig;
            $hmax = $h_orig;
        }
        
        if(!$crup_w || $crup_w == ''){
            $crup_w = $wmax;
        }
        
        if(!$crup_h || $crup_h == ''){
            $crup_h = $hmax;
        }
        
        if($pos_x == ''){
            $pos_x = 0;
        } 
        
        if($pos_y == ''){
            $pos_y = 0;
        }
        
        $proporziya = $crup_w / $crup_h;                 

        if(($crup_w / $crup_h) > 1){
			$wmax = $hmax * $proporziya;
		}else{
			$hmax = $wmax / $proporziya;
		}        
        
		
		$img = "";
		// imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
		switch($ext){
			case("gif"):
				$img = @imagecreatefromgif($target);
				break;
			case("png"):
				$img = @imagecreatefrompng($target);
				break;
			default:
				$img = @imagecreatefromjpeg($target);
   
		}
        
        if(!$img){
            $result = false;
        }else{
            $result = true;
            
    		$newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки
    		
    		if($ext == "png"){
    			imagesavealpha($newImg, true); // сохранение альфа канала
    			$transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
    			imagefill($newImg, 0, 0, $transPng); // заливка  
    		}
    		
    		//imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
            
            
            imagecopyresampled($newImg, $img, 0, 0, $pos_x,$pos_y, $wmax, $hmax, $crup_w, $crup_h); // копируем и ресайзим изображение            
            
            
    		switch($ext){
    			case("gif"):
    				imagegif($newImg, $target);
    				break;
    			case("png"):
    				imagepng($newImg, $target);
    				break;
    			default:
    				imagejpeg($newImg, $target);    
    		}
    		imagedestroy($newImg);            
        }


        
        return $result;
	}           

    
    private function _rus2translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'w',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '',  'ы' => 'y',   'ъ' => '',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',
            
            'А' => 'A',   'Б' => 'B',   'В' => 'W',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',
        );
        return strtr($string, $converter);
    }
    
    public function translit($str) {
        // переводим в транслит
        $str = $this->_rus2translit($str);
        // в нижний регистр
        $str = strtolower($str);
        // заменям все ненужное нам на "-"
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");
        return $str;
    }
    
	public function customUploadlogo($file = array(), $img_width, $img_height, $type = 1){
		if(!is_uploaded_file($file['tmp_name'])){
			return false;
		}
		$file['name'] = strtolower($file['name']);
        $ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['name']));
        //debug($file['name']);
        //debug($ext);
		$fileName = $this->newNameFile($ext);
		$path = WWW_ROOT . '/img/upload/' . $fileName;
		//$path_th = WWW_ROOT . '/img/upload/thumbs/' . $fileName;
		if(!move_uploaded_file($file['tmp_name'], $path)){
			return false;
		}

        $resize = $this->resizeNewImg($path, $img_width, $img_height, $ext, $type);
		//$this->data[$this->alias]['file'] = $fileName;
		
        //debug($fileName);
        //exit();
		if($resize == true){
		  
          return $fileName;
		}else{
		  return false;
		}
	}
    
	public function uploadFile($file = array()){
		if(!is_uploaded_file($file['tmp_name'])){
			return false;
		}
		$file['name'] = strtolower($file['name']);
        $ext = strtolower(preg_replace("#.+\.([a-z]+)$#", "$1", $file['name']));
        //debug($file['name']);
        //debug($ext);
		$fileName = $this->newNameFile($ext);
		$path = WWW_ROOT . '/img/upload/' . $fileName;
		//$path_th = WWW_ROOT . '/img/upload/thumbs/' . $fileName;
		if(!move_uploaded_file($file['tmp_name'], $path)){
			return false;
		}
		  
        return $fileName;

	}    
    
    
	public function resizeNewImg($target, $wmax = 350, $hmax = 350, $ext, $type){
		/*
		$target - путь к оригинальному файлу
		$dest - путь сохранения обработанного файла
		$wmax - максимальная ширина
		$hmax - максимальная высота
		$ext - расширение файла
        $type - нужно ли подгонять размер под ширину или длину 1-нет 2-да
		*/
        //debug($target);
		list($w_orig, $h_orig) = getimagesize($target);
        
        
        if($w_orig <= $wmax){
            $wmax = $w_orig;
            $hmax = $h_orig;
        }
        
        if($type == 3){
            $w_orig = $wmax;
            $h_orig = $hmax;
        }                
        
		$ratio = $w_orig / $h_orig; // =1 - квадрат, <1 - альбомная, >1 - книжная

		
        if($type == 1){
            if(($wmax / $hmax) > $ratio){
    			$wmax = $hmax * $ratio;
    		}else{
    			$hmax = $wmax / $ratio;
    		}
        }
        
        if($type == 2){
            if($ratio > 1){
    			$wmax = $hmax * $ratio;
    		}else{
    		  
              // разница между высотой и шириной 
              $diffrent = $h_orig / $w_orig;
              
    			$wmax = $hmax;
                $hmax = round($hmax * $diffrent, 0);

    		}            
        }
        
        // Если тип три то четкий размер как задан
        if($type == 3){
   			$wmax = $wmax;
 			$hmax = $hmax;
            $w_orig = $wmax;
            $h_orig = $hmax;
        }                
        
		
		$img = "";
		// imagecreatefromjpeg | imagecreatefromgif | imagecreatefrompng
		switch($ext){
			case("gif"):
				$img = @imagecreatefromgif($target);
				break;
			case("png"):
				$img = @imagecreatefrompng($target);
				break;
			default:
				$img = @imagecreatefromjpeg($target);
   
		}
        
        if(!$img){
            $result = false;
        }else{
            $result = true;
            
    		$newImg = imagecreatetruecolor($wmax, $hmax); // создаем оболочку для новой картинки
    		
    		if($ext == "png"){
    			imagesavealpha($newImg, true); // сохранение альфа канала
    			$transPng = imagecolorallocatealpha($newImg,0,0,0,127); // добавляем прозрачность
    			imagefill($newImg, 0, 0, $transPng); // заливка  
    		}
    		
    		imagecopyresampled($newImg, $img, 0, 0, 0, 0, $wmax, $hmax, $w_orig, $h_orig); // копируем и ресайзим изображение
           
            
    		switch($ext){
    			case("gif"):
    				imagegif($newImg, $target);
    				break;
    			case("png"):
    				imagepng($newImg, $target);
    				break;
    			default:
    				imagejpeg($newImg, $target);    
    		}
    		imagedestroy($newImg);            
        }


        
        return $result;
	}        
    
   
             
}