<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use DB;

class ResumeModel extends Model
{
    protected static $TABLE = 'resume';

    protected static function addResume($filename){
      try {
        DB::table(ResumeModel::$TABLE)->insert([
        'filename'=>$filename,
        'date'=>date('Y-m-d H:i:s')
        ]);
        $result['status']='success';
        $result['message']='Insert Success';
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
    protected static function getResume(){
      try{
        $result[0] = DB::table(ResumeModel::$TABLE)->first();
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      return $result;
    }
    protected static function deleteResume(){
      try{
        $file = DB::table(ResumeModel::$TABLE)->first();
        $filename = $file->filename;
        Storage::delete($filename);
        DB::table(ResumeModel::$TABLE)->truncate();
        $result['status']='success';
        $result['message']='Delete Success';
      }catch(QueryException $ex){
        $result['status']='error';
        $result['message']=$ex->getMessage();
      }
      echo $result['status'];
      return $result;
    }
}
