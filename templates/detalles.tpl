{include file = 'header.tpl'}

<table class="list">

    <tbody>


    </tbody>
</table>

<table class="list">
    <tbody>
        <form id="form" class="form-coment" method="POST">
            <tr>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Descripción</th>
            </tr>
            {foreach from=$impresora item=$info}
                <tr>
                    <td>{$info->modelo}</td>
                    <td>{$info->marca}</td>
                    <td>{$info->descripcion}</td>
                </tr>
            {/foreach}

            <tr>
                <td><input type="hidden" id="id-coment" name="id_impresora" value={$info->id_impresora}></td>
                <td><textarea name="coment" placeholder="Comentar"></textarea> </td>
                <td><button id="btn-coment" class="btn_comentar" type="submit">Comentar</button></td>
                <td><select name="puntaje" id="id_puntaje">
                        <option disable>Calificar...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select></td>
            </tr>

        </form>
    </tbody>
</table>




{include file='vue/comentariosVue.tpl'}

<script src="js/jscomentarios.js"></script>


{include file = 'footer.tpl'}