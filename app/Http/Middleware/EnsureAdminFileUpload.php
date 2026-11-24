<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminFileUpload
{
    public function handle(Request $request, Closure $next): Response
    {
        abort_if(
            strcasecmp(
                $request->getHost(),
                config('personal.domain')
            ) === 0,
            404
        );

        $panel = Filament::getPanel('admin');

        $user = auth()->guard($panel->getAuthGuard())->user();

        abort_unless(
            $user instanceof FilamentUser
                && $user->canAccessPanel($panel),
            403
        );

        return $next($request);
    }
}
