<?php namespace Larabook\Statuses;


use Eloquent;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Larabook\Statuses\Events\StatusWasPublished;
use Laracasts\Commander\Events\EventGenerator;

/**
 * Class Status
 * @package Larabook\Statuses
 */
class Status extends Eloquent {

    use RemindableTrait, EventGenerator;
    /**
     * Fillable fileds for a new status
     * @var array
     */
    protected $fillable = ['body'];

    /**
     * A status belongs to a user
     */
    public function user()
    {
        $this->belongsTo('Larabook\Users\User');
    }

    /**
     * Publish a new status
     *
     * @param $body
     * @return static
     */
    public static function publish($body)
    {
        $status = new static (compact('body'));
        $status->raise(new StatusWasPublished($body));

        return $status;
    }

}