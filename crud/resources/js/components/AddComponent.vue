<template>
	<div>
		<form @submit.prevent="editarNota(nota)" v-if="editarActivo">
			<h3>Editar nota</h3>
			<input type="text" placeholder="Nombre" class="form-control mb-2" v-model="nota.nombre">
			<input type="text" placeholder="Descripción" class="form-control mb-2" v-model="nota.descripcion">
			<button type="submit" class="btn btn-success">Guardar</button>
		</form>
	<form @submit.prevent="agregar" v-else>
			<h3>Agregar nota</h3>
			<input type="text" placeholder="Nombre" class="form-control mb-2" v-model="nota.nombre">
			<input type="text" placeholder="Descripción" class="form-control mb-2" v-model="nota.descripcion">
			<button type="submit" class="btn btn-primary">Agregar</button>
		</form>
		<ul class="list-group">
			<hr class="mt-3">    
			
			<li class="list-group-item my-2" 
			  v-for="(item, index) in notas" :key="index" >
			  <span class="badge badge-primary float-right">
			  	{{item.updated_at}}
			  </span>
					<p>{{item.nombre}}</p>
					<p>{{item.descripcion}}</p>

					<p><button class="btn btn-danger btn-sm" 
					@click="EliminarNota(item, index)">Eliminar</button>
						<button class=" btn btn-warning btn-sm" 
					@click="EditarFormulario(item)">Editar</button>
					</p>
		    </li>  

		</ul>
	</div>
</template>
<script>
    export default{
		
	}
	
</script>