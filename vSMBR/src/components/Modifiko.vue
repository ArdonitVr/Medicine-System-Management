<template>
  <div class="ModifikoBarnen container">
    <h2 class="page-header"><b>Modifiko Barnen</b></h2>
	<Njofto v-if="alert" v-bind:mesazhi="alert" />
    <form  v-on:submit="ModifikoBarnen">
        <div class="well">
            <h4 style="color:DarkGreen">Te Dhenat e Barnes</h4><br>
            <div class="form-group">
                <label>Emri i Barnes</label>
			    <input type="text" class="form-control" v-model="barna.Emri_Barnes_SMBR"/>
            </div>
            <div class="form-group">
                <label>Prodhuesi i Barnes</label>
			    <input type="text"  class="form-control" v-model="barna.ProdhuesiBarnes_SMBR"/>
            </div>
            </div>
            <div class="well">
            <h4 style="color:DarkGreen">Prodhimi dhe Skadimi i Barnes</h4><br>
            <div class="form-group">
                <label>Data e Prodhimit te Barnes</label>
				<input type="date" class="form-control" v-model="barna.DataProdhimitBarnes_SMBR"/>
            </div>
			<div class="form-group">
                <label>Data e Skadimit Barnes</label>
                <input type="date"  class="form-control" v-model="barna.DataSkadimitBarnes_SMBR"></input>
            </div>
            </div>
            <div class="well">
            <h4 style="color:DarkGreen">Informacione Tjera</h4><br>
            <div class="form-group">
                <label>Cmimi i Barnes</label>
			    <input type="text" class="form-control" v-model="barna.CmimiBarnes_SMBR"/>
            </div>
			<div class="form-group">
                <label>Pershkrimi i Barnes</label>
			    <textarea type="text" class="form-control" v-model="barna.PershkrimiBarnes_SMBR"></textarea>
            </div>
            <div class="form-group">
                <label>Lloji i Barnes</label>
			    <input type="text" class="form-control" v-model="barna.LlojiBarnes_SMBR"/>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Modifiko</button>
    </form><br><br><br>
  </div>
</template>

<script>
	import Njofto from './Njofto'
    export default {
    name: 'ModifikoBarnen',
    data () {
        return {
        barna: {},
        alert:''
        }
    },
    methods: {
        fetchbarna(ID_SMBR){
            this.$http.get('http://slimapp/api/barna/'+ID_SMBR)
            .then(function(response){
                this.barna = response.body;
            });
        },
        ModifikoBarnen(e){
            if(!this.barna.Emri_Barnes_SMBR || !this.barna.ProdhuesiBarnes_SMBR || !this.barna.DataProdhimitBarnes_SMBR){
                this.alert = 'Ju lutemi plotësoni të gjitha fushat';
            } else {
                let ModifikoBarnen = {
                    Emri_Barnes_SMBR: this.barna.Emri_Barnes_SMBR,
					ProdhuesiBarnes_SMBR: this.barna.ProdhuesiBarnes_SMBR,
					DataProdhimitBarnes_SMBR: this.barna.DataProdhimitBarnes_SMBR,
					DataSkadimitBarnes_SMBR: this.barna.DataSkadimitBarnes_SMBR,
					CmimiBarnes_SMBR: this.barna.CmimiBarnes_SMBR,
					PershkrimiBarnes_SMBR: this.barna.PershkrimiBarnes_SMBR,
					LlojiBarnes_SMBR: this.barna.LlojiBarnes_SMBR
                }
                this.$http.put('http://slimapp/api/barna/modifiko/'+this.$route.params.ID_SMBR, ModifikoBarnen)
                    .then(function(response){
                        this.$router.push({path: '/', query: {alert: 'barna u modifikua'}});
                    });
                e.preventDefault();
            }
            e.preventDefault();
        }
    },
    created: function(){
        this.fetchbarna(this.$route.params.ID_SMBR);
    },
	components: {
		Njofto
	}
}
</script>