<?php namespace Larabook\Statuses\Events;


use Larabook\Statuses\Status;

class StatusWasPublished {

    /**
     * @var string $body
     */

    public $body;

    /**
     * @param $body
     */
    function __construct( $body )
    {
        $this->body = $body;
    }

} 