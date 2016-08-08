<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UploadModel extends CI_Model
{
	
        public function __construct()
        {
                parent::__construct();
        }
        public function do_upload($filename)
        {
        $config['upload_path']      = './public/upload';
        $config['allowed_types']    = 'gif|jpeg|png|jpg';
        $config['max_size']     = 1000;
        $config['max_width']        = 1999;
        $config['max_height']       = 1999;
        $this->load->library('upload', $config);
       if ($this->upload->do_upload($filename)) {
                # 上传成功，缩略处理
                $res = $this->upload->data(); //获取上传图片信息
                $datas['file0'] = $res['file_name'];
                $config_img['source_image'] = "./public/upload/" . $res['file_name'];
                $config_img['create_thumb'] = true;
                $config_img['maintain_ratio'] = true;
                $config_img['width'] = 160;
                $config_img['height'] = 160;
                //载入并初始化图像处理类
                $this->load->library('image_lib',$config_img);
                if ($this->image_lib->resize()) {
                        # 缩略ok,得到缩略图的名称
                        $rets = $res['raw_name'] . $this->image_lib->thumb_marker. $res['file_ext'];
                        $picture= "/public/upload/".$rets;
                        return $picture;
                        exit;
                } else {
                        return '1';
                }
                } else {
                        return '0';
                }
        }

}
