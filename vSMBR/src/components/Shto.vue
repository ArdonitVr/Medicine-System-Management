<template>
  <div class="shto container">
    <h2 class="page-header"><b>Shto Barne</b></h2>
    <Njofto v-if="alert" v-bind:mesazhi="alert" />
    <form v-on:submit="shto">
        <div class="well">
            <h4 style="color:DarkGreen">Te Dhenat e Barnes</h4><br>
            <div class="form-group">
                <label>Emri i Barnes</label>
			    <input type="text" class="form-control" placeholder="" v-model="barna.Emri_Barnes_SMBR" />
            </div>
            <div class="form-group">
                <label>Prodhuesi</label>
			    <input type="text" class="form-control"  v-model="barna.ProdhuesiBarnes_SMBR"/>
            </div>
            </div>
            <div class="well">
            <h4 style="color:DarkGreen">Prodhimi dhe Skadimi i Barnes</h4><br>
            <div class="form-group">
                <label>Data e Prodhimit</label>
				<input type="date" class="form-control" placeholder="" v-model="barna.DataProdhimitBarnes_SMBR"/>
            </div>
			<div class="form-group">
                <label>Data e Skadimit</label>
                <input type="date" class="form-control" placeholder="" v-model="barna.DataSkadimitBarnes_SMBR"/>
            </div>
            </div>
            <div class="well">
            <h4 style="color:DarkGreen">Informacione Tjera</h4><br>
            <div class="form-group">
                <label>Cmimi i Barnes</label>
			    <input type="text" class="form-control" placeholder="" v-model="barna.CmimiBarnes_SMBR"/>
            </div>
			<div class="form-group">
                <label>Pershkrimi i Barnes</label>
			    <textarea type="text" class="form-control" placeholder="" v-model="barna.PershkrimiBarnes_SMBR"/></textarea>
            </div>
            <div class="form-group">
                <label>Lloji i Barnes</label>
			    <input type="text" class="form-control" placeholder="" v-model="barna.LlojiBarnes_SMBR"/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Shto</button>
    </form><br><br><br>
  </div>
</template>
<script>
import Njofto from './Njofto';
export default {
name: 'shto',
data () {
return {
    barna: {},
    alert:''
}
},
methods: {
shto(e){
if(!this.barna.Emri_Barnes_SMBR || !this.barna.ProdhuesiBarnes_SMBR || !this.barna.LlojiBarnes_SMBR){
this.alert = 'Ju lutem plotesoni te gjitha fushat!';
} else {
let barnaRe = {
Emri_Barnes_SMBR: this.barna.Emri_Barnes_SMBR,
ProdhuesiBarnes_SMBR: this.barna.ProdhuesiBarnes_SMBR,
LlojiBarnes_SMBR: this.barna.LlojiBarnes_SMBR,
DataProdhimitBarnes_SMBR: this.barna.DataProdhimitBarnes_SMBR,
CmimiBarnes_SMBR: this.barna.CmimiBarnes_SMBR,
PershkrimiBarnes_SMBR: this.barna.PershkrimiBarnes_SMBR,
DataSkadimitBarnes_SMBR: this.barna.DataSkadimitBarnes_SMBR
}
this.$http.post('http://slimapp/api/barna/shto', barnaRe)
.then(function(response){
this.$router.push({path: '/', query: {alert: 'barna u shtua'}});
	});
				e.preventDefault();
			}
		e.preventDefault();
		}
	},
	components: {
        Njofto
	}
}
</script>


