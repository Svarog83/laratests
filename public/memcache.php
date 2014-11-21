<?php
    //Создаём новый объект. Также можно писать и в процедурном стиле

$m = new Memcached();
var_dump( $m );
$m->addServer('localhost', 11211);

$m->set('int', 990);
$m->set('string', 'a simple string');
$m->set('array', array(11, 12));
/* expire 'object' key in 5 minutes */
$m->set('object', new stdclass, time() + 300);


var_dump($m->get('int'));
var_dump($m->get('string'));
var_dump($m->get('array'));
var_dump($m->get('object'));