<?php

error_reporting(1);

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');

require_once('application/Answer.php');
require_once('application/Application.php');

function result($params) {
    $method = $params['method'];
    if ($method) {
        $app = new Application();
        switch ($method) {
            // user
            case 'logout': return $app->logout($params);
            case 'registration': return $app->registration($params);
            // chat
            case 'sendMessage': return $app->sendMessage($params);
            case 'getMessages': return $app->getMessages($params); // loop

            // main
            case 'getOrganizationInfo': return $app->getOrganizationInfo($params);
            case 'getBanners': return $app->getBanners($params);
            case 'getFAQ': return $app->getFAQ($params);
            // other pages
            //...

            case 'login': return $app->login($params); // Орлов (+ столбец "роль")
            case 'addBanner': return $app->addBanner($params); // POST Кашурникова
            case 'deleteBanner': return $app->deleteBanner($params); // Шергазиев
            case 'updateBanner': return $app->updateBanner($params); // Сысоев POST (уметь скрывать баннер)
            case 'setBannerOrder': return $app->setBannerOrder($params); // Джафаров 
            // для новости записывать дату
            case 'getNews': return $app->getNews($params); // Сабирова
            case 'addNews': return $app->addNews($params); // Маслова POST
            case 'deleteNews': return $app->deleteNews($params); // Коротков
            case 'updateNews': return $app->updateNews($params); // Загуляев POST (уметь скрывать баннер)
            case 'createRequest': return $app->createRequest($params); // Гилазиев
            case 'getRequests': return $app->getRequests($params); // Кожевников
            case 'answerToRequest': return $app->answerToRequest($params); // Широбоко

            case 'addMap': return $app -> addMap($params);
            

            default: return ['error' => 102];
        }
    }
    return ['error' => 101];
}

echo json_encode(Answer::response(result($_GET)), JSON_UNESCAPED_UNICODE);
