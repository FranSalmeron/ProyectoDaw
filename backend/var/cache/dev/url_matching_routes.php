<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/api/verify-token' => [[['_route' => 'app_verify_token', '_controller' => 'App\\Controller\\AuthController::verifyToken'], null, ['POST' => 0], null, false, false, null]],
        '/api/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\AuthController::login'], null, ['POST' => 0], null, false, false, null]],
        '/car' => [[['_route' => 'app_car_index', '_controller' => 'App\\Controller\\CarController::index'], null, ['GET' => 0], null, true, false, null]],
        '/car/new' => [[['_route' => 'app_car_new', '_controller' => 'App\\Controller\\CarController::new'], null, ['POST' => 0], null, false, false, null]],
        '/chat/car' => [[['_route' => 'app_chat_car_index', '_controller' => 'App\\Controller\\ChatCarController::index'], null, ['GET' => 0], null, true, false, null]],
        '/chat/car/new' => [[['_route' => 'app_chat_car_new', '_controller' => 'App\\Controller\\ChatCarController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/chat' => [[['_route' => 'chat', '_controller' => 'App\\Controller\\ChatController::index'], null, null, null, false, false, null]],
        '/chat/message' => [[['_route' => 'app_chat_message_index', '_controller' => 'App\\Controller\\ChatMessageController::index'], null, ['GET' => 0], null, true, false, null]],
        '/chat/message/new' => [[['_route' => 'app_chat_message_new', '_controller' => 'App\\Controller\\ChatMessageController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/' => [[['_route' => 'app_main', '_controller' => 'App\\Controller\\MainController::main'], null, null, null, false, false, null]],
        '/csrf-token' => [[['_route' => 'app_csrf_token', '_controller' => 'App\\Controller\\MainController::csrfToken'], null, ['GET' => 0], null, false, false, null]],
        '/review' => [[['_route' => 'app_review_index', '_controller' => 'App\\Controller\\ReviewController::index'], null, ['GET' => 0], null, true, false, null]],
        '/review/new' => [[['_route' => 'app_review_new', '_controller' => 'App\\Controller\\ReviewController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/transaction' => [[['_route' => 'app_transaction_index', '_controller' => 'App\\Controller\\TransactionController::index'], null, ['GET' => 0], null, true, false, null]],
        '/transaction/new' => [[['_route' => 'app_transaction_new', '_controller' => 'App\\Controller\\TransactionController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/user' => [[['_route' => 'app_user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, true, false, null]],
        '/user/new' => [[['_route' => 'app_user_new', '_controller' => 'App\\Controller\\UserController::new'], null, ['POST' => 0], null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/api(?'
                    .'|/\\.well\\-known/genid/([^/]++)(*:43)'
                    .'|(?:/(index)(?:\\.([^/]++))?)?(*:78)'
                    .'|/(?'
                        .'|docs(?:\\.([^/]++))?(*:108)'
                        .'|contexts/([^.]+)(?:\\.(jsonld))?(*:147)'
                    .')'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:188)'
                    .'|wdt/([^/]++)(*:208)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:254)'
                            .'|router(*:268)'
                            .'|exception(?'
                                .'|(*:288)'
                                .'|\\.css(*:301)'
                            .')'
                        .')'
                        .'|(*:311)'
                    .')'
                .')'
                .'|/c(?'
                    .'|ar/(?'
                        .'|car/user/([^/]++)(*:349)'
                        .'|([^/]++)(?'
                            .'|(*:368)'
                            .'|/(?'
                                .'|edit(*:384)'
                                .'|delete(*:398)'
                            .')'
                        .')'
                    .')'
                    .'|hat/(?'
                        .'|car/([^/]++)(?'
                            .'|(*:431)'
                            .'|/edit(*:444)'
                            .'|(*:452)'
                        .')'
                        .'|message/([^/]++)(?'
                            .'|(*:480)'
                            .'|/edit(*:493)'
                            .'|(*:501)'
                        .')'
                    .')'
                .')'
                .'|/review/([^/]++)(?'
                    .'|(*:531)'
                    .'|/edit(*:544)'
                    .'|(*:552)'
                .')'
                .'|/transaction/([^/]++)(?'
                    .'|(*:585)'
                    .'|/edit(*:598)'
                    .'|(*:606)'
                .')'
                .'|/user/([^/]++)(?'
                    .'|(*:632)'
                    .'|/(?'
                        .'|edit(*:648)'
                        .'|delete(*:662)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        43 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        78 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        108 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        147 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        188 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        208 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        254 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        268 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        288 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        301 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        311 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        349 => [[['_route' => 'app_car_index_by_user', '_controller' => 'App\\Controller\\CarController::indexByUser'], ['id'], ['GET' => 0], null, false, true, null]],
        368 => [[['_route' => 'app_car_show', '_controller' => 'App\\Controller\\CarController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        384 => [[['_route' => 'app_car_edit', '_controller' => 'App\\Controller\\CarController::edit'], ['id'], ['PATCH' => 0], null, false, false, null]],
        398 => [[['_route' => 'app_car_delete', '_controller' => 'App\\Controller\\CarController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        431 => [[['_route' => 'app_chat_car_show', '_controller' => 'App\\Controller\\ChatCarController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        444 => [[['_route' => 'app_chat_car_edit', '_controller' => 'App\\Controller\\ChatCarController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        452 => [[['_route' => 'app_chat_car_delete', '_controller' => 'App\\Controller\\ChatCarController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        480 => [[['_route' => 'app_chat_message_show', '_controller' => 'App\\Controller\\ChatMessageController::show'], ['chat'], ['GET' => 0], null, false, true, null]],
        493 => [[['_route' => 'app_chat_message_edit', '_controller' => 'App\\Controller\\ChatMessageController::edit'], ['chat'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        501 => [[['_route' => 'app_chat_message_delete', '_controller' => 'App\\Controller\\ChatMessageController::delete'], ['chat'], ['POST' => 0], null, false, true, null]],
        531 => [[['_route' => 'app_review_show', '_controller' => 'App\\Controller\\ReviewController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        544 => [[['_route' => 'app_review_edit', '_controller' => 'App\\Controller\\ReviewController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        552 => [[['_route' => 'app_review_delete', '_controller' => 'App\\Controller\\ReviewController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        585 => [[['_route' => 'app_transaction_show', '_controller' => 'App\\Controller\\TransactionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        598 => [[['_route' => 'app_transaction_edit', '_controller' => 'App\\Controller\\TransactionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        606 => [[['_route' => 'app_transaction_delete', '_controller' => 'App\\Controller\\TransactionController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        632 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        648 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        662 => [
            [['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['POST' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
