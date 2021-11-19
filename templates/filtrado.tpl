<table  class="list">
<tbody>

<tr>
        <th >Modelo</th>
        <th >Marca</th>
        <th >Descripción</th>
        <th >Método</th>
    </tr>

{foreach from=$impresora item=$info}               
    {if $filtro == $info->metodo}
        <tr>
            <td>{$info->marca}</td>
            <td>{$info->modelo}</td>
            <td>{$info->descripcion}</td>
            <td>{$info->metodo}</td>
        </tr>
    {/if}
 {/foreach}
</tbody>   
 </table>
