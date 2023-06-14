<?php

namespace jmvc;
use Controlleur\AuthControlleur;

class ProtectedRoute implements Rt
{
    private string $path;
    private Controlleur $ctrl;
    private string $function;
    private AuthGuard $authguard;

    public function __construct(string $path, Controlleur $ctrl, string $function,AuthGuard $authguard){
        $this->path = $path;
        $this->ctrl = $ctrl;
        $this->function = $function;
        $this->authguard = $authguard;
    }

    public function getPath(): string {
        return $this->path;
    }

    public function execute(){
        if($this->authguard->verif()){
            $controlleur = $this->ctrl;
            $method = $this->function;
            $controlleur->$method();
        } else {
            header("Location: /logout");
            exit();
        }
    }
}