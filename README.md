

## About Laravel Multi auth boilerplate

Multiple authentications using garuds  — admin, writer, user. We will make guards for the three user classes and restrict different parts of our application based on those guards.

## Installation 

1. Composer update
2. php artisan migrate
3. Kindly, check config/auth.php add the new guards edit as
// config/auth.php

    <?php

    [...]
    'guards' => [
        [...]
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'writer' => [
            'driver' => 'session',
            'provider' => 'writers',
        ],
    ],

// providers

     'providers' => [
        [...]
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Admin::class,
        ],
        'writers' => [
            'driver' => 'eloquent',
            'model' => App\Writer::class,
        ],
    ],


4. Modify admin, editor or user routes if authenticated

class RedirectIfAuthenticated
    {
        public function handle($request, Closure $next, $guard = null)
        {
            if ($guard == "admin" && Auth::guard($guard)->check()) {
                return redirect('/admin');
            }
            if ($guard == "writer" && Auth::guard($guard)->check()) {
                return redirect('/writer');
            }
            if (Auth::guard($guard)->check()) {
                return redirect('/home');
            }

            return $next($request);
        }
    }


## Run the application
php artisan serve