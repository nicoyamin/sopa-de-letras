Para verificar el proceso de resolucion del problema, resultan de interes tres archivos:

1-welcome.blade.php ubicado en resources\views\welcome.blade.php - Este archivo es basicamente la pagina home de Laravel,
rapídamente modificada para reflejar las necesidades del problema. Aqui se muestran las sopas de letras para resolver, y se expone
la solucion una vez seleccionada la sopa.Ademas, hay un input donde se observa la palabra a buscar por defecto (OIE), que ofrece la
oportunidad de modificar el string a buscar, incluyendo la busqueda de un solo caracter.

2-selectSopa.js ubicado en public\js\selectSopa.js - En este archivo estan los hardcode de las sopas de letras. Ademas, el manejo
de ciertos componentes y efectos graficos y, por supuesto, la peticion AJAX, que envia la sopa seleccionada y el string a buscar
al controlador correspondiente para su procesamiento. Al retornar la respuesta, la muestra en la vista.

3-AjaxController.php ubicado en Http\Controllers\AjaxController.php - El archivo mas importante, y donde se realiza la resolucion
del problema. Luego de considerar varias opciones para afrontar la situacion planteada, se opto por la elaboracion de un unico
metodo para procesar la respuesta.

Acerca de la solucion:

*La resolucion se ha desarrollado de tal manera que puede extenderse de manera general a cualquier caso planteado. Por ejemplo,
pueden modificarse las sopas de letras en el archivo selectSopa.js, o ingresar una palabra distinta a buscar y el procedimiento se mantiene igual, devolviendo una respuesta correcta.

*Basicamente, la estrategia consiste en tomar la palabra a buscar (a partir de ahora, keyword) y usar una "ventana movil", con una
longitud igual a la de la keyword. Se empieza a recorrer la sopa de letras por fila, y se compara cada elemento con la primera letra
de la keyword. Al encontrar una coincidencia, se empieza  a verificar cada una de las direcciones necesarias. Para ello, se recurre 
a dos arrays auxiliares, correspondientes a la posicion en X, y a la posicion en Y. Estas direcciones son (siempre a partir de la
posicion donde se encontro una coincidencia):
    -Esquina superior izquierda (-1,-1)
    -Arriba (-1,0)
    -Esquina superior derecha (-1,1)
    -Izquierda (0,-1)
    -Derecha (0,1)
    -Esquina inferior izquierda (1,-1)
    -Abajo (1,0)
    -Esquina inferior derecha (1,1)
 Por cada direccion, se toman tantos caracteres como sean necesarios para llenar la ventana, es decir, para igualar la longitud de 
 la keyword. Una vez armada esta palabra, se la compara con la keyword. Si son iguales, se suma 1 a la variable que cuenta las 
 coincidencias. Este proceso se repite hasta que se recorre toda la matriz, y al final se devuelve el total de coincidencias.
 
 *El principal inconveniente de este metodo es que se formará una palabra completa y recien se comparará, cuando a veces la segunda 
 letra ya es distinta a la keyword. La ventaja es que se ahorra espacio en arrays auxiliares que serian usados para almacenar
 cada uno de los caracteres de la keyword de manera individual (los cuales se utilizan a efectos de comparacion), y se minimiza el uso
 de operaciones poco optimas, como substr().

*Otro metodo considerado (luego descartado), consiste en usar dos array como pilas o stacks, uno conteniendo los caracteres que 
conforman la keyword, y otro inicialmente vacio. Al recorrer la matriz, si se encuentra la primera letra, se quita de un stack y se 
agrega al otro, y se sigue explorando en misma direcciones. Al continuar las coincidencias, se quitan mas caracteres del stack keyword
hasta que queda vacia, momento en que se tiene una coincidencia. Si una letra no coincide, se reinician ambos stack y se prosigue por
la siguiente direccion. El problema de este metodo es que las operaciones de remover/añadir el primer elemento a los stack (shift y
unshift), son caras en cuanto a rendimiento.

*Un tercer metodo involucraba el uso de una funcion recursiva, que seria invocada luego de encontrar coincidencia con la primera letra
de la keyword. Se pasan como parametros la matriz, la posicion de la coincidencia y coordenadas de los arrays X e Y para seguir
una direccion. Esta funcion se llamaba a si misma, variando el caracter de la keyword a comparar para alcanzar el caso base (es decir, 
no hay mas caracteres a comparar en la keyword, momento en el cual se tiene una coincidencia), y en caso de que una comparacion fallase,
se escapa de las llamadas y se continuaba con la siguiente direccion. Las desventajas de esta opcion son la gran cantidad de parametros
a enviar a la funcion recursiva, ademas de un potencial alto numero de llamadas si la keyword era muy larga.

Este fue el proceso de resolucion. 
Por cualquier duda o consulta, no duden en contactarme.

