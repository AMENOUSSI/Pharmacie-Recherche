<!-- resources/js/Pages/Pharmacies/Create.vue -->

<template>
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Ajout d'une nouvelle Categorie de Pathologie</h3>
            </div>
            <div class="card-body">
              <div>
                <!-- Afficher le message de succès -->
                <div v-if="successMessage" class="alert alert-success" role="alert">
                  {{ successMessage }}
                </div>
                <!-- Afficher le message d'erreur -->
                <div v-if="errors.nom" class="alert alert-danger" role="alert">
                  {{ errors.nom[0] }}
                </div>

                <form @submit.prevent="submitForm(categorie.id)">
                  <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" v-model="form.nom" />
                  </div>
                  
                  <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
  
<script>
import MainLayout from '@/Layouts/MainLayout.vue';
import {ref, onMounted} from "vue";

export default{ 
  data() {
    return {
      form: {
        nom: "",

      },
      errors: {},
      successMessage: "",
    };
  },
  
  methods: {
    submitForm()
    {
      this.errors = {};
      this.successMessage = "";
      this.$inertia.post(route("categorie.store"), this.form)
        .then(() => {

          this.successMessage = "La catégorie a été ajoutée avec succès.";

          this.form.nom = "";
          
        })
        .catch((error) => {
          if (error.response.data.errors) {
            this.errors = error.response.data.errors;
          }
        });
        
    }
  }

};

  
  
</script>
  