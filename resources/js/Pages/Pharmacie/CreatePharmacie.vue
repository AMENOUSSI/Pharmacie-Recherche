<!-- resources/js/Pages/Pharmacies/Create.vue -->

<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ajout d'une Pharmacie</h3>
                        </div>
                        <div class="card-body" >
                            <form @submit.prevent="soumettre" id="formulaire">
                            <div class="form-group">
                                <label for="nom" >Nom:</label>
                                <input type="text"  class="form-control" id="nom" v-model="form.nom" />
                                
                            </div>
                            <div class="form-group">
                                <label for="region">Région:</label>
                               
                                <input type="text"  class="form-control" id="adresse" v-model="form.region" />
                                
                            </div>
                            <div class="form-group">
                                <label for="prefecture">Préfecture:</label>
                                
                                <input type="text" class="form-control" id="telephone" v-model="form.prefecture" />
                                
                            </div>
                            <div class="form-group">
                                <label for="telephone">Téléphone</label>
                               
                                <input type="number" class="form-control" id="email" v-model="form.telephone" />
                            </div>
                            
                            <div class="">
                                <button type="submit" for="formulaire" class="btn btn-success">Soumettre</button>
                            </div>
                            
                        </form>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>

</template>

<script >
import MainLayout from '@/Layouts/MainLayout.vue';
import { useForm } from '@inertiajs/vue3';
import { reactive } from 'vue';
import { router } from '@inertiajs/vue3';

 export default{
   
    layout: MainLayout,

           

    data() {
    return {
      form: {
        nom: '',
        region: '',
        prefecture: '',
        telephone: '',
       
      },
      errors: {},
    };
  },
  methods: {
    soumettre(){
        this.errors = {};
        this.$inertia.post(route('pharmacie.store'),this.form)
    
        .then(() => {
          this.$router.push({ name: 'pharmacie.index' });
        })
        .catch((error) => {
          if (error.response.data.errors) {
            this.errors = error.response.data.errors;
          }
        });
    },
  },
 
}

</script>

     