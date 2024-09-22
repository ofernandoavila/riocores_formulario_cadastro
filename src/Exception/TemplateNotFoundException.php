<?php

namespace ofernandoavila\RiocoresFormularioCadastro\Exceptions;

use Exception;

class TemplateNotFoundException extends Exception {
    public function __construct()
    {
        parent::__construct("Template não encontrado!");
    }
}