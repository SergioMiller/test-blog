<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserAgentStatistic
 * @package App\Models
 */
class UserAgentStatistic extends Model
{
    const UPDATED_AT = null;

    /**
     * @var string[]
     */
    protected $fillable = [
        'user_agent',
        'browser',
        'ip'
    ];

    /**
     * @param $ip
     * @param $userAgent
     * @param $browser
     * @return Collection
     */
    public function getExisting($ip, $userAgent, $browser)
    {
        return self::where([
            ['ip', $ip],
            ['user_agent', $userAgent],
            ['browser', $browser],
        ])->get();
    }

    /**
     * @param $ip
     * @param $userAgent
     * @param $browser
     * @return UserAgentStatistic|bool
     */
    public function setNew($ip, $userAgent, $browser)
    {
        $item = new self([
            'ip' => $ip,
            'user_agent' => $userAgent,
            'browser' => $browser,
        ]);

        if ($item->save()) {
            return $item;
        }
        return false;
    }
}
