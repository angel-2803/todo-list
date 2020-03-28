<template>
	<div>
		<h3>Agregar tareas</h3>
		<form @submit.prevent="agregar">
			<input type="text" placeholder="Nombre" class="form-control mb-2" v-model="tarea.nombre">
			<input type="text" placeholder="Descripción" class="form-control mb-2" v-model="tarea.descripcion">
			<button type="submit" class="btn btn-primary">Agregar</button>
		</form>
		<ul class="list-group">
			<hr class="mt-3">    
			<h3>Listado de Notas</h3>
			<li class="list-group-item my-2" 
			  v-for="(item, index) in tareas" :key="index" >
			  <span class="badge badge-primary float-right">
			  	{{item.updated_at}}
			  </span>
					<p>{{item.nombre}}</p>
					<p>{{item.descripcion}}</p>

					<button class="btn btn-danger btn-sm" 
					@click="EliminarNota(item, index)">Eliminar</button>
		    </li>  

		</ul>

	</div>
</template>

<script>
	export default{
		data(){
			return{
				tareas: [],
				tarea: {nombre: '', descripcion: ''}
			}
		},
		created(){
			axios.get('notas')
			.then(res =>{
				this.tareas = res.data;
			})
		},
		methods:{
			agregar(){
				if (this.tarea.nombre.trim() === '' || this.tarea.descripcion.trim() === '') {
					alert('Completa todos los campos');
					return;
				}
				//console.log(this.tarea.nombre , this.tarea.descripcion);
				const parametros = {
					nombre: this.tarea.nombre,
					descripcion: this.tarea.descripcion
				}
				this.tarea.nombre='';
				this.tarea.descripcion='';

				axios.post('/notas',parametros)
				.then(res => {
					this.tareas.push(res.data)
				})
			},
			EliminarNota(nota, index){
				axios.delete(`/notas/${nota.id}`)
				
				.then(()=>{
					this.tareas.splice(index, 1);
				})
			}

		}
	}
</script>