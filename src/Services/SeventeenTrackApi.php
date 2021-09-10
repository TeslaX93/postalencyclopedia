<?php

namespace App\Services;

use App\Model\Carrier;

class SeventeenTrackApi
{
    private const KEY = "34063038A06CF900F928217ECAB673CD";
    private const URL_CARRIERS = "https://www.17track.net/en/apicarrier";
    private const URL_COUNTRIES = "https://www.17track.net/en/apicountry";
    private const URL = "https://api.17track.net/track/v1/register";

    /**
     * @return Carrier[]
     */
    public function getCarriers(bool $onlyNationalCarriers = false): array
    {

        $jsonCarriers = file_get_contents(self::URL_CARRIERS);
        $carrierList = json_decode($jsonCarriers, true, 512, JSON_THROW_ON_ERROR);
        $jsonCountries = file_get_contents(self::URL_COUNTRIES);
        $countriesList = json_decode($jsonCountries, true, 512, JSON_THROW_ON_ERROR);

        $carriers = [];

        $countries = [];
        $countries['0000'] = "(no data)";
        foreach ($countriesList as $country) {
            $countries[(string) $country['key']] = $country['_name'];
        }

        if ($onlyNationalCarriers) {
            foreach ($carrierList as $idx => $carrier) {
                if ($carrier['_country' === '0000']) {
                    unset($carrierList[$idx]);
                    continue;
                }
                $carriers[] = new Carrier(
                    $carrier['_canTrack'],
                    $countries[$carrier['_country']],
                    $carrier['_url'],
                    $carrier['_name']
                );
            }
        }
        return $carriers;
    }
}
