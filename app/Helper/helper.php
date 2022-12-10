<?php



////// Admin Url Function /////////////////////
if (!function_exists('aurl')) {
    function aurl($link)
    {
        if (substr($link, 0, 1) == '/') {
            return url(app('admin') . $link);
        } else {
            return url(app('admin') . '/' . $link);
        }
    }
}
////// Admin Url Function /////////////////////

////// Admin Url Function /////////////////////
if (!function_exists('active_link')) {
    function active_link($segment, $class = null)
    {
        if ($segment == null and request()->segment(2) == null) {
            return $class;
        } elseif (preg_match('/' . $segment . '/i', request()->segment(2))) {
            if ($class != null || $class != 'block') {
                if ($segment != null) {
                    return $class;
                }
            } else {
                if ($class == 'block') {
                    return 'display:block';
                } else {
                    return 'display:none';
                }
            }
        }
    }

}
////// Admin Url Function /////////////////////

