<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class DocumentType extends Model
{

    
    
    public static function getAddressTypeDocument(){
        $typeArr=array();
        $typeArrObj = DocumentType::where('type','=','Address')->where('status','=',1)->get();
        foreach ($typeArrObj as $obj) {
            $typeArr[$obj->id]=$obj->type_name;
        }
        return $typeArr;
    }



    public static function getIDTypeDocument(){
        $typeArr=array();
        $typeArrObj = DocumentType::where('type','=','ID')->where('status','=',1)->get();
        foreach ($typeArrObj as $obj) {
            $typeArr[$obj->id]=$obj->type_name;
        }
        return $typeArr;
    }



    public static function getCompanyTypeDocument(){
        $typeArr=array();
        $typeArrObj = DocumentType::where('type','=','Company')->where('status','=',1)->get();
        foreach ($typeArrObj as $obj) {
            $typeArr[$obj->id]=$obj->type_name;
        }
        return $typeArr;
    }


}
