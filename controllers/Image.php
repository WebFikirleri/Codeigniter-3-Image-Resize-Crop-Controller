<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends WF_Controller {
	
	public $assets_path = 'assets';
	
	public function resize() {
		$src = $this->input->get('src');
		$w = $this->input->get('w');
		$h = $this->input->get('h');
		$in = FCPATH.$this->assets_path.DIRECTORY_SEPARATOR.$src;
		$out = dirname($in).DIRECTORY_SEPARATOR.'thumb'.DIRECTORY_SEPARATOR.'thumb_'.$w.'_'.$h.'_'.basename($src);
		$imgnfo = getimagesize($in);
		if ($in == false || $in == '' || !file_exists($in)) $in = FCPATH.$this->assets_path.DIRECTORY_SEPARATOR.'no-image.jpg';
		if (!is_dir(dirname($out))) mkdir(dirname($out),0755,true);
		if (!file_exists($out)) {
			$dim = ($imgnfo[0]/$imgnfo[1] > $w/$h)?'height':'width';
			$this->load->library('image_lib');
			$this->image_lib->initialize([
					'source_image'=>$in,
					'new_image'=>$out,
					'width'=>$w,
					'height'=>$h,
					'maintain_ratio'=>true,
					'master_dim'=>$dim,
					'quality'=>70
				]);
			$this->image_lib->resize();
			$this->image_lib->clear();
			$nimgnfo = getimagesize($out);
			$crop_x = ($nimgnfo[0]-$w)/2;
			$crop_y = ($nimgnfo[1]-$h)/2;
			$this->image_lib->initialize([
					'source_image'=>$out,
					'new_image'=>$out,
					'x_axis'=>$crop_x,
					'y_axis'=>$crop_y,
					'maintain_ratio'=>false,
					'width'=>$w,
					'height'=>$h
				]);
			$this->image_lib->crop();
			$this->image_lib->clear();
		}
		header("Content-Type: {$imgnfo['mime']}");
		readfile($out);
	}
	
}
