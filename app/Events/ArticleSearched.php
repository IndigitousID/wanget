<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;

/**
 * Event for Article Viewed
 * 
 * @author cmooy
 */
class ArticleSearched extends Event
{
    use SerializesModels;

    public $stat;

    /**
     * Create a new event instance.
     *
     * @param  array  $stat
     * @return void
     */
    public function __construct(array $stat)
    {
        $this->stat = $stat;
    }
}