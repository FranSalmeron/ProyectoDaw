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
        '/api/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\AuthController::login'], null, ['POST' => 0], null, false, false, null]],
        '/api/refreshToken' => [[['_route' => 'app_refresh_token', '_controller' => 'App\\Controller\\AuthController::refreshToken'], null, ['POST' => 0], null, false, false, null]],
        '/car' => [[['_route' => 'app_car_index', '_controller' => 'App\\Controller\\CarController::index'], null, ['GET' => 0], null, true, false, null]],
        '/car/new' => [[['_route' => 'app_car_new', '_controller' => 'App\\Controller\\CarController::new'], null, ['POST' => 0], null, false, false, null]],
        '/favorite' => [[['_route' => 'app_car_favorite_index', '_controller' => 'App\\Controller\\CarFavoriteController::index'], null, ['GET' => 0], null, true, false, null]],
        '/favorite/new' => [[['_route' => 'app_car_favorite_new', '_controller' => 'App\\Controller\\CarFavoriteController::new'], null, ['POST' => 0], null, false, false, null]],
        '/chat/index' => [[['_route' => 'app_chat_car_index', '_controller' => 'App\\Controller\\ChatController::show'], null, ['GET' => 0], null, false, false, null]],
        '/chat/create' => [[['_route' => 'app_chat_car_create', '_controller' => 'App\\Controller\\ChatController::createChat'], null, ['POST' => 0], null, false, false, null]],
        '/' => [[['_route' => 'app_main', '_controller' => 'App\\Controller\\MainController::main'], null, null, null, false, false, null]],
        '/transaction' => [[['_route' => 'app_transaction_index', '_controller' => 'App\\Controller\\TransactionController::index'], null, ['GET' => 0], null, true, false, null]],
        '/transaction/new' => [[['_route' => 'app_transaction_new', '_controller' => 'App\\Controller\\TransactionController::new'], null, ['POST' => 0], null, false, false, null]],
        '/user/index' => [[['_route' => 'app_user_index', '_controller' => 'App\\Controller\\UserController::index'], null, ['GET' => 0], null, false, false, null]],
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
                    .'|hat/([^/]++)/(?'
                        .'|delete(*:431)'
                        .'|chats(*:444)'
                    .')'
                .')'
                .'|/favorite/([^/]++)(?'
                    .'|/(?'
                        .'|favorites(*:488)'
                        .'|edit(*:500)'
                        .'|delete(*:514)'
                    .')'
                    .'|(*:523)'
                .')'
                .'|/ChatMessage/(?'
                    .'|([^/]++)(?'
                        .'|(*:559)'
                        .'|/send(*:572)'
                    .')'
                    .'|task/([^/]++)(*:594)'
                    .'|([^/]++)/messages(*:619)'
                .')'
                .'|/transaction/([^/]++)(?'
                    .'|(*:652)'
                    .'|/edit(*:665)'
                    .'|(*:673)'
                .')'
                .'|/user/([^/]++)(?'
                    .'|(*:699)'
                    .'|/(?'
                        .'|edit(*:715)'
                        .'|delete(*:729)'
                        .'|toggle\\-(?'
                            .'|admin(*:753)'
                            .'|banned(*:767)'
                        .')'
                        .'|info(*:780)'
                        .'|change\\-password(*:804)'
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
        368 => [[['_route' => 'app_car_show', '_controller' => 'App\\Controller\\CarController::showById'], ['id'], ['GET' => 0], null, false, true, null]],
        384 => [[['_route' => 'app_car_edit', '_controller' => 'App\\Controller\\CarController::edit'], ['id'], ['PATCH' => 0], null, false, false, null]],
        398 => [[['_route' => 'app_car_delete', '_controller' => 'App\\Controller\\CarController::delete'], ['id'], ['DELETE' => 0], null, false, false, null]],
        431 => [[['_route' => 'app_chat_car_delete', '_controller' => 'App\\Controller\\ChatController::delete'], ['id'], ['DELETE' => 0], null, false, false, null]],
        444 => [[['_route' => 'app_chat_user_chats', '_controller' => 'App\\Controller\\ChatController::getUserChats'], ['userId'], ['GET' => 0], null, false, false, null]],
        488 => [[['_route' => 'app_car_favorite_user_favorites', '_controller' => 'App\\Controller\\CarFavoriteController::getUserFavorites'], ['userId'], ['GET' => 0], null, false, false, null]],
        500 => [[['_route' => 'app_car_favorite_edit', '_controller' => 'App\\Controller\\CarFavoriteController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        514 => [[['_route' => 'app_car_favorite_delete', '_controller' => 'App\\Controller\\CarFavoriteController::delete'], ['favoriteId'], ['DELETE' => 0], null, false, false, null]],
        523 => [[['_route' => 'app_car_favorite_show', '_controller' => 'App\\Controller\\CarFavoriteController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        559 => [[['_route' => 'app_ChatMessage_message_show', '_controller' => 'App\\Controller\\ChatMessageController::show'], ['ChatMessage'], ['GET' => 0], null, false, true, null]],
        572 => [[['_route' => 'app_ChatMessage_message_send', '_controller' => 'App\\Controller\\ChatMessageController::sendMessage'], ['chatId'], ['POST' => 0], null, false, false, null]],
        594 => [[['_route' => 'app_check_task_status', '_controller' => 'App\\Controller\\ChatMessageController::checkTaskStatus'], ['taskId'], ['GET' => 0], null, false, true, null]],
        619 => [[['_route' => 'app_ChatMessage_load_messages', '_controller' => 'App\\Controller\\ChatMessageController::loadMessages'], ['chatId'], ['POST' => 0], null, false, false, null]],
        652 => [[['_route' => 'app_transaction_show', '_controller' => 'App\\Controller\\TransactionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        665 => [[['_route' => 'app_transaction_edit', '_controller' => 'App\\Controller\\TransactionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        673 => [[['_route' => 'app_transaction_delete', '_controller' => 'App\\Controller\\TransactionController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        699 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        715 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['POST' => 0], null, false, false, null]],
        729 => [[['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        753 => [[['_route' => 'app_user_toggle_admin', '_controller' => 'App\\Controller\\UserController::toggleAdmin'], ['id'], ['POST' => 0], null, false, false, null]],
        767 => [[['_route' => 'app_user_toggle_banned', '_controller' => 'App\\Controller\\UserController::toggleBanned'], ['id'], ['POST' => 0], null, false, false, null]],
        780 => [[['_route' => 'app_user_info', '_controller' => 'App\\Controller\\UserController::getUserInfo'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        804 => [
            [['_route' => 'user_change_password', '_controller' => 'App\\Controller\\UserController::changePassword'], ['id'], ['POST' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
