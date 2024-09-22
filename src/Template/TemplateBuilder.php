<?php

namespace ofernandoavila\RiocoresFormularioCadastro\Template;

use ofernandoavila\RiocoresFormularioCadastro\Exceptions\TemplateNotFoundException;

class TemplateBuilder {
    private static $root = __DIR__ . '/assets';

    public static function get_template(string $templateName, array $data = null): string {
        $template = self::$root . '/' . $templateName . '.php';
        
        if(!file_exists($template)) {
            throw new TemplateNotFoundException();
        }

        ob_start();

        if(!empty($data) && is_array($data)) {
            extract($data);
        }

        include($template);
        $content = ob_get_clean();
        
        return $content;
    }
}