<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_wdt/styles' => [[['_route' => '_wdt_stylesheet', '_controller' => 'web_profiler.controller.profiler::toolbarStylesheetAction'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'frontend_home', '_controller' => 'App\\Controller\\FrontendController::home'], null, null, null, false, false, null]],
        '/articles' => [[['_route' => 'frontend_posts', '_controller' => 'App\\Controller\\FrontendController::posts'], null, null, null, false, false, null]],
        '/recherche' => [[['_route' => 'frontend_search', '_controller' => 'App\\Controller\\FrontendController::search'], null, null, null, false, false, null]],
        '/sitemap.xml' => [[['_route' => 'frontend_sitemap', '_controller' => 'App\\Controller\\FrontendController::sitemap'], null, null, null, false, false, null]],
        '/rss.xml' => [[['_route' => 'frontend_rss', '_controller' => 'App\\Controller\\FrontendController::rss'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, null, null, false, false, null]],
        '/admin' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\Admin\\AdminController::dashboard'], null, null, null, true, false, null]],
        '/admin/categories' => [[['_route' => 'admin_categories_index', '_controller' => 'App\\Controller\\Admin\\CategoryController::index'], null, null, null, true, false, null]],
        '/admin/categories/new' => [[['_route' => 'admin_categories_new', '_controller' => 'App\\Controller\\Admin\\CategoryController::new'], null, null, null, false, false, null]],
        '/admin/comments' => [[['_route' => 'admin_comments_index', '_controller' => 'App\\Controller\\Admin\\CommentController::index'], null, ['GET' => 0], null, false, false, null]],
        '/admin/comments/bulk-actions' => [[['_route' => 'admin_comments_bulk_actions', '_controller' => 'App\\Controller\\Admin\\CommentController::bulkActions'], null, ['POST' => 0], null, false, false, null]],
        '/admin/extensions' => [[['_route' => 'admin_extensions_index', '_controller' => 'App\\Controller\\Admin\\ExtensionController::index'], null, null, null, false, false, null]],
        '/admin/extensions/plugins' => [[['_route' => 'admin_plugins_index', '_controller' => 'App\\Controller\\Admin\\ExtensionController::pluginsIndex'], null, null, null, false, false, null]],
        '/admin/extensions/plugins/upload' => [[['_route' => 'admin_plugins_upload', '_controller' => 'App\\Controller\\Admin\\ExtensionController::uploadPlugin'], null, ['POST' => 0], null, false, false, null]],
        '/admin/extensions/themes' => [[['_route' => 'admin_themes_index', '_controller' => 'App\\Controller\\Admin\\ExtensionController::themesIndex'], null, null, null, false, false, null]],
        '/admin/extensions/themes/upload' => [[['_route' => 'admin_themes_upload', '_controller' => 'App\\Controller\\Admin\\ExtensionController::uploadTheme'], null, ['POST' => 0], null, false, false, null]],
        '/admin/languages' => [[['_route' => 'admin_languages_index', '_controller' => 'App\\Controller\\Admin\\LanguageController::index'], null, null, null, true, false, null]],
        '/admin/languages/new' => [[['_route' => 'admin_languages_new', '_controller' => 'App\\Controller\\Admin\\LanguageController::new'], null, null, null, false, false, null]],
        '/media' => [[['_route' => 'admin_media_index', '_controller' => 'App\\Controller\\Admin\\MediaController::index'], null, ['GET' => 0], null, false, false, null]],
        '/media/upload' => [[['_route' => 'admin_media_upload', '_controller' => 'App\\Controller\\Admin\\MediaController::upload'], null, ['POST' => 0], null, false, false, null]],
        '/media/bulk-delete' => [[['_route' => 'admin_media_bulk_delete', '_controller' => 'App\\Controller\\Admin\\MediaController::bulkDelete'], null, ['POST' => 0], null, false, false, null]],
        '/media/selector' => [[['_route' => 'admin_media_selector', '_controller' => 'App\\Controller\\Admin\\MediaController::selector'], null, ['GET' => 0], null, false, false, null]],
        '/media/library' => [[['_route' => 'admin_media_library', '_controller' => 'App\\Controller\\Admin\\MediaController::library'], null, ['GET' => 0], null, false, false, null]],
        '/media/stats' => [[['_route' => 'admin_media_stats', '_controller' => 'App\\Controller\\Admin\\MediaController::stats'], null, ['GET' => 0], null, false, false, null]],
        '/admin/menus' => [[['_route' => 'admin_menus_index', '_controller' => 'App\\Controller\\Admin\\MenuController::index'], null, null, null, true, false, null]],
        '/admin/menus/new' => [[['_route' => 'admin_menus_new', '_controller' => 'App\\Controller\\Admin\\MenuController::new'], null, null, null, false, false, null]],
        '/admin/menus/reorder' => [[['_route' => 'admin_menus_reorder', '_controller' => 'App\\Controller\\Admin\\MenuController::reorder'], null, ['POST' => 0], null, false, false, null]],
        '/admin/pages' => [[['_route' => 'admin_pages_index', '_controller' => 'App\\Controller\\Admin\\PageController::index'], null, null, null, true, false, null]],
        '/admin/pages/new' => [[['_route' => 'admin_pages_new', '_controller' => 'App\\Controller\\Admin\\PageController::new'], null, null, null, false, false, null]],
        '/admin/posts' => [[['_route' => 'admin_posts_index', '_controller' => 'App\\Controller\\Admin\\PostController::index'], null, null, null, true, false, null]],
        '/admin/posts/new' => [[['_route' => 'admin_posts_new', '_controller' => 'App\\Controller\\Admin\\PostController::new'], null, null, null, false, false, null]],
        '/admin/tags' => [[['_route' => 'admin_tags_index', '_controller' => 'App\\Controller\\Admin\\TagController::index'], null, null, null, true, false, null]],
        '/admin/tags/new' => [[['_route' => 'admin_tags_new', '_controller' => 'App\\Controller\\Admin\\TagController::new'], null, null, null, false, false, null]],
        '/admin/users' => [[['_route' => 'admin_users_index', '_controller' => 'App\\Controller\\Admin\\UserController::index'], null, null, null, true, false, null]],
        '/admin/users/new' => [[['_route' => 'admin_users_new', '_controller' => 'App\\Controller\\Admin\\UserController::new'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/a(?'
                    .'|rticle(?'
                        .'|s/page(?:/(\\d+))?(*:233)'
                        .'|/([^/]++)(*:250)'
                    .')'
                    .'|dmin/(?'
                        .'|switch\\-language/([^/]++)(*:292)'
                        .'|c(?'
                            .'|ategories/([^/]++)/(?'
                                .'|edit(*:330)'
                                .'|show(*:342)'
                                .'|delete(*:356)'
                            .')'
                            .'|omments/(?'
                                .'|(\\d+)(*:381)'
                                .'|(\\d+)/approve(*:402)'
                                .'|(\\d+)/reject(*:422)'
                                .'|(\\d+)/spam(*:440)'
                                .'|(\\d+)/restore(*:461)'
                                .'|(\\d+)/delete(*:481)'
                                .'|reply/(\\d+)(*:500)'
                            .')'
                        .')'
                        .'|extensions/(?'
                            .'|plugins/(?'
                                .'|activate/([^/]++)(*:552)'
                                .'|deactivate/([^/]++)(*:579)'
                                .'|uninstall/([^/]++)(*:605)'
                            .')'
                            .'|themes/(?'
                                .'|activate/([^/]++)(*:641)'
                                .'|delete/([^/]++)(*:664)'
                            .')'
                        .')'
                        .'|languages/([^/]++)/(?'
                            .'|edit(*:700)'
                            .'|delete(*:714)'
                            .'|toggle\\-active(*:736)'
                            .'|set\\-default(*:756)'
                        .')'
                        .'|menus/(?'
                            .'|([^/]++)/(?'
                                .'|edit(*:790)'
                                .'|show(*:802)'
                                .'|delete(*:816)'
                            .')'
                            .'|builder/([^/]++)(*:841)'
                        .')'
                        .'|p(?'
                            .'|ages/([^/]++)/(?'
                                .'|edit(*:875)'
                                .'|delete(*:889)'
                            .')'
                            .'|osts/([^/]++)/(?'
                                .'|edit(*:919)'
                                .'|delete(*:933)'
                                .'|toggle\\-status(*:955)'
                            .')'
                        .')'
                        .'|tags/([^/]++)/(?'
                            .'|edit(*:986)'
                            .'|delete(*:1000)'
                        .')'
                        .'|users/([^/]++)/(?'
                            .'|edit(*:1032)'
                            .'|show(*:1045)'
                            .'|delete(*:1060)'
                            .'|toggle\\-status(*:1083)'
                        .')'
                    .')'
                .')'
                .'|/page/([^/]++)(*:1109)'
                .'|/categorie/([^/]++)(?'
                    .'|(*:1140)'
                    .'|/page(?:/(\\d+))?(*:1165)'
                .')'
                .'|/tag/([^/]++)(?'
                    .'|(*:1191)'
                    .'|/page(?:/(\\d+))?(*:1216)'
                .')'
                .'|/media/(?'
                    .'|(\\d+)(*:1241)'
                    .'|(\\d+)/edit(*:1260)'
                    .'|(\\d+)/delete(*:1281)'
                    .'|thumbnail/(\\d+)(*:1305)'
                    .'|(\\d+)/info(*:1324)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        233 => [[['_route' => 'frontend_posts_paginated', 'page' => 1, '_controller' => 'App\\Controller\\FrontendController::posts'], ['page'], null, null, false, true, null]],
        250 => [[['_route' => 'frontend_post_show', '_controller' => 'App\\Controller\\FrontendController::postShow'], ['slug'], null, null, false, true, null]],
        292 => [[['_route' => 'admin_switch_language', '_controller' => 'App\\Controller\\Admin\\AdminController::switchLanguage'], ['code'], null, null, false, true, null]],
        330 => [[['_route' => 'admin_categories_edit', '_controller' => 'App\\Controller\\Admin\\CategoryController::edit'], ['id'], null, null, false, false, null]],
        342 => [[['_route' => 'admin_categories_show', '_controller' => 'App\\Controller\\Admin\\CategoryController::show'], ['id'], null, null, false, false, null]],
        356 => [[['_route' => 'admin_categories_delete', '_controller' => 'App\\Controller\\Admin\\CategoryController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        381 => [[['_route' => 'admin_comments_show', '_controller' => 'App\\Controller\\Admin\\CommentController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        402 => [[['_route' => 'admin_comments_approve', '_controller' => 'App\\Controller\\Admin\\CommentController::approve'], ['id'], ['POST' => 0], null, false, false, null]],
        422 => [[['_route' => 'admin_comments_reject', '_controller' => 'App\\Controller\\Admin\\CommentController::reject'], ['id'], ['POST' => 0], null, false, false, null]],
        440 => [[['_route' => 'admin_comments_spam', '_controller' => 'App\\Controller\\Admin\\CommentController::markAsSpam'], ['id'], ['POST' => 0], null, false, false, null]],
        461 => [[['_route' => 'admin_comments_restore', '_controller' => 'App\\Controller\\Admin\\CommentController::restore'], ['id'], ['POST' => 0], null, false, false, null]],
        481 => [[['_route' => 'admin_comments_delete', '_controller' => 'App\\Controller\\Admin\\CommentController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        500 => [[['_route' => 'admin_comments_reply', '_controller' => 'App\\Controller\\Admin\\CommentController::reply'], ['id'], ['GET' => 0, 'POST' => 1], null, false, true, null]],
        552 => [[['_route' => 'admin_plugins_activate', '_controller' => 'App\\Controller\\Admin\\ExtensionController::activatePlugin'], ['pluginName'], null, null, false, true, null]],
        579 => [[['_route' => 'admin_plugins_deactivate', '_controller' => 'App\\Controller\\Admin\\ExtensionController::deactivatePlugin'], ['pluginName'], null, null, false, true, null]],
        605 => [[['_route' => 'admin_plugins_uninstall', '_controller' => 'App\\Controller\\Admin\\ExtensionController::uninstallPlugin'], ['pluginName'], null, null, false, true, null]],
        641 => [[['_route' => 'admin_themes_activate', '_controller' => 'App\\Controller\\Admin\\ExtensionController::activateTheme'], ['themeName'], null, null, false, true, null]],
        664 => [[['_route' => 'admin_themes_delete', '_controller' => 'App\\Controller\\Admin\\ExtensionController::deleteTheme'], ['themeName'], null, null, false, true, null]],
        700 => [[['_route' => 'admin_languages_edit', '_controller' => 'App\\Controller\\Admin\\LanguageController::edit'], ['id'], null, null, false, false, null]],
        714 => [[['_route' => 'admin_languages_delete', '_controller' => 'App\\Controller\\Admin\\LanguageController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        736 => [[['_route' => 'admin_languages_toggle_active', '_controller' => 'App\\Controller\\Admin\\LanguageController::toggleActive'], ['id'], ['POST' => 0], null, false, false, null]],
        756 => [[['_route' => 'admin_languages_set_default', '_controller' => 'App\\Controller\\Admin\\LanguageController::setDefault'], ['id'], ['POST' => 0], null, false, false, null]],
        790 => [[['_route' => 'admin_menus_edit', '_controller' => 'App\\Controller\\Admin\\MenuController::edit'], ['id'], null, null, false, false, null]],
        802 => [[['_route' => 'admin_menus_show', '_controller' => 'App\\Controller\\Admin\\MenuController::show'], ['id'], null, null, false, false, null]],
        816 => [[['_route' => 'admin_menus_delete', '_controller' => 'App\\Controller\\Admin\\MenuController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        841 => [[['_route' => 'admin_menus_builder', '_controller' => 'App\\Controller\\Admin\\MenuController::builder'], ['location'], null, null, false, true, null]],
        875 => [[['_route' => 'admin_pages_edit', '_controller' => 'App\\Controller\\Admin\\PageController::edit'], ['id'], null, null, false, false, null]],
        889 => [[['_route' => 'admin_pages_delete', '_controller' => 'App\\Controller\\Admin\\PageController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        919 => [[['_route' => 'admin_posts_edit', '_controller' => 'App\\Controller\\Admin\\PostController::edit'], ['id'], null, null, false, false, null]],
        933 => [[['_route' => 'admin_posts_delete', '_controller' => 'App\\Controller\\Admin\\PostController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        955 => [[['_route' => 'admin_posts_toggle_status', '_controller' => 'App\\Controller\\Admin\\PostController::toggleStatus'], ['id'], ['POST' => 0], null, false, false, null]],
        986 => [[['_route' => 'admin_tags_edit', '_controller' => 'App\\Controller\\Admin\\TagController::edit'], ['id'], null, null, false, false, null]],
        1000 => [[['_route' => 'admin_tags_delete', '_controller' => 'App\\Controller\\Admin\\TagController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1032 => [[['_route' => 'admin_users_edit', '_controller' => 'App\\Controller\\Admin\\UserController::edit'], ['id'], null, null, false, false, null]],
        1045 => [[['_route' => 'admin_users_show', '_controller' => 'App\\Controller\\Admin\\UserController::show'], ['id'], null, null, false, false, null]],
        1060 => [[['_route' => 'admin_users_delete', '_controller' => 'App\\Controller\\Admin\\UserController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1083 => [[['_route' => 'admin_users_toggle_status', '_controller' => 'App\\Controller\\Admin\\UserController::toggleStatus'], ['id'], ['POST' => 0], null, false, false, null]],
        1109 => [[['_route' => 'frontend_page_show', '_controller' => 'App\\Controller\\FrontendController::pageShow'], ['slug'], null, null, false, true, null]],
        1140 => [[['_route' => 'frontend_category_show', '_controller' => 'App\\Controller\\FrontendController::categoryShow'], ['slug'], null, null, false, true, null]],
        1165 => [[['_route' => 'frontend_category_show_paginated', 'page' => 1, '_controller' => 'App\\Controller\\FrontendController::categoryShow'], ['slug', 'page'], null, null, false, true, null]],
        1191 => [[['_route' => 'frontend_tag_show', '_controller' => 'App\\Controller\\FrontendController::tagShow'], ['slug'], null, null, false, true, null]],
        1216 => [[['_route' => 'frontend_tag_show_paginated', 'page' => 1, '_controller' => 'App\\Controller\\FrontendController::tagShow'], ['slug', 'page'], null, null, false, true, null]],
        1241 => [[['_route' => 'admin_media_show', '_controller' => 'App\\Controller\\Admin\\MediaController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1260 => [[['_route' => 'admin_media_edit', '_controller' => 'App\\Controller\\Admin\\MediaController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1281 => [[['_route' => 'admin_media_delete', '_controller' => 'App\\Controller\\Admin\\MediaController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1305 => [[['_route' => 'admin_media_thumbnail', '_controller' => 'App\\Controller\\Admin\\MediaController::thumbnail'], ['id'], ['GET' => 0], null, false, true, null]],
        1324 => [
            [['_route' => 'admin_media_info', '_controller' => 'App\\Controller\\Admin\\MediaController::info'], ['id'], ['GET' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
