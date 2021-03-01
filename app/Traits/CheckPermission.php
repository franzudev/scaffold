<?php


namespace App\Traits;


trait CheckPermission
{
    public function cantSeeAll()
    {
        return !\Auth::user()->hasRole('super-admin') && !\Auth::user()->hasRole('admin') && !\Auth::user()->hasRole('biomec-operator');
    }
    
}
