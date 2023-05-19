<?php
class NoweAuto{
    protected $model;
    protected $cenaEuro;
    protected $kursEuroPLN;

    public function __construct($model, $cenaEuro, $kursEuroPLN)
    {
      $this->model = $model;
      $this->cenaEuro = $cenaEuro;
      $this->kursEuroPLN = $kursEuroPLN;
    }

    function ObliczCene(){
        return $this->cenaEuro * $this->kursEuroPLN;
    }
}
?>