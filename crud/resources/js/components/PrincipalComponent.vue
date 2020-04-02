<template>
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <form-component 
            @new="addPensamiento" 
            ><!-- esto es un evento para agregar un nuevo Pensamiento -->
                
            </form-component>
            <br>
            <example-component 
                v-for="(pensamiento , index) in pensamientos"
                :key="pensamiento.id"
                :pensamiento="pensamiento"
                @update="editarPensamiento(index, ...arguments)"
                @delete="deletePensamiento(index)"> <!-- se enlasa con el componente espesifico en ExampleComponent.vue -->

                
            </example-component>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return {
                pensamientos: [] //arreglo vacio
            }
        },
        mounted() {
            axios.get('/pensamientos').then((response)=>{
                    this.pensamientos = response.data; //manda objetos con los datos de la BD
                    console.log(response.data);
            });
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