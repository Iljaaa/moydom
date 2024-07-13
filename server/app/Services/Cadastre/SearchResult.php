<?php

namespace App\Services\Cadastre;

use App\Services\Cadastre\Domain\CadastreInformation;

/**
 * Search result aggregate
 */
class SearchResult
{
    /**
     * @var string
     */
    private string $errorCode = '';

    private ?CadastreInformation $information = null;

    public function __construct(readonly private bool $isSuccess)
    {
    }

    /**
     * Create result with fail
     * @param string $errorCode
     * @return SearchResult
     */
    public static function createFailResult(string $errorCode): SearchResult
    {
        return (new static(false))
            ->setErrorCode($errorCode);
    }

    /**
     * Create result with success
     * @return SearchResult
     */
    public static function createSuccessResult(): SearchResult
    {
        return (new static(true));
    }

    /**
     * @return bool
     */
    public function isSuccess(): bool
    {
        return $this->isSuccess;
    }

    /**
     * @param string $errorCode
     * @return $this
     */
    public function setErrorCode(string $errorCode): static
    {
        $this->errorCode = $errorCode;
        return $this;
    }

    /**
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    /**
     * @param CadastreInformation|null $information
     * @return $this
     */
    public function setInformation(?CadastreInformation $information): static
    {
        $this->information = $information;
        return $this;
    }

    /**
     * @return CadastreInformation
     */
    public function getInformation(): CadastreInformation
    {
        return $this->information;
    }
}