<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <form-component></form-component>
            <br>
            <example-component 
                v-for="pensamiento in pensamientos"
                :key="pensamiento.id"
                :pensamiento="pensamiento"> <!-- se enlasa con el componente espesifico en ExampleComponent.vue -->

                
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
                    'descripcion': 'abc',
                    'fecha': '19-03-2010'
                }]
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>