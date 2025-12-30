protected $routeMiddleware = [
    'clientAuth' => \App\Http\Middleware\ClientAuth::class,
    'travelerAuth' => \App\Http\Middleware\TravelerAuth::class,
];
