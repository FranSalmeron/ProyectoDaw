<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
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
        '/user/prueba' => [[['_route' => 'app_user_prueba', '_controller' => 'App\\Controller\\UserController::prueba'], null, ['GET' => 0], null, false, false, null]],
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
                .'|/c(?'
                    .'|ar/(?'
                        .'|car/user/([^/]++)(*:185)'
                        .'|([^/]++)(?'
                            .'|(*:204)'
                            .'|/(?'
                                .'|edit(*:220)'
                                .'|delete(*:234)'
                            .')'
                        .')'
                    .')'
                    .'|hat/([^/]++)/(?'
                        .'|delete(*:267)'
                        .'|chats(*:280)'
                    .')'
                .')'
                .'|/favorite/([^/]++)(?'
                    .'|/(?'
                        .'|favorites(*:324)'
                        .'|edit(*:336)'
                        .'|delete(*:350)'
                    .')'
                    .'|(*:359)'
                .')'
                .'|/ChatMessage/(?'
                    .'|([^/]++)(?'
                        .'|(*:395)'
                        .'|/send(*:408)'
                    .')'
                    .'|task/([^/]++)(*:430)'
                    .'|([^/]++)/messages(*:455)'
                .')'
                .'|/transaction/([^/]++)(?'
                    .'|(*:488)'
                    .'|/edit(*:501)'
                    .'|(*:509)'
                .')'
                .'|/user/([^/]++)(?'
                    .'|(*:535)'
                    .'|/(?'
                        .'|edit(*:551)'
                        .'|delete(*:565)'
                        .'|toggle\\-(?'
                            .'|admin(*:589)'
                            .'|banned(*:603)'
                        .')'
                        .'|info(*:616)'
                        .'|change\\-password(*:640)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        43 => [[['_route' => 'api_genid', '_controller' => 'api_platform.action.not_exposed', '_api_respond' => 'true'], ['id'], null, null, false, true, null]],
        78 => [[['_route' => 'api_entrypoint', '_controller' => 'api_platform.action.entrypoint', '_format' => '', '_api_respond' => 'true', 'index' => 'index'], ['index', '_format'], null, null, false, true, null]],
        108 => [[['_route' => 'api_doc', '_controller' => 'api_platform.action.documentation', '_format' => '', '_api_respond' => 'true'], ['_format'], null, null, false, true, null]],
        147 => [[['_route' => 'api_jsonld_context', '_controller' => 'api_platform.jsonld.action.context', '_format' => 'jsonld', '_api_respond' => 'true'], ['shortName', '_format'], null, null, false, true, null]],
        185 => [[['_route' => 'app_car_index_by_user', '_controller' => 'App\\Controller\\CarController::indexByUser'], ['id'], ['GET' => 0], null, false, true, null]],
        204 => [[['_route' => 'app_car_show', '_controller' => 'App\\Controller\\CarController::showById'], ['id'], ['GET' => 0], null, false, true, null]],
        220 => [[['_route' => 'app_car_edit', '_controller' => 'App\\Controller\\CarController::edit'], ['id'], ['PATCH' => 0], null, false, false, null]],
        234 => [[['_route' => 'app_car_delete', '_controller' => 'App\\Controller\\CarController::delete'], ['id'], ['DELETE' => 0], null, false, false, null]],
        267 => [[['_route' => 'app_chat_car_delete', '_controller' => 'App\\Controller\\ChatController::delete'], ['id'], ['DELETE' => 0], null, false, false, null]],
        280 => [[['_route' => 'app_chat_user_chats', '_controller' => 'App\\Controller\\ChatController::getUserChats'], ['userId'], ['GET' => 0], null, false, false, null]],
        324 => [[['_route' => 'app_car_favorite_user_favorites', '_controller' => 'App\\Controller\\CarFavoriteController::getUserFavorites'], ['userId'], ['GET' => 0], null, false, false, null]],
        336 => [[['_route' => 'app_car_favorite_edit', '_controller' => 'App\\Controller\\CarFavoriteController::edit'], ['id'], ['PUT' => 0], null, false, false, null]],
        350 => [[['_route' => 'app_car_favorite_delete', '_controller' => 'App\\Controller\\CarFavoriteController::delete'], ['favoriteId'], ['DELETE' => 0], null, false, false, null]],
        359 => [[['_route' => 'app_car_favorite_show', '_controller' => 'App\\Controller\\CarFavoriteController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        395 => [[['_route' => 'app_ChatMessage_message_show', '_controller' => 'App\\Controller\\ChatMessageController::show'], ['ChatMessage'], ['GET' => 0], null, false, true, null]],
        408 => [[['_route' => 'app_ChatMessage_message_send', '_controller' => 'App\\Controller\\ChatMessageController::sendMessage'], ['chatId'], ['POST' => 0], null, false, false, null]],
        430 => [[['_route' => 'app_check_task_status', '_controller' => 'App\\Controller\\ChatMessageController::checkTaskStatus'], ['taskId'], ['GET' => 0], null, false, true, null]],
        455 => [[['_route' => 'app_ChatMessage_load_messages', '_controller' => 'App\\Controller\\ChatMessageController::loadMessages'], ['chatId'], ['POST' => 0, 'GET' => 1], null, false, false, null]],
        488 => [[['_route' => 'app_transaction_show', '_controller' => 'App\\Controller\\TransactionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        501 => [[['_route' => 'app_transaction_edit', '_controller' => 'App\\Controller\\TransactionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        509 => [[['_route' => 'app_transaction_delete', '_controller' => 'App\\Controller\\TransactionController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        535 => [[['_route' => 'app_user_show', '_controller' => 'App\\Controller\\UserController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        551 => [[['_route' => 'app_user_edit', '_controller' => 'App\\Controller\\UserController::edit'], ['id'], ['POST' => 0], null, false, false, null]],
        565 => [[['_route' => 'app_user_delete', '_controller' => 'App\\Controller\\UserController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        589 => [[['_route' => 'app_user_toggle_admin', '_controller' => 'App\\Controller\\UserController::toggleAdmin'], ['id'], ['POST' => 0], null, false, false, null]],
        603 => [[['_route' => 'app_user_toggle_banned', '_controller' => 'App\\Controller\\UserController::toggleBanned'], ['id'], ['POST' => 0], null, false, false, null]],
        616 => [[['_route' => 'app_user_info', '_controller' => 'App\\Controller\\UserController::getUserInfo'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        640 => [
            [['_route' => 'user_change_password', '_controller' => 'App\\Controller\\UserController::changePassword'], ['id'], ['POST' => 0], null, false, false, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
