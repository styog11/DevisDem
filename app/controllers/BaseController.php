<?php

abstract class BaseController {
    protected function loadModel($model) {
        $modelClass = ucfirst($model) . 'Model';
        require_once '../app/models/' . $modelClass . '.php';
        return new $modelClass();
    }

    protected function render($view, $data = []) {
        extract($data);
        require_once '../app/views/' . $view . '.php';
    }
}