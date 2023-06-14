<?php

namespace jmvc;

class AuthGuard
{
private Controlleur $authcontrol;
private string $function;

public function __construct(Controlleur $authcontrol, string $function){
    $this->authcontrol = $authcontrol;
    $this->function = $function;
}

public function verif() : bool {
        $controlleur = $this->authcontrol;
        $method = $this->function;
        return $controlleur->$method();
}

}