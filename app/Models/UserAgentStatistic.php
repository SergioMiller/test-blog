<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAgentStatistic
 * @package App\Models
 */
class UserAgentStatistic extends Model
{
    /**
     * @var string[]
     */
    protected $fillable = [
        'user_agent',
        'ip'
    ];
}
