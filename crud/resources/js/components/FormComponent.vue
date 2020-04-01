<template>
 <div class="card">
    <div class="card-header">¿Que estas pensando ahora?</div>

    <div class="card-body">

        <form action="" v-on:submit.prevent="nuevoPensamiento()">
            <div class="form-group">
                <label for="">Ahora estoy pensando en</label>
                <input type="text" class="form-control" name="pensamiento" v-model="descripcion">
            </div>
            <button type="submit" class="btn btn-primary">Enviar pensamiento</button>
        </form>
    </div>
</div>
</template>

<script>
    export default {
        data() {
            return {
                descripcion: ''
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            nuevoPensamiento(){
                let pensamiento = {
                    id: 2,
                    descripcion: this.descripcion,
                    fecha: '11/02/2019'
                };
                this.$emit('new', pensamiento);
                this.descripcion = '';
            }
        }
    }
</script>