<?php
class NoweAuto{
    protected $model;
    protected $cenaEuro;
    protected $kursEuroPLN;
    function __construct($model, $cenaEuro, $kursEuroPLN,){
        $this->model = $model;
        $this->cenaEuro = $cenaEuro;
        $this->kursEuroPLN = $kursEuroPLN;
    }
    function ObliczCene(){
        return $this->cenaEuro * $this->kursEuroPLN;
    }
}
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
        $cenaSamochodu = parent::obliczCene();
        return $cenaSamochodu + $this->alarm + $this->radio + $this->klimatyzacja;
    }
}
class Ubezpieczenie extends AutoZDodatkami{
    protected $procentowaWartoscUbezpieczenia;
    protected $liczbaLatPosiadania;
    function __construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja, $liczbaLatPosiadania, $procentowaWartoscUbezpieczenia){
        parent::__construct($model, $cenaEuro, $kursEuroPLN, $alarm, $radio, $klimatyzacja);
        $this->procentowaWartoscUbezpieczenia = $procentowaWartoscUbezpieczenia;
        $this->liczbaLatPosiadania = $liczbaLatPosiadania;
    }
    function ObliczCene(){
        $cenaSamochoduZDodatkami = parent::ObliczCene();
        return $this->procentowaWartoscUbezpieczenia * ($cenaSamochoduZDodatkami * ((100 - $this->liczbaLatPosiadania) / 100));
    }
}
?>