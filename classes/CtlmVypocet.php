<?php

/**
 * Data objekt vypoctu kalkulace
 */
class CtlmVypocet {

	/**
	 * status vypoctu
	 * @var string ok|error
	 */
	public $status;
	
	/**
	 * info hlaska v pripade chyby nebo zmeny vypoctu
	 * @var string
	 */
	public $info;
	
	
	/**
	 * kod baremu (id z ciselniku)
	 * @var string
	 */
	public $kodBaremu;
	
	/**
	 * kod pojisteni (id z ciselniku)
	 * @var string
	 */
	public $kodPojisteni;
	
	/**
	 * cena zbozi
	 * @var int
	 */
	public $cenaZbozi;
	
	/**
	 * prima platba
	 * @var int
	 */
	public $primaPlatba;
	
	/**
	 * vyse uveru (cena zbozi - prima platba)
	 * @var int
	 */
	public $vyseUveru;
	
	/**
	 * pocet splatek
	 * @var int
	 */
	public $pocetSplatek;
	
	/**
	 * odklad 
	 * @var int
	 */
	public $odklad;
	
	/**
	 * zdrama
	 * @var int
	 */
	public $zdarma;
	
	/**
	 * vyse splatky
	 * @var int
	 */
	public $vyseSplatky;
	
	/**
	 * vyse splatky bez pojisteni
	 * @var int
	 */
	public $vyseSplatkyBezPojisteni;
	
	/**
	 * cena uveru
	 * @var int
	 */
	public $cenaUveru;
	
	
	/**
	 * RPSN
	 * @var float
	 */
	public $RPSN;
	
	/**
	 * urokova sazba
	 * @var float
	 */
	public $ursaz;
	
	/**
	 * celkova castka (vyse splatky
	 * @var int
	 */
	public $celkovaCastka;
	
	/**
	 * opce (pokud jsou u baremu zapnute)
	 * @var CtlmVypocet
	 */
	public $opce;
	
	/**
	 * doplatek u opce
	 * @var int
	 */
	public $doplatek;
	
	/**
	 * naplni parametry objektu podle dat v POSTu
	 * @param array $data
	 */
	public function fill($data) {
		foreach ($data as $property=>$value) {
			if (property_exists($this, $property))
				$this->$property = $value;
		}
	}
	
	/**
	 * vrati data ve formatu JSON pro pouziti v ajax volani
	 * @return string
	 */
	public function getJsonData() {
		return json_encode($this);
	}
 	
	/**
	 * vrati query parametry pro dotaz na sluzbu kalkulacku
	 * @return string
	 */
	public function getUrlParams()
	{
		$params = array(
			'kodBaremu',
			'kodPojisteni',
			'cenaZbozi',
			'primaPlatba',
			'vyseUveru',
			'pocetSplatek',
			'odklad',
			'zdarma',
			'vyseSplatky',
			'cenaUveru',
			'RPSN',
			'ursaz'
		);
		
		$query = array();
		foreach ($params as $param) {
			$query[] = $param .'=' . $this->$param;
		}
		return '&'.implode('&', $query);
	}
}