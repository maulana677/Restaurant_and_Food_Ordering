<?php

if (!function_exists('generateUniqueSlug')) {
    function generateUniqueSlug($model, $name): string
    {
        $modelClass = "App\\Models\\$model";

        if (!class_exists($modelClass)) {
            throw new \InvalidArgumentException("Model $model not found.");
        }

        $slug = \Str::slug($name);
        $count = 2;

        while ($modelClass::where('slug', $slug)->exists()) {
            $slug = \Str::slug($name) . '-' . $count;
            $count++;
        }

        return $slug;
    }
}

if (!function_exists('currency_IDR')) {
    function currency_IDR($price): string
    {
        if ("Rp. " . number_format($price, 0, ',', '.')) {
            return "Rp. " . number_format($price, 0, ',', '.');
        } else {
            return $price . "Rp. " . number_format($price, 0, ',', '.');
        }
    }
}

/** get product discount in percent */
if (!function_exists('setSidebarActive')) {
    function setSidebarActive(array $routes)
    {
        foreach ($routes as $route) {
            if (request()->routeIs($route)) {
                return 'active';
            }
        }
        return '';
    }
}
