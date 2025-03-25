<?php

if (!function_exists('get_api_v')) {
    /**
     * Get the API version from the current request.
     *
     * This function first checks the request path for a pattern like 'api/v{number}'.
     * If not found, it then checks the 'Accept-Version' header for a version number.
     *
     * @return int|null The API version as an integer if found; otherwise, null.
     */
    function get_api_v()
    {
        $request = request();
        $path = $request->path();

        if (preg_match('/api\/v(\d+)/', $path, $matches)) {
            return (int) $matches[1];
        }

        // Check if version is specified in the header
        $headerVersion = $request->header('Accept-Version');
        if ($headerVersion && preg_match('/(\d+)/', $headerVersion, $matches)) {
            return (int) $matches[1];
        }

        return null;
    }
}

if (!function_exists('is_api_v')) {
    /**
     * Check if the current request is for a specific API version.
     *
     * Compares the version extracted from the request (via path or header)
     * to the provided version number.
     *
     * **Note:** This function calls `get_api_v()`, which should be updated to `get_api_v()` if intended.
     *
     * @param int $version The version number to check against.
     * @return bool True if the current API version matches the specified version; otherwise, false.
     */
    function is_api_v($version)
    {
        return get_api_v() === (int) $version;
    }
}

if (!function_exists('api_v_at_least')) {
    /**
     * Check if the current API version is at least the specified version.
     *
     * Compares the API version from the request with the provided minimum version.
     *
     * **Note:** This function calls `get_api_v()`, which should be updated to `get_api_v()` if intended.
     *
     * @param int $version The minimum version to check against.
     * @return bool True if the current API version is greater than or equal to the specified version; otherwise, false.
     */
    function api_v_at_least($version)
    {
        $currentVersion = get_api_v();

        if ($currentVersion === null) {
            return false;
        }

        return $currentVersion >= (int) $version;
    }
}

if (!function_exists('is_api_request')) {
    /**
     * Check if the current request is an API request.
     *
     * This function determines if the request is intended for the API by checking:
     * - If the request path starts with 'api/'.
     * - If the request expects or wants a JSON response.
     * - If specific API headers (e.g., 'Accept-Version', 'X-API-KEY', 'Authorization') are present.
     *
     * @return bool True if the request is identified as an API request; otherwise, false.
     */
    function is_api_request()
    {
        $request = request();

        // Check if the path starts with 'api/'
        if (strpos($request->path(), 'api/') === 0) {
            return true;
        }

        if ($request->expectsJson() || $request->wantsJson()) {
            return true;
        }

        // Check for API-specific headers
        $apiHeaders = ['Accept-Version', 'X-API-KEY', 'Authorization'];
        foreach ($apiHeaders as $header) {
            if ($request->header($header)) {
                return true;
            }
        }

        return false;
    }
}

if (!function_exists('get_client_ip')) {
    /**
     * Get the client's IP address from the current request.
     *
     * @return string|null The client's IP address or null if unavailable.
     */
    function get_client_ip(): ?string
    {
        return request()->ip();
    }
}

if (!function_exists('get_request_locale')) {
    /**
     * Get the locale from the current request.
     *
     * Returns the value of the 'Accept-Language' header if set; otherwise, returns the default application locale.
     *
     * @return string The locale code.
     */
    function get_request_locale(): string
    {
        return request()->header('Accept-Language', config('app.locale'));
    }
}

if (!function_exists('get_request_token')) {
    /**
     * Get the bearer token from the current request.
     *
     * Retrieves the token from the Authorization header.
     *
     * @return string|null The bearer token if present; otherwise, null.
     */
    function get_request_token(): ?string
    {
        return request()->bearerToken();
    }
}

if (!function_exists('get_request_content_type')) {
    /**
     * Get the Content-Type header from the current request.
     *
     * @return string|null The Content-Type if available; otherwise, null.
     */
    function get_request_content_type(): ?string
    {
        return request()->header('Content-Type');
    }
}

if (!function_exists('is_secure_request')) {
    /**
     * Check if the current request is made over HTTPS.
     *
     * @return bool True if the request is secure; otherwise, false.
     */
    function is_secure_request(): bool
    {
        return request()->secure();
    }
}

if (!function_exists('get_request_headers')) {
    /**
     * Get all headers from the current request.
     *
     * @return array An associative array of request headers.
     */
    function get_request_headers(): array
    {
        return request()->headers->all();
    }
}

if (!function_exists('is_api_authenticated')) {
    /**
     * Check if the API user is authenticated.
     *
     * Uses the 'api' authentication guard to determine if the user is logged in.
     *
     * @return bool True if the API user is authenticated; otherwise, false.
     */
    function is_api_authenticated(): bool
    {
        return auth('api')->check();
    }
}

if (!function_exists('get_auth_user')) {
    /**
     * Get the authenticated user from the default guard.
     *
     * @return mixed The authenticated user instance or null if not authenticated.
     */
    function get_auth_user()
    {
        return auth()->user();
    }
}

if (!function_exists('get_api_user')) {
    /**
     * Get the authenticated API user.
     *
     * Retrieves the user from the 'api' authentication guard.
     *
     * @return mixed The authenticated API user instance or null if not authenticated.
     */
    function get_api_user()
    {
        return auth()->guard('api')->user();
    }
}
