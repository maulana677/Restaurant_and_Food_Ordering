<?php

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
