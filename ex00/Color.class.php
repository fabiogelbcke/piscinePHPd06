<?php

class Color {
      public $red;
      public $green;
      public $blue;

      public static $verbose = False;
      
      function __construct(array $kwargs){
               if (isset($kwargs['rgb']))
               {
                        $rgb = intval($kwargs['rgb']);
			$this->red = $rgb>>16;
			$this->green = $rgb>>8&255;
			$this->blue = $rgb&255;
               }
               elseif (isset($kwargs['red']) && isset($kwargs['green']) && isset($kwargs['blue']))
               {
                        $this->red = intval($kwargs['red']);
                        $this->green = intval($kwargs['green']);
                        $this->blue = intval($kwargs['blue']);
               }
               else
               {
                        echo "Invalid arguments" . PHP_EOL;
                        exit(1);
               }

               if (Color::$verbose == True)
               {
			print($this . ' constructed.' . PHP_EOL);
               }
       }

       function __destruct() {
                if (Color::$verbose == True)
                {
			print($this . ' destructed.' . PHP_EOL);
                }
       }

       public static function doc() {
		return file_get_contents('./Color.doc.txt');
	}

       public function __toString() {
                return sprintf("Color( red: %3d, green: %3d, blue: %3d )", $this->red, $this->green, $this->blue);
       }

       public function sub(Color $sub){
                $red = $this->red - $sub->red;
                $green = $this->green - $sub->green;
                $blue = $this->blue - $sub->blue;
                return new Color( array('red'=>$red, 'green'=>$green, 'blue'=>$blue));
       }

       public function add(Color $add){
                $red = $this->red + $add->red;
                $green = $this->green + $add->green;
                $blue = $this->blue + $add->blue;
                return new Color( array('red'=>$red, 'green'=>$green, 'blue'=>$blue));
       }

       public function mult($factor){
                $red = $this->red * $factor;
                $green = $this->green * $factor;
                $blue = $this->blue * $factor;
                return new Color( array('red'=>$red, 'green'=>$green, 'blue'=>$blue));
       }

       
}

?>