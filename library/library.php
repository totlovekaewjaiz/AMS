<?
	
	function ImageFlip ( $imgsrc, $mode ) {

		$width                        =    imagesx ( $imgsrc );
		$height                       =    imagesy ( $imgsrc );

		$src_x                        =    0;
		$src_y                        =    0;
		$src_width                    =    $width;
		$src_height                   =    $height;

		switch ( $mode )
		{

			case '1': //vertical
				$src_y                =    $height -1;
				$src_height           =    -$height;
			break;

			case '2': //horizontal
				$src_x                =    $width -1;
				$src_width            =    -$width;
			break;

			case '3': //both
				$src_x                =    $width -1;
				$src_y                =    $height -1;
				$src_width            =    -$width;
				$src_height           =    -$height;
			break;

			default:
				return $imgsrc;

		}

		$imgdest                    =    imagecreatetruecolor ( $width, $height );

		if ( imagecopyresampled ( $imgdest, $imgsrc, 0, 0, $src_x, $src_y , $width, $height, $src_width, $src_height ) )
		{
			return $imgdest;
		}

		return $imgsrc;

	}
		
?>