<?php


namespace App\Wheel\File;


use http\Env\Request;
use Illuminate\Support\Facades\Storage;


class File
{
    public static function uploadFiles(Request $request){
        $max_file_size = 50*1024*1000;//允许一次的最大上传大小 50mb
        $sum_size = 0;
        $files = $request->getFiles();
        $forbid_type = ['exe','bat']; //禁止上传的文件类型
        if(!is_array($files)){ //前端应该是一个数组
            return false;
        }
        foreach ($files as $file){

            $file_extension = $file->getClientOriginalExtension();//获取文件后缀名
            if(in_array($file_extension,$forbid_type)){
                return false;
            }

            $file_name = $file->getClientOriginalName();//获取文件名

            $sum_size += filesize($file_name);
            if($sum_size>$max_file_size){
                return false;
            }

            //按日期创建临时文件夹
            $bool = Storage::disk()->put(date('Y-M-D').'/'.$file_name,file_get_contents($file->getRealpath()));//存到指定磁盘

            $path = Storage::url($file_name);

            return $path;

        }
    }


    public function delete(){

    }


}
