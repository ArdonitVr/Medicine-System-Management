<template>

<div class="Barnat container">
    <Njofto v-if="alert" v-bind:mesazhi='alert' />
<h1 class="page-header">Menaxho Barnat</h1>
 <input class="form-control" placeholder="Ju lutem jepni Emrin e Barnes" v-model="filterHyrja">
	 <br>
<table class="table table-striped">
<thead>
<tr>
<th>Emri i Barnes</th>
<th>Prodhuesi i Barnes</th>
<th>Data e Prodhmit te Barnes</th>
<th>Data e Skadimit te Barnes</th>
<th>Cmimi i Barnes</th>
<th>Pershkrimi i Barnes</th>
<th>Ljoji i Barnes</th>
<th>Modifiko</th>
<th>Fshiej</th>

</tr>
</thead>
<tbody>
	   <tr v-for="barna in FilterPrej(barnat, filterHyrja)">
<td>{{barna.Emri_Barnes_SMBR}}</td>
<td>{{barna.ProdhuesiBarnes_SMBR}}</td>
<td>{{barna.DataProdhimitBarnes_SMBR}}</td>
<td>{{barna.DataSkadimitBarnes_SMBR}}</td>
<td>{{barna.CmimiBarnes_SMBR	}}</td>
<td>{{barna.PershkrimiBarnes_SMBR}}</td>
<td>{{barna.LlojiBarnes_SMBR}}</td>
<td>
    <router-link class="btn btn-primary" v-bind:to="'/Modifiko/'+barna.ID_SMBR">Modifiko</router-link> 
</td>
<td>
    <button class="btn btn-danger " v-on:click="Fshiej(barna.ID_SMBR)">Fshiej</button> <br>
</td>
</tr>
</tbody>
</table>
</div>
</template>

<script>
import Njofto from './Njofto';

export default {
name: 'barnat',
data () {
return {
barnat: [],
	alert:'',
	filterHyrja:''
}
},
methods: {
fetchbarna(){
this.$http.get('http://slimapp/api/barnat')
.then(function(response){
this.barnat = response.body;
});
},
FilterPrej(list, value){
				value=value.charAt(0).toUpperCase()+value.slice(1);		
				return list.filter(function(barna){				
					return barna.Emri_Barnes_SMBR.indexOf(value) > -1;
				});
			},
Fshiej(ID_SMBR){
				this.$http.delete('http://slimapp/api/barna/fshiej/'+ID_SMBR)
				.then(function(response){
					this.$router.push({path: '/', query: {alert: 'barna u Fshiej!'}});
					window.location.reload();
				});
			}
},
created: function(){
	 if(this.$route.query.alert){
				this.alert = this.$route.query.alert;
	  		}
this.fetchbarna();
},
updated: function() {
    this.fetchbarna();
   
},
components: {
			Njofto
		}
}
</script>