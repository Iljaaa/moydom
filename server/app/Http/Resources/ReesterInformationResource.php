<?php

namespace App\Http\Resources;

use App\Services\Cadastre\Domain\CadastreInformation;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReesterInformationResource extends JsonResource
{
    const DATE_FORMAT = 'd.m.Y';

    public function __construct(private CadastreInformation $result)
    {
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $vd = $this->result->getCadastreValueDeterminationDate();
        $nd = $this->result->getCadastreNumberAssignmentDate();

        return [
            'address' => $this->result->getAddress(),
            'flore' => $this->result->getFlore(),
            'area' => $this->result->getArea(),
            'cadastre_value' => $this->result->getCadastreValue(),
            'cadastre_value_date' => ($vd) ? $vd->format(static::DATE_FORMAT) : '',
            'cadastre_number' => $this->result->getCadastreNumber(),
            'cadastre_number_date' => ($nd) ? $nd->format(static::DATE_FORMAT) : '',
        ];
    }
}
