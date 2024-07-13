<?php

namespace App\Services\Cadastre\Domain;

/**
 * Общая информация
 *
 * Кадастровый номер XX:XX:XXXXX:XX
 * @property string $cadastreNumber
 * Дата присвоения кадастрового номера 07.11.2023
 * @property \DateTime $cadastreNumberAssignmentDate
 *
 * Характеристики объекта
 *
 * Адрес (местоположение)
 * Москва, ул. Ленина, д. 1, кв. 1
 * @property string $address
 *
 * Площадь, 99,9 кв.м
 * @property float $area
 *
 * Этаж 9
 * @property string $flore
 *
 * Сведения о кадастровой стоимости
 *
 * Кадастровая стоимость (руб) 9 999 999,99 руб
 * @property float $cadastreValue
 *
 * Дата определения 07.11.2023
 * @property \DateTime $cadastreValueDeterminationDate
 *
 */
class CadastreInformation
{
    /**
     * Data
     * @var array
     */
    private array $data = [];

    /**
     * @return string
     */
    public function getCadastreNumber(): string
    {
        return $this->data['cadastreNumber'] ?? '';
    }

    /**
     * @param string $cadastreNumber
     * @return $this
     */
    public function setCadastreNumber(string $cadastreNumber): static
    {
        $this->data['cadastreNumber'] = $cadastreNumber;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCadastreNumberAssignmentDate(): ?\DateTime
    {
        return $this->data['cadastreNumberAssignmentDate'] ?? null;
    }

    /**
     * @param \DateTime $cadastreNumberAssignmentDate
     * @return $this
     */
    public function setCadastreNumberAssignmentDate(\DateTime $cadastreNumberAssignmentDate): static
    {
        $this->data['cadastreNumberAssignmentDate'] = $cadastreNumberAssignmentDate;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->data['address'] ?? '';
    }

    /**
     * @param string $address
     * @return $this
     */
    public function setAddress(string $address): static
    {
        $this->data['address'] = $address;
        return $this;
    }

    /**
     * @return float
     */
    public function getArea(): float
    {
        return $this->data['area'] ?? 0;
    }

    /**
     * @param float $area
     * @return $this
     */
    public function setArea(float $area): static
    {
        $this->data['area'] = $area;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getFlore(): ?string
    {
        return $this->data['flore'] ?? '';
    }

    /**
     * @param string $flore
     * @return $this
     */
    public function setFlore(string $flore): static
    {
        $this->data['flore'] = $flore;
        return $this;
    }

    /**
     * @return float
     */
    public function getCadastreValue(): float
    {
        return $this->data['cadastreValue'] ?? 0;
    }

    /**
     * @param float $cadastreValue
     * @return $this
     */
    public function setCadastreValue(float $cadastreValue): static
    {
        $this->data['cadastreValue'] = $cadastreValue;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getCadastreValueDeterminationDate(): ?\DateTime
    {
        return $this->data['cadastreValueDeterminationDate'] ?? null;
    }

    /**
     * @param \DateTime $cadastreValueDeterminationDate
     * @return $this
     */
    public function setCadastreValueDeterminationDate(\DateTime $cadastreValueDeterminationDate): static
    {
        $this->data['cadastreValueDeterminationDate'] = $cadastreValueDeterminationDate;
        return $this;
    }


}