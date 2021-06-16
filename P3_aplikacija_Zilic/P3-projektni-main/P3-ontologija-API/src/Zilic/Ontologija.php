<?php

namespace Zilic;

/**
 * @Entity @Table(name="ontologija")
 **/


class Ontologija 

{
    /** @id @Column(type="integer") @GeneratedValue **/
    protected $sifra;

    /**
    * @Column(type="string")
    */
    private $glumac;

   /**
    * @Column(type="string")
    */
    private $drzava;

    /**
    * @Column(type="integer")
    */
    private $godina;

    /**
    * @Column(type="string")
    */
    private $nagrada;


    /**
    * @Column(type="string")
    */

    private $heroj;

   

 

    
    public function getSifra(){
      return $this->sifra;
    }
  
    public function setSifra($sifra){
      $this->sifra = $sifra;
    }

    
    public function getGlumac(){
      return $this->glumac;
    }
  
    public function setGlumac($glumac){
      $this->glumac = $glumac;
    }
  
    public function getDrzava(){
      return $this->drzava;
    }
  
    public function setDrzava($drzava){
      $this->drzava = $drzava;
    }
  
    public function getGodina(){
      return $this->godina;
    }
  
    public function setGodina($godina){
      $this->godina = $godina;
    }
  
    public function getNagrada(){
      return $this->nagrada;
    }
  
    public function setNagrada($nagrada){
      $this->nagrada = $nagrada;
    }
  
    public function getHeroj(){
      return $this->heroj;
    }
  
    public function setHeroj($heroj){
      $this->heroj = $heroj;
    }

  
   


    public function setPodaci($podaci)
    {
      foreach($podaci as $kljuc => $vrijednost){
        $this->{$kljuc} = $vrijednost;
      }
    }
    
  }

?>