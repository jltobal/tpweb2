 Para ingresar puede utilizar los siguientes usuarios:

usuario: admin@tudai
password: 123456

Es necesario modificar la linea  del archivo 'js/javascript.js' para corregir la ruta del llamado fetch
para que corresponda a su ruta local donde se encuentre el template.

let respuesta = await fetch(`http://localhost/proyectos/WEB-2/PHP/TP_Especial_1/TPE_Web2_1/filtrado/${metodo}`);