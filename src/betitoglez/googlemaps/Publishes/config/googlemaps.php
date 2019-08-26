<?php
return [
    /* =====================================================================
    |                                                                       |
    |                  Global Settings For Google Map                       |
    |                                                                       |
    ===================================================================== */



    /* =====================================================================
    General
    ===================================================================== */
    'google_maps_key'   => env('GOOGLE_MAPS_API_KEY', NULL), //Get API key: https://code.google.com/apis/console
    'default_region'    => env('GOOGLE_MAPS_DEFAULT_REGION', NULL),
    'default_language'  => env('GOOGLE_MAPS_DEFAULT_LANGUAGE','es-ES'),
];
