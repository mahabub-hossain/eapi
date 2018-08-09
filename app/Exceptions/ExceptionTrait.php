<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNOTfoundException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HTTPKernel\Exception\NotFoundHttpException;

trait ExceptionTrait
{
	public function apiException($request, $e)
	{

      //for error message if the given product request is not present
        if ($e instanceof ModelNotFoundException) {

            return response()->json([
                'errors'=>'Product Model not found'
            ],Response::HTTP_NOT_FOUND);
        }
        //incorrect route exception

        if ($e instanceof NotFoundHttpException) {

            return response()->json([
                'errors'=>'Incorrect Route Exception'
            ],Response::HTTP_NOT_FOUND);
        }

        return parent::render($request, $exception);
        
	}
}



?>