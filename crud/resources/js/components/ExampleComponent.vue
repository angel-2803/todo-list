<template>
<div class="card panel-default">
    <div class="card-header">Publicado en {{pensamiento.created_at}}</div>

    <div class="card-body">
        <input v-if="modoEdicion" type="text" class="form-control" v-model="pensamiento.descripcion">
        <p v-else>{{pensamiento.descripcion}}</p>
        
    </div>
    <div class="card-footer">
        <button v-if="modoEdicion" class="btn btn-success" v-on:click="onClickUpdate">
        Guardar Cambios</button>
        <button v-else class="btn btn-default" v-on:click="onClickEdit()">Editar</button>
        <button class="btn btn-danger" v-on:click="onClickDelete()">Eliminar</button>
    </div>  
</div>
</template>

<script>
    export default {
        props: ['pensamiento'], //se enlaza con el componente PrincipalComponenet.vue
        data(){
            return{
                modoEdicion: false
            };
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
            onClickDelete(){
                axios.delete(`/pensamientos/${this.pensamiento.id}`).then(() => {
                    this.$emit('delete');
                });
               
            },
            onClickEdit(){
                this.modoEdicion = true;
            },
            onClickUpdate(){
                const params = {
                    descripcion: this.pensamiento.descripcion
                };
                axios.put(`/pensamientos/${this.pensamiento.id}`, params).then((response) => {
                    this.modoEdicion = false;
                    const pensamiento = response.data;
                    this.$emit('update', pensamiento);
                });
            }
        }
    }
</script>
