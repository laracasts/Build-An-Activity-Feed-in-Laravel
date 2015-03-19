<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use RecordsActivity;

    /**
     * Which events to record for the auth'd user.
     *
     * @var array
     */
    protected static $recordEvents = ['created'];
}
