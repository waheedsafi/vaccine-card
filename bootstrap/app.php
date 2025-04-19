<?php

use App\Jobs\LogErrorJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Application;
use Illuminate\Database\QueryException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\api\template\LocaleMiddleware;
use App\Http\Middleware\api\template\AccessUserCheckMiddleware;
use App\Http\Middleware\api\template\epi\main\EpiHasMainAddPermissionMiddleware;
use App\Http\Middleware\api\template\user\sub\UserHasSubAddPermissionMiddleware;
use App\Http\Middleware\api\template\epi\main\EpiHasMainEditPermissionMiddleware;
use App\Http\Middleware\api\template\epi\main\EpiHasMainViewPermissionMiddleware;
use App\Http\Middleware\api\template\user\sub\UserHasSubEditPermissionMiddleware;
use App\Http\Middleware\api\template\user\sub\UserHasSubViewPermissionMiddleware;
use App\Http\Middleware\api\template\epi\main\EpiHasMainDeletePermissionMiddleware;
use App\Http\Middleware\api\template\user\sub\UserHasSubDeletePermissionMiddleware;
use App\Http\Middleware\api\template\finance\main\FinanceHasMainAddPermissionMiddleware;
use App\Http\Middleware\api\template\finance\main\FinanceHasMainEditPermissionMiddleware;
use App\Http\Middleware\api\template\finance\main\FinanceHasMainViewPermissionMiddleware;
use App\Http\Middleware\api\template\finance\main\FinanceHasMainDeletePermissionMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(LocaleMiddleware::class)
            ->alias([
                'financeHasMainViewPermission' => FinanceHasMainViewPermissionMiddleware::class,
                'financeHasMainDeletePermission' => FinanceHasMainDeletePermissionMiddleware::class,
                'financeHasMainEditPermission' => FinanceHasMainEditPermissionMiddleware::class,
                'financeHasMainAddPermission' => FinanceHasMainAddPermissionMiddleware::class,
                'epiHasMainViewPermission' => EpiHasMainViewPermissionMiddleware::class,
                'epiHasMainDeletePermission' => EpiHasMainDeletePermissionMiddleware::class,
                'epiHasMainEditPermission' => EpiHasMainEditPermissionMiddleware::class,
                'epiHasMainAddPermission' => EpiHasMainAddPermissionMiddleware::class,
                'accessUserCheck'  => AccessUserCheckMiddleware::class,
            ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Handle all other exceptions globally

        $exceptions->renderable(function (Throwable $err) {
            if ($err instanceof \Illuminate\Validation\ValidationException || $err instanceof AuthenticationException) {
                // Skip processing for validation exceptions
                return null; // Let Laravel handle it as usual (validation errors are automatically handled)
            } else if ($err instanceof QueryException) {
                // This will ensure the transaction is rolled back
                DB::rollBack();
            }
            $logData = [
                'error_code' => $err->getCode(),
                'trace' => $err->getTraceAsString(),
                'exception_type' => get_class($err),
                'error_message' => $err->getMessage(),
                'user_id' => request()->user() ? request()->user()->id : "N/K", // If you have an authenticated user, you can add the user ID
                'username' => request()->user() ? request()->user()->username : "N/K", // If you have an authenticated user, you can add the user ID
                'ip_address' => request()->ip(),
                'method' => request()->method(),
                'uri' => request()->fullUrl(),
            ];
            // Dispatch the logging job asynchronously
            LogErrorJob::dispatch($logData);
            Log::info('Global Exception =>' . $err);
            return response()->json([
                'message' => __('app_translation.server_error')
            ], 500, [], JSON_UNESCAPED_UNICODE);
        });
    })->create();
