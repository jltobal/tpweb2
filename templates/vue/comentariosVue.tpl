{literal}
    <div id="app">
        <h1>{{ titulo }} </h1>
        <p>{{ subtitulo }}</p>

        <ul class="list-group">
            <li v-for="dato in comentarios" class="list-group-item d-flex">
                {{dato.detalle}}
                <div class="acciones ms-auto">
                    <button class="btn btn-sm btn-danger" v-bind:data-id="dato.id_comentario"
                        v-on:click="remove(dato.id_comentario)">Borrar</button>
                </div>
            </li>


        </ul>
    </div>
{/literal}