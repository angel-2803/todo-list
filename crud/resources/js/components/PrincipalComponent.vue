<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <form-component 
            @new="addPensamiento" 
            ><!-- esto es un evento para agregar un nuevo Pensamiento -->
                
            </form-component>
            <br>
            <example-component 
                v-for="(pensamiento , index) in pensamientos"
                :key="pensamiento.id"
                :pensamiento="pensamiento"
                @update="editarPensamiento(index)"
                @delete="deletePensamiento(index)"> <!-- se enlasa con el componente espesifico en ExampleComponent.vue -->

                
            </example-component>

        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                pensamientos: [{
                    'id': 1,
                    'descripcion': 'abcd',
                    'fecha': '19-03-2010'
                }]
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            addPensamiento(pensamiento){
                this.pensamientos.push(pensamiento);
            },
            deletePensamiento(index){
                this.pensamientos.splice(index, 1);
            },
            editarPensamiento(index, pensamiento){
                this.pensamientos[index]= pensamiento;
            }
        }
    }
</script>