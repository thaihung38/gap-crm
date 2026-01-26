<?php

namespace App\Domains\Analytics\Aggregates\EventLog;

use App\Domains\Analytics\Factories\EventLogFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property int id
 * @property string $fqdn
 * @property string $process_id
 * @property string $event_id
 * @property \DateTime $dispatch_time
 * @property string $content
 */
trait EventLogRelations
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'fqdn',
        'process_id',
        'event_id',
        'dispatch_time',
        'content',
    ];

    protected static function newFactory()
    {
        return EventLogFactory::new();
    }
}
