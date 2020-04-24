<?php

namespace App\Http\Middleware;

use App\Services\UserAgentService;
use Closure;

/**
 * Class UserAgentStatistic
 * @package App\Http\Middleware
 */
class UserAgentStatistic
{
    /**
     * @var UserAgentService
     */
    public $userAgentService;

    /**
     * UserAgentStatistic constructor.
     * @param UserAgentService $userAgentService
     */
    public function __construct(UserAgentService $userAgentService)
    {
        $this->userAgentService = $userAgentService;
    }

    /**
     * @param $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->userAgentService->set($request);
        return $next($request);
    }
}
