<?php

namespace App\Services;

trait Permisions{

    public function allowedTo($ability){

        return $this->abilities->flatten()->pluck('name')->contains($ability);
    }
}
