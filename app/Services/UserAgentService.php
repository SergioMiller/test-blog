<?php


namespace App\Services;

use App\Models\UserAgentStatistic;
use Illuminate\Http\Request;

/**
 * Class UserAgentService
 * @package App\Services
 */
class UserAgentService
{
    public $userAgentStatistic;

    /**
     * UserAgentService constructor.
     * @param UserAgentStatistic $userAgentStatistic
     */
    public function __construct(UserAgentStatistic $userAgentStatistic)
    {
        $this->userAgentStatistic = $userAgentStatistic;
    }

    /**
     * @param Request $request
     */
    public function set(Request $request)
    {
        $ip = $request->ip();
        $userAgent = $request->userAgent();
        $browser = $this->getBrowser($userAgent);

        $existing = $this->userAgentStatistic->getExisting($ip, $userAgent, $browser);

        if ($existing->isEmpty()){
            $this->userAgentStatistic->setNew($ip, $userAgent, $browser);
        }
    }

    /**
     * @param $userAgent
     * @return string
     */
    public function getBrowser($userAgent)
    {
        $name = 'Unknown';

        if (preg_match('/MSIE/i', $userAgent) && !preg_match('/Opera/i', $userAgent)) {
            $name = 'Internet Explorer';
        } elseif (preg_match('/Firefox/i', $userAgent)) {
            $name = 'Mozilla Firefox';
        } elseif (preg_match('/Chrome/i', $userAgent)) {
            $name = 'Google Chrome';
        } elseif (preg_match('/Safari/i', $userAgent)) {
            $name = 'Apple Safari';
        } elseif (preg_match('/Opera/i', $userAgent)) {
            $name = 'Opera';
        } elseif (preg_match('/Netscape/i', $userAgent)) {
            $name = 'Netscape';
        }

        return $name;
    }
}
