<?php namespace Larabook\Statuses;


use Laracasts\Presenter\Presenter;

/**
 * Class StatusPresenter
 * @package Larabook\Statuses
 */
class StatusPresenter extends Presenter {

    /**
     *
     * Display time of creation in a Human readable format
     *
     * @return mixed
     */
    public function timeSincePublished()
    {
        return $this->created_at->diffForHumans();
    }
} 