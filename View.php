<?php

namespace jmvc;

class View {
    private string $template;
    private $data = array();
    public function __construct(string $template){
        $this->template = $template;
    }

    public function assign($key,$value){
        $this->data[$key] = $value;
    }

    public static function convert($html) {
        $html = preg_replace('/{%\s*for\s*(.*?)\s*as\s*(.*?)\s*%}/', '<?php foreach($$1 as $$2) { ?>', $html);
        $html = str_replace('{% endfor %}', '<?php } ?>', $html);
        $html = preg_replace('/{%\s*(.*?)\s*%}/', '<?= $1 ?>', $html);
        return $html;
    }

    public function render(){
        ob_start();
        
        // Extract the data to be used in the template
        extract($this->data);
        
        // Include the template file
        include($this->template);
        
        // Get the buffered output
        $output = ob_get_clean();
        
        #$out = self::convert($output);
        // Return the rendered template
        return $output;
    }

    public function show(){
        echo $this->render();
    }
}