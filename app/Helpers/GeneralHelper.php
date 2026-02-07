<?php

namespace App\Helpers;

use Carbon\Carbon;

class GeneralHelper
{
    /**
     * Format number to IDR currency
     */
    public static function formatCurrency($number)
    {
        return 'Rp ' . number_format($number, 0, ',', '.');
    }

    /**
     * Format date to Indonessian standard
     */
    public static function formatDate($date, $format = 'd M Y H:i')
    {
        if (!$date) return '-';
        return Carbon::parse($date)->format($format);
    }

    /**
     * Response for AJAX or Redirect with Error
     */
    public static function errorResponse($message, $routeName = null)
    {
        if (request()->ajax() || request()->wantsJson()) {
            return response()->json(['success' => false, 'message' => $message], 500);
        }

        $redirect = $routeName ? redirect()->route($routeName) : redirect()->back();
        return $redirect->withInput()->with('error', $message);
    }
}
