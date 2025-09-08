<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckModelOwnership
{
    public function handle(Request $request, Closure $next)
    {
        $routeName = $request->route()->getName();
        $userId = Auth::id();


        // لیست routeهایی که باید چک کنه و مدل مربوطه
        $modelsToCheck = [
            'dashboard.edit-bank' => \App\Models\Account::class,
            'dashboard.show-transaction-bank' => \App\Models\Account::class,
            // بقیه route هایی که آی‌دی دارن و باید چک شه اضافه کن
        ];
        ;

        if (array_key_exists($routeName, $modelsToCheck)) {
            $modelClass = $modelsToCheck[$routeName];
            $id = $request->route('id');

            if (!$id) {
                abort(404); // اگه id نداشت 404 بده
            }

            $model = $modelClass::findOrFail($id);

            if ($model->user_id != $userId) {
                abort(404);
            }
        }

        return $next($request);
    }
}

