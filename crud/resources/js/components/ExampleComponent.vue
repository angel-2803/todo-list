<template>
<div class="card">
    <div class="card-header">Publicado en {{pensamiento.fecha}}</div>

    <div class="card-body">
        <p>{{pensamiento.descripcion}}</p>
    </div>
    <div class="card-footer">
        <button class="btn btn-success">Enviar</button>
        <button class="btn btn-danger">Eliminar</button>
    </div>  
</div>
</template>

<script>
    export default {
        props: ['pensamiento'], //se enlaza con el componente PrincipalComponenet.vue
        data(){
            return{
                
            };
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
