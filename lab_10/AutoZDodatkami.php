<?php
class AutoZDodatkami extends NoweAuto{
    protected $alarm;
    protected $radio;
    protected $klimatyzacja;

    function __construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja){
        parent::__construct($model, $cenaEuro, $kursEuroPLN);
        $this->alarm = $radio;
        $this->radio = $radio;
        $this->klimatyzacja = $klimatyzacja;
    }

    function ObliczCene(){
        
    }
}
?>