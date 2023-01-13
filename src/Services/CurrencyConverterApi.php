<?php

namespace App\Services;

class CurrencyConverterApi
{
    /**
     * @throws \Exception
     * @todo Documentation at https://exchangerate.host/#/#docs
     */
    private function currencyConverter(string $convertfrom, string $convertto, string $amount): float
    {

        $response = "";
        if(!is_numeric($amount)) {
            throw new \Exception("Invalid data");
        }
        $req_url = 'https://api.exchangerate.host/convert?from='.strtoupper($convertfrom).'&to='.strtoupper($convertto).'&amount='.$amount;
        $response_json = file_get_contents($req_url);
        if(false !== $response_json) {
            try {
                $response = json_decode($response_json);
                if($response->success === true) {
                    return $response;
                }
            } catch(\Exception $e) {
                throw new \Exception("Conversion failed",500);
            }
        }
        return $response;
    }

    public function calculateCurrency(string $from,string $to,string $amount)
    {
        $converter = $this->currencyConverter($from,$to,$amount);

        dd($converter['result']);
    }
}