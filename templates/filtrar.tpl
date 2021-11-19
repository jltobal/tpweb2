{include file = 'header.tpl'}

<br>
<h3>Seleccione el tipo de impresora</h3>
<br>

<form>
    <div class="form-group">
        <label>Sistema</label>
            <select name="select" id="selectMetodo">
              <option disable>Elegir un metodo...</option>
              {foreach from=$metodo item=$info}               
              <option name="{$info->metodo}">{$info->metodo}</option>
              {/foreach}


   </select>
    </form>


    </div>
    

    <div id="ajax-contenedor">
    
    </div>

{include file = 'footer.tpl'}
