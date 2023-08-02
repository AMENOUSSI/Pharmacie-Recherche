<!-- resources/js/Pages/Pharmacies/Create.vue -->

<template>
    <div>
      <h1>Ajouter une nouvelle pharmacie</h1>
      <form @submit.prevent="submitForm">
        <div class="form-group">
          <label for="nom">Nom</label>
          <input type="text" class="form-control" id="nom" v-model="form.nom" />
        </div>
        <div class="form-group">
          <label for="adresse">Adresse</label>
          <input type="text" class="form-control" id="adresse" v-model="form.adresse" />
        </div>
        <div class="form-group">
          <label for="telephone">Téléphone</label>
          <input type="text" class="form-control" id="telephone" v-model="form.telephone" />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" id="email" v-model="form.email" />
        </div>
        <div class="form-group">
          <label for="ville">Ville</label>
          <input type="text" class="form-control" id="ville" v-model="form.ville" />
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        form: {
          nom: "",
          adresse: "",
          telephone: "",
          email: "",
          ville: ""
        }
      };
    },
    methods: {
      submitForm() {
        this.$inertia.post("/pharmacies", this.form)
          .then(() => {
            this.$router.push({ name: "pharmacies.create" });
          })
          .catch((error) => {
            console.error(error);
          });
      }
    }
  };
  </script>
  