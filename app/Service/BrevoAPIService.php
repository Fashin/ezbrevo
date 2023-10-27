<?php

namespace App\Service;

use GuzzleHttp\Client;
use Brevo\Client\Configuration;
use Brevo\Client\Api\ContactsApi;

class BrevoAPIService {

    private static function getDefaultConfiguration($brevo_key) {
        return Configuration::getDefaultConfiguration()->setApiKey('api-key', $brevo_key);
    }

    public static function retrieveBrevoLeads($brevo_key, $limit, $offset) {
        $config = self::getDefaultConfiguration($brevo_key);

        $apiInstance = new ContactsApi(new Client(), $config);

        try {
            return $apiInstance->getContacts($limit, $offset);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public static function getMaxLeads($brevo_key) {
        $contacts = self::retrieveBrevoLeads($brevo_key, 1, 0);

        return is_string($contacts) ? $contacts : $contacts->getCount();
    }
}