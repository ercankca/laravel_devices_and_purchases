<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Device;
use function PHPUnit\Framework\isEmpty;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Support\Facades\Cache;


class StoreDevice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param null $guard
     * @param bool $isRequired
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null, $isRequired = true)
    {
        $deviceUdid = $request->header('x-device-uid');

        if (empty($deviceUdid) && ! $isRequired) {
            return $next($request);
        }

        if (empty($deviceUdid) && $isRequired) {
            throw new UnauthorizedException('Cihaz detaylarınızı belirtmeniz gerekiyor.');
        }

        $result = Device::where("uid",$deviceUdid)->pluck("client_token");

        if (!$result->isEmpty())
        {
            return response()->json([
                    "status"=>"ok",
                    "client_token"=>$result[0]
                ]
            );
        }

        $device = Device::query()->updateOrCreate([
            'uid' => $deviceUdid,
        ], [
            'appId' => $request->header('X-Device-AppId'),
            'os' => $request->header('X-Device-OS'),
            'language' => $request->header('X-Device-Language'),
            'client_token' => md5(uniqid(rand(), true)),
        ]);

        $request->device = $device;

        $request->guard = $guard ?? config('auth.defaults.guard');


        return $next($request);
    }

    public function terminate($request, $response)
    {
        $user = $request->user($request->guard);

        if (! empty($user) && ! empty($request->device)) {
            $request->device->deviceable()->associate($user);
            $request->device->save();
        }


    }
}
