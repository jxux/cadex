<?php

namespace App\CoreJxux\WS\Services;

use App\CoreJxux\WS\Response\BaseResult;
use App\CoreJxux\WS\Response\SummaryResult;

/**
 * Class SummarySender.
 */
class SummarySender extends BaseSunat
{
    /**
     * @param string $filename
     * @param string $content
     *
     * @return BaseResult
     */
    public function send($filename, $content)
    {
        $client = $this->getClient();
        $result = new SummaryResult();

        try {
            $zipContent = $this->compress($filename.'.xml', $content);
            $params = [
                'fileName' => $filename.'.zip',
                'contentFile' => $zipContent,
            ];
            $response = $client->call('sendSummary', ['parameters' => $params]);
            $result
                ->setTicket($response->ticket)
                ->setSuccess(true);
        } catch (\SoapFault $e) {
            $result->setError($this->getErrorFromFault($e));
        }

        return $result;
    }
}
