<?php

namespace IBoot\Platform\app\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

/**
 * @method getMessage()
 */
class UserException extends Exception
{
    /**
     * @var mixed|null
     */
    private mixed $customMessage;

    public function __construct($exceptionMessage, $customMessage = null)
    {
        $this->message = parent::__construct($exceptionMessage);
        $this->customMessage = $customMessage;
    }

    public function report(): void
    {
        Log::error($this->message);
    }

    public function render(): JsonResponse
    {
        return responseJson(null, false, $this->customMessage);
    }
}
