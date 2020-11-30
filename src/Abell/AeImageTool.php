<?php

namespace Abell;

/*
 * 各种处理图片资源类的小工具
 * */
class AeImageTool
{
    // 远程图片下载
    public static function downloadImg($url='')
    {
        if (empty($url)) {
            return '';
        } else {
            $img_info = getimagesize($url);
            $suffix = static::mineSuffix()[$img_info['mime'] ?? 'image/png'];
            $fileName = uniqid() . $suffix;
            $file_url = '/images/'.date('Ymd').'/';
            $fileDir = config('server.settings.document_root').$file_url;
            static::mkdir($fileDir);
            $save_path = $fileDir.$fileName;
            $readStream = fopen($url, 'r');
            $wtriteStream = fopen($save_path, 'w');
            stream_copy_to_stream($readStream, $wtriteStream);
            return env('WEB_HOST', '127.0.0.1:9501').$file_url .$fileName;
        }
    }

    //创建目录
    public static function mkdir($dir)
    {
        is_dir($dir) || mkdir($dir, 0777, true);
    }

    //图片的mine对应的后缀
    public static function mineSuffix()
    {
        return [
            'image/png' => '.png',
            'image/jpeg' => '.jpg',
            'image/x-ms-bmp' => '.bmp',
            'image/gif' => '.gif',
            'image/tiff' => '.tif',
        ];
    }

    //图片转base64 $flag 是否加头部，1不加
    public static function imgToBase64(string $img_file, int $flag ) {
        if($flag == 1){
            return chunk_split(base64_encode(file_get_contents($img_file)));
        }
        $img_base64 = '';
        if (file_exists($img_file)) {
            $img_info = getimagesize($img_file); // 取得图片的大小，类型等
            $content = file_get_contents($img_file);
            $file_content = chunk_split(base64_encode($content)); // base64编码
            switch ($img_info[2]) {           //判读图片类型
                case 1: $img_type = "gif";
                    break;
                case 2: $img_type = "jpg";
                    break;
                case 3: $img_type = "png";
                    break;
            }

            $img_base64 = 'data:image/' . $img_type . ';base64,' . $file_content;//合成图片的base64编码


        }

        return $img_base64; //返回图片的base64
    }

    //base64转图片
    public static function base64ToImg(string $base64, string $path) {

        if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64, $result)){
            $type = $result[2];
            $new_file = $path.time().".{$type}";

            if (file_put_contents($new_file, base64_decode(str_replace($result[1], '', $base64)))){

                return $new_file;

            }else{

                return  false;

            }
        }
    }
}
