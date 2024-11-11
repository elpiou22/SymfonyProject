<?php

// This file has been auto-generated by the Symfony Routing Component.

return [
    '_preview_error' => [['code', '_format'], ['_controller' => 'error_controller::preview', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], [], []],
    '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], [], []],
    '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], [], []],
    '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], [], []],
    '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], [], []],
    '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], [], []],
    '_profiler_xdebug' => [[], ['_controller' => 'web_profiler.controller.profiler::xdebugAction'], [], [['text', '/_profiler/xdebug']], [], [], []],
    '_profiler_font' => [['fontName'], ['_controller' => 'web_profiler.controller.profiler::fontAction'], [], [['text', '.woff2'], ['variable', '/', '[^/\\.]++', 'fontName', true], ['text', '/_profiler/font']], [], [], []],
    '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], [], []],
    '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::body'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception_panel::stylesheet'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], [], []],
    'home' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/']], [], [], []],
    'app_signin' => [[], ['_controller' => 'App\\Controller\\HomeController::signin'], [], [['text', '/signin']], [], [], []],
    'app_register' => [[], ['_controller' => 'App\\Controller\\HomeController::register'], [], [['text', '/register']], [], [], []],
    'app_create' => [[], ['_controller' => 'App\\Controller\\HomeController::create'], [], [['text', '/create']], [], [], []],
    'app_movie_update' => [['id'], ['_controller' => 'App\\Controller\\HomeController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/movies/update']], [], [], []],
    'app_movie_read' => [['id'], ['_controller' => 'App\\Controller\\HomeController::read'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/movies']], [], [], []],
    'app_movie_delete' => [['id'], ['_controller' => 'App\\Controller\\HomeController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/movies/delete']], [], [], []],
    'app_profile' => [[], ['_controller' => 'App\\Controller\\HomeController::profile'], [], [['text', '/profile']], [], [], []],
    'app_logout' => [[], [], [], [['text', '/logout']], [], [], []],
    'App\Controller\HomeController::index' => [[], ['_controller' => 'App\\Controller\\HomeController::index'], [], [['text', '/']], [], [], []],
    'App\Controller\HomeController::signin' => [[], ['_controller' => 'App\\Controller\\HomeController::signin'], [], [['text', '/signin']], [], [], []],
    'App\Controller\HomeController::register' => [[], ['_controller' => 'App\\Controller\\HomeController::register'], [], [['text', '/register']], [], [], []],
    'App\Controller\HomeController::create' => [[], ['_controller' => 'App\\Controller\\HomeController::create'], [], [['text', '/create']], [], [], []],
    'App\Controller\HomeController::edit' => [['id'], ['_controller' => 'App\\Controller\\HomeController::edit'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/movies/update']], [], [], []],
    'App\Controller\HomeController::read' => [['id'], ['_controller' => 'App\\Controller\\HomeController::read'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/movies']], [], [], []],
    'App\Controller\HomeController::delete' => [['id'], ['_controller' => 'App\\Controller\\HomeController::delete'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/movies/delete']], [], [], []],
    'App\Controller\HomeController::profile' => [[], ['_controller' => 'App\\Controller\\HomeController::profile'], [], [['text', '/profile']], [], [], []],
];
