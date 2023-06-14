<?php

namespace jmvc;

class Route implements Rt
{
    private string $path;
    private Controlleur $ctrl;
    private string $function;

    public function __construct(string $path, Controlleur $ctrl, string $function){
        $this->path = $path;
        $this->ctrl = $ctrl;
        $this->function = $function;
    }

    public function getPath(): string {
        return $this->path;
    }

    public function execute(){
        #$this->ctrl->$function();
        $controlleur = $this->ctrl;
        $method = $this->function;
        $controlleur->$method();
    }
}