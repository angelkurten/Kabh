<?php
    $this->router->get('/', function() {
        return 'Hey there, World! How are you doing ?';
    });

    $this->router->get('/hello', 'HelloController@projects');