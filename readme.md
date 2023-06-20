Segunda parte del Trabajo practico especial para la materia de WEB 2 en la carrera de la Tecnicatura Universitaria en Desarollo de Aplicaciones Informaticas de la Facultad de Ciencias Exactas, sede Olavarría.

*Rol de usuario:
-Como usuario quiero poder loguearme.
-Al registrarse se loguea automaticamente.
*Rol Administrador:
-Como administrador quiero poder asignar o quitar permisos a los usuarios. Adicionalmente quiero poder eliminar usuarios.

*Con uso de API REST:
-Como Usuario registrado quiero poder postear comentarios y asignar puntaje a los items.
-Como Usuario quiero ordenar los comentarios por puntaje y filtrar por cantidad de puntos.
-Como Administrador quiero poder eliminar comentarios.
-Como Administrador quiero asociar una imagen a un item.

*Utilizacion de Clien Side Render.
*Los comentarios se pueden ver sin registro.
*Deben existir al menos dos roles, Administrador y no administrador.

-----------------------------------------------------------------------------------------------------------

Para ingresar puede utilizar los siguientes usuarios:

usuario: admin@tudai
password: 123456

Es necesario modificar la linea  del archivo 'js/javascript.js' para corregir la ruta del llamado fetch
para que corresponda a su ruta local donde se encuentre el template.

let respuesta = await fetch(`http://localhost/proyectos/WEB-2/PHP/TP_Especial_1/TPE_Web2_1/filtrado/${metodo}`);
