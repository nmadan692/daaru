<?php

namespace App\Http\Middleware;

use App\Services\General\DefaultCity\DefaultCityService;
use Closure;

class CheckLocation
{
    /**
     * @var DefaultCityService
     */
    private $defaultCityService;

    /**
     * CheckLocation constructor.
     * @param DefaultCityService $defaultCityService
     */
    public function __construct(
        DefaultCityService $defaultCityService
    )
    {
        $this->defaultCityService = $defaultCityService;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($this->defaultCityService->getForFrontEnd() == null) {
            return redirect()->route('select.location');
        }
        return $next($request);
    }
}
