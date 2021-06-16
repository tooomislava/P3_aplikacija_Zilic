<?php
require 'vendor/autoload.php';
require 'bootstrap.php';

use Zilic\Ontologija;
use Composer\Autoload\ClassLoader;

Flight::route('/', function () {

  $foaf = \EasyRdf\Graph::newAndLoad('https://oziz.ffos.hr/nastava20202021/tzilic_20/ontologija/rdf/tzilic.rdf');
  $info = $foaf->dump();
  echo "<h2>Ontologija za  zadatak iz P3:</h2> <br/><br/>" . $info;
});

Flight::route('GET /search', function () {

  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $repozitorij = $em->getRepository('Zilic\Ontologija');
  $zapisi = $repozitorij->findAll();
  echo $doctrineBootstrap->getJson($zapisi);
});


Flight::route(
  'GET /napuni_bazu', function () {

    $foaf = \EasyRdf\Graph::newAndLoad('https://oziz.ffos.hr/nastava20202021/tzilic_20/ontologija/rdf/tzilic.rdf');

    foreach ($foaf->resources() as $resource) {

     

     // if($glumac != ''){

        $i = 0;
       // $types[] = [];
       // $annotations = "";

      $film = ''.$foaf->get($resource, '<http://oziz.ffos.hr/tzilic/marvel-glumci#Film>');


        // foreach ($resource->types() as $key) { 
        //   $types[$i] = $key;
        //   $i++;
        // }

        // if(count($types)>1){ 
        //   $myType = $types[1];
        // }else{
        //   $myType = $types[0];
        // }

        
        $glumac = ' ' .$foaf->get($resource, 'http://oziz.ffos.hr/tzilic/marvel-glumci#ime-prezime');
        $drzava = ' ' .$foaf->get($resource, 'http://oziz.ffos.hr/tzilic/marvel-glumci#roden');
        $godina = ' ' .$foaf->get($resource, 'http://oziz.ffos.hr/tzilic/marvel-glumci#godinaRodenja');
        $nagrada = ' ' .$foaf->get($resource, 'http://oziz.ffos.hr/tzilic/marvel-glumci#nagrada');
        $heroj = ' ' .$foaf->get($resource, 'http://oziz.ffos.hr/tzilic/marvel-glumci#heroj');
      



        
        
        // foreach ($resource->properties() as $key) {
        //   echo $i++ . ' ' . $key . ' <br/>';
      

      $ontologija = new Ontologija();
      $ontologija->setPodaci(Flight::request()->data);

      $ontologija->setGlumac($glumac);
      $ontologija->setDrzava($drzava);
      $ontologija->setGodina($godina);
      $ontologija->setNagrada($nagrada);
      $ontologija->setHeroj($heroj);

    
      $doctrineBootstrap = Flight::entityManager();
      $em = $doctrineBootstrap->getEntityManager();

      $em->persist($ontologija);
      $em->flush();
    //}
  }

  echo "Ontologija je uspješno unesena u bazu podataka.";

});

Flight::route('GET /search/@glumac', function($glumac){

  $doctrineBootstrap = Flight::entityManager();
  $em = $doctrineBootstrap->getEntityManager();
  $repozitorij=$em->getRepository('Zilic\Ontologija');
  $zapisi = $repozitorij->createQueryBuilder('p')
                        ->where('p.glumac LIKE :glumac')
                        ->setParameter('glumac', '%'.$glumac.'%')
                        ->getQuery()
                        ->getResult();
  echo $doctrineBootstrap->getJson($zapisi);

});

$cl = new ClassLoader('Zilic', __DIR__, '/src');
$cl->register();
require_once 'bootstrap.php';
Flight::register('entityManager', 'DoctrineBootstrap');

Flight::start();

