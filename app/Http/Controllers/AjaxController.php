<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function solveMatrix(Request $request)
    {
        if($request->ajax())
        {
            $solution=$this->traverseMatrix($_POST['matrix'], $_POST['keyword']);
            return response()->json($solution);
        }
    }

    public function traverseMatrix(array $matrix, string $keyword)
    {
        $keywordMatches=0;
        
        $arrX=[-1,-1,-1,0,0,1,1,1]; //Estos arrays sirven para verificar las 8 direcciones. Se usan de a pares con el mismo indice
        $arrY=[-1,0,1,-1,1,-1,0,1]; 

        $foundWord=substr($keyword,0,1);    //Se extrae la primera letra del string como referencia
        $windowSize=strlen($keyword);       //Nuestro tamaño de ventana será la longitud de la keyword

        foreach($matrix as $i=>$row)
        {
            foreach($row as $j=>$value)
            {
                if($matrix[$i][$j]==$foundWord) //Verificamos coincidencia con la primera letra
                {
                    if($windowSize == 1) $keywordMatches++;

                    else
                    {
                        $direction=0;
                        while($direction<=7)
                        {
                            $posX=$i+$arrX[$direction];  //Se establece la direccion a verificar, comenzando por la esquina superior izquierda
                            $posY=$j+$arrY[$direction];  //Es decir, al indice donde se encontro la primer coincidencia, se le aplica (-1,-1)
                            while(strlen($foundWord)!=$windowSize)  //Se usa la ventana para tomar palabras de igual longitud a la keyword, en las ocho direcciones
                            {
                                if(isset($matrix[$posX][$posY]))    //Verifica que la posicion sea valida
                                {
                                    $foundWord=$foundWord.$matrix[$posX][$posY];    //Concatena un nuevo caracter a la palabra a comparar
                                    $posX+=$arrX[$direction];       //Se avanza a la proxima posicion, manteniendo la direccion
                                    $posY+=$arrY[$direction];
                                }
                                
                                else break;
                            }
                            if($foundWord==$keyword) $keywordMatches++; //Al llenar la ventana, si el string resultante coincide con la keyword, sumamos una coincidencia
                            $foundWord=substr($keyword,0,1);    //Se reinician los valores para la proxima iteracion
                            $direction++;
                        }
                    }
                    

                }
            }
        }
        return $keyword." aparece ".$keywordMatches." veces";
    }

}
