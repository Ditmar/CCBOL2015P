<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class Expositores extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    Variable Global
    */
    var $baseresponse;

    /*
    Constructor base
    */
    function __construct()
    {
        $this->baseresponse = array("menu"=>"expositores");
    }
    public function index()
    {
        //
        return View("maincontent/expositores",$this->baseresponse);
    }
    public function ver($id)
    {
        switch($id)
        {
            case 1:{

                return View("expositores/1");
                break;
            }
            case 2:{
                return View("expositores/2");
                break;
            }
            case 3:{
                return View("expositores/3");
                break;
            }
            case 4:{
                return View("expositores/4");
                break;
            }
            case 5:{
                return View("expositores/5");
                break;
            }
            case 6:{
                return View("expositores/6");
                break;
            }
            case 7:{
                return View("expositores/7");
                break;
            }
        }
    }
}
