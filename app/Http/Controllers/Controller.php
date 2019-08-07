<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function counts($user)
    {
        $counts_microposts = $user->microposts()->count();
        $counts_favorites = $user->favorites()->count();
        
        return [
            'counts_microposts' => $counts_microposts,
            'counts_favorites' => $counts_favorites,
        ];
    }
}
