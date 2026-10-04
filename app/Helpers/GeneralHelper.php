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

    /**
     * Render DataTable Action Buttons or Dropdown
     *
     * Rules:
     * - If count($actions) <= $maxInline (default 3): Render compact inline buttons (icon + small text).
     * - If count($actions) > $maxInline: Render 3-dots dropdown menu ('ti ti-dots-vertical').
     *
     * @param array $actions Array of action definitions:
     *   [
     *       'label' => 'Edit',
     *       'icon'  => 'ti ti-edit',
     *       'url'   => '/edit-url',
     *       'color' => 'primary', // primary | danger | success | info | warning | secondary
     *       'class' => 'btn-delete',
     *       'attrs' => ['data-id' => 1, ...],
     *   ]
     * @param int $maxInline Max buttons to show directly (default 3)
     * @return string
     */
    public static function renderDataTableActions(array $actions, int $maxInline = 3): string
    {
        $actions = array_values(array_filter($actions));
        $count = count($actions);

        if ($count === 0) {
            return '';
        }

        if ($count <= $maxInline) {
            $html = '<div class="d-inline-flex align-items-center justify-content-center gap-1 flex-wrap">';
            foreach ($actions as $action) {
                if (is_string($action)) {
                    $html .= $action;
                    continue;
                }

                $label = htmlspecialchars($action['label'] ?? '', ENT_QUOTES, 'UTF-8');
                $icon = htmlspecialchars($action['icon'] ?? '', ENT_QUOTES, 'UTF-8');
                $color = htmlspecialchars($action['color'] ?? 'primary', ENT_QUOTES, 'UTF-8');
                $extraClass = htmlspecialchars($action['class'] ?? '', ENT_QUOTES, 'UTF-8');
                $url = $action['url'] ?? null;

                $attrString = '';
                if (!empty($action['attrs']) && is_array($action['attrs'])) {
                    foreach ($action['attrs'] as $key => $val) {
                        $attrString .= ' ' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '="' . htmlspecialchars((string)$val, ENT_QUOTES, 'UTF-8') . '"';
                    }
                }

                $iconHtml = $icon ? '<i class="' . $icon . ' fs-3"></i>' : '';
                $labelHtml = $label ? '<span>' . $label . '</span>' : '';

                if ($url) {
                    $html .= '<a href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '" class="btn btn-sm btn-subtle-' . $color . ' px-2.5 py-1 fs-2 d-inline-flex align-items-center gap-1 rounded-2 shadow-none ' . $extraClass . '" title="' . $label . '"' . $attrString . '>';
                    $html .= $iconHtml . $labelHtml;
                    $html .= '</a>';
                } else {
                    $html .= '<button type="button" class="btn btn-sm btn-subtle-' . $color . ' px-2.5 py-1 fs-2 d-inline-flex align-items-center gap-1 rounded-2 shadow-none ' . $extraClass . '" title="' . $label . '"' . $attrString . '>';
                    $html .= $iconHtml . $labelHtml;
                    $html .= '</button>';
                }
            }
            $html .= '</div>';
            return $html;
        }

        // Render 3-dots dropdown menu for 4+ actions
        $html = '<div class="dropdown text-center">';
        $html .= '<a href="javascript:void(0)" class="text-muted p-1 rounded-circle d-inline-flex align-items-center justify-content-center" data-bs-toggle="dropdown" aria-expanded="false" title="Menu Aksi">';
        $html .= '<i class="ti ti-dots-vertical fs-5"></i>';
        $html .= '</a>';
        $html .= '<ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 rounded-3 py-1">';

        foreach ($actions as $action) {
            if (is_string($action)) {
                $html .= '<li>' . $action . '</li>';
                continue;
            }

            $label = htmlspecialchars($action['label'] ?? '', ENT_QUOTES, 'UTF-8');
            $icon = htmlspecialchars($action['icon'] ?? '', ENT_QUOTES, 'UTF-8');
            $color = htmlspecialchars($action['color'] ?? 'dark', ENT_QUOTES, 'UTF-8');
            $extraClass = htmlspecialchars($action['class'] ?? '', ENT_QUOTES, 'UTF-8');
            $url = $action['url'] ?? null;

            $attrString = '';
            if (!empty($action['attrs']) && is_array($action['attrs'])) {
                foreach ($action['attrs'] as $key => $val) {
                    $attrString .= ' ' . htmlspecialchars($key, ENT_QUOTES, 'UTF-8') . '="' . htmlspecialchars((string)$val, ENT_QUOTES, 'UTF-8') . '"';
                }
            }

            $iconHtml = $icon ? '<i class="' . $icon . ' fs-4"></i>' : '';
            $textColorClass = in_array($color, ['danger', 'primary', 'success', 'info', 'warning']) ? 'text-' . $color : 'text-dark';

            if ($url) {
                $html .= '<li><a class="dropdown-item d-flex align-items-center gap-2 py-2 fs-3 ' . $textColorClass . ' ' . $extraClass . '" href="' . htmlspecialchars($url, ENT_QUOTES, 'UTF-8') . '"' . $attrString . '>';
                $html .= $iconHtml . '<span>' . $label . '</span>';
                $html .= '</a></li>';
            } else {
                $html .= '<li><button type="button" class="dropdown-item d-flex align-items-center gap-2 py-2 fs-3 ' . $textColorClass . ' ' . $extraClass . '"' . $attrString . '>';
                $html .= $iconHtml . '<span>' . $label . '</span>';
                $html .= '</button></li>';
            }
        }

        $html .= '</ul>';
        $html .= '</div>';

        return $html;
    }
}
