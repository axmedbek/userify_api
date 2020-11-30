<?php

$dispatcher = new \App\Lib\Dispatcher(new App\Lib\Request\Request());

$dispatcher->get('/', function() {
    return <<<HTML
  <h1>Hello world</h1>
HTML;
});