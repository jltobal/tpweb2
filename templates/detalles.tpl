{include file = 'header.tpl'}

<table  class="list">

<tbody>
{foreach from=$impresora item=$info}     
<tr>
    <td>{$info->id_impresora}</td>    
    <td>{$info->modelo}</td>
    <td>{$info->marca}</td>
    <td>{$info->descripcion}</td>
</tr>
{/foreach}

 </tbody>   
 </table>

 <table  class="list">
 <tbody>
 <form class="form-coment" method="POST" action='agregar_comentario'>
 <tr>
 <td><textarea name="comment" placeholder="Comentar"></textarea> </td>
 <td><button class="btn_comentar" type="submit">Comentar</button></td>
 </tr>

 </form>
 </tbody>   
 </table>



{include file = 'footer.tpl'}
