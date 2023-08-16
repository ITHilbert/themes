<?php

namespace ITHilbert\Themes\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ThemesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    {
        $themeName = config('themes.config.theme');

        $theme = config('themes.'. $themeName .'.name');
        return $theme;
    }

}
