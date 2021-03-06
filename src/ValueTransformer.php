<?php
namespace MateuszBlaszczyk\TcxToJson;

class ValueTransformer
{
    protected $gpsAccuracy = 6;

    protected $distanceAccuracy = 5;

    protected $altitudeAccuracy = 2;

    protected $timestampAccuracy = 0;

    public function substrGPSCoordinate($value)
    {
        $dotPos = strpos($value, '.');

        if (!$dotPos) {
            return $value;
        }

        return substr($value, 0, $dotPos + $this->gpsAccuracy + 1);
    }

    public function roundAltitude($value)
    {
        return round($value, $this->altitudeAccuracy);
    }

    public function roundTimestamp($value)
    {
        return round($value, $this->timestampAccuracy);
    }

    public function roundDistance($value)
    {
        return round($value / 1000, $this->distanceAccuracy);
    }

    public function transformTime($value)
    {
        if (!$value) {
            return null;
        }
        return strtotime($value);
    }
}