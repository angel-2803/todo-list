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
		<br>
	<table class="table" id="example">
		<thead>
	      <tr>
			<th>#</th>
			<th>Nombre</th>
			<th>Descripción</th>
			<th>Fecha</th>
			<th>Acción</th>
			<th></th>
		  </tr>
		</thead>
		<tbody v-for="(item, index) in notas" :key="index">
			<tr>
				<td>{{item.id}}</td>
				<td>{{item.nombre}}</td>
				<td>{{item.descripcion}}</td>
				<td>{{item.updated_at}}</td>
				<td>
					<button class="btn btn-danger btn-sm" 
					@click="EliminarNota(item, index)">Eliminar</button>
			    </td>
				<td>
						<button class=" btn btn-warning btn-sm" 
					@click="EditarFormulario(item)">Editar</button>
				</td>
			</tr>
		</tbody>
	</table>

	</div>
</template>
<script>

	export default{
		data(){
			return{
				notas: [],
				nota: {nombre: '', descripcion: ''},
				editarActivo: false
			}
		},
		created(){
			axios.get('notas')
			.then(res =>{
				this.notas = res.data;
			})
		},
		methods:{
			agregar(){
				if (this.nota.nombre.trim() === '' || this.nota.descripcion.trim() === '') {
					alert('Completa todos los campos');
					return;
				}
				//console.log(this.nota.nombre , this.nota.descripcion);
				const parametros = {
					nombre: this.nota.nombre,
					descripcion: this.nota.descripcion
				}
				this.nota.nombre='';
				this.nota.descripcion='';

				axios.post('/notas',parametros)
				.then(res => {
					this.notas.push(res.data)
				})
			},
			EliminarNota(nota, index){
				  const confirmacion = confirm(`Eliminar nota ${nota.nombre}`);
			      if(confirmacion){
			        axios.delete(`/notas/${nota.id}`)
			          .then(()=>{
			            this.notas.splice(index, 1);
			          })
			      }
		    },
		    EditarFormulario(item){
		    	this.editarActivo= true;

		    	this.nota.nombre = item.nombre;
		    	this.nota.descripcion = item.descripcion;
		    	this.nota.id = item.id;
		    },
		    editarNota(nota){
		      const params = {nombre: nota.nombre, descripcion: nota.descripcion};
		      axios.put(`/notas/${nota.id}`, params)
		        .then(res=>{
		          this.editarActivo = false;
		          const index = this.notas.findIndex(item => item.id === nota.id);
		          this.notas[index] = res.data;

		          this.nota = {nombre: '', descripcion:''}

		          axios.get('/notas').then(res=>{
		          	this.notas = res.data;
		          })

		        })
		    }

		}
	}
</script>

