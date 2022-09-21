<?php

namespace App\Filters;

use CodeIgniter\I18n\Time;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class isPro implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->has('isLoggedIn') ){
            if(session()->get("fecha")!=null){
                $time = Time::parse(session()->get("fecha"));
                $hoy = new Time('now');
                // Si la fecha en persona es despues que el dia de hoy aun es pro
                if($time->isAfter($hoy)){
                    return redirect()->to('/perfilPro');
                }else{
                    return redirect()->to('/perfil');
                }
            }else{
                return redirect()->to('/perfil');
            }
            
            
        }else{
            return redirect()->to('/login')->with('mensaje','Debe iniciar sesión');        
        }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }

}