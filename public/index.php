<?php

use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {
    $em = $this->getDoctrine()->getManager();

        $query = $em->createQuery('SELECT p.idproduct, p.name, p.price, p.status FROM App:Products p');
        $listProducts = $query->getResult();
        $data = [
            'status'=> 200,
            'message'=> 'Hola! No se han encontrado resultados'
        ];
        if (count($listProducts)>0){
            $data =[
                'status'=> 200,
                'message'=> 'Hola! Se encontraron '.count($listProducts) .'Resultados',
                'listProducts' => $listProducts   
            ];
        }
        return new JsonResponse($data);
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
