<template>

  <div class="content-header">
    <div class="container-fluid">
      <div class="row ">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              <div class="card-title" style="text-align: center;">
                <h2 >Ajout d'un produit</h2>
              </div>


            </div>
            <div class="card-body d-flex justify-content-center align-items-center">
              <form @submit.prevent="submit">
                <div class="form-group">
                  <label for="nom">Nom:</label>
                  <input type="text" name="nom" class="form-control" id="nom" v-model="form.nom" />
                  <div v-if="errors.nom" class="invalid-feedback">{{ errors.nom[0] }}</div>
                </div>

                <div class="form-group">
                  <label for="prix">Prix:</label>
                  <input type="number" name="prix" class="form-control" id="prix" v-model="form.prix" />
                  <div v-if="errors.prix" class="invalid-feedback">{{ errors.prix[0] }}</div>
                </div>

                <div class="form-group">
                  <label for="categoriePathologie">CategoriePathologie:</label>
                  <select class="form-control" id="categoriePathologie" v-model="form.categorie_pathologie_id">
                    <option value="">Choisir une catégorie</option>
                    <option v-for="categorie in categories" :key="categorie.id" :value="categorie.id">{{ categorie.nom }}
                    </option>
                  </select>
                  <div v-if="errors.categorie_pathologie_id" class="invalid-feedback">{{ errors.categorie_pathologie_id[0]
                  }}</div>
                </div>

                <div class="form-group">
                  <label for="pharmacie">Pharmacie:</label>
                  <select v-model="form.pharmacie_id" class="form-control" id="pharmacie">
                    <option value="">Choisir une pharmacie</option>
                    <option v-for="pharmacie in pharmacies" :key="pharmacie.id" :value="pharmacie.id">{{ pharmacie.nom }}
                    </option>
                  </select>
                  <div v-if="errors.pharmacie_id" class="invalid-feedback">{{ errors.pharmacie_id[0] }}</div>
                </div>


                <div class="card-footer">
                  <button type="submit" class="btn btn-success">Soumettre</button>
                </div>

              </form>
            </div>
          </div>


        </div>
      </div>

    </div><!-- /.row -->
  </div>
</template>

  
  
  
<script>
import MainLayout from '../../Layouts/MainLayout.vue';
import Create from './Create.vue';
export default {
  layout: MainLayout,


  props: ['categories', 'pharmacies'],

  data() {
    return {
      form: {
        nom: '',
        prix: '',
        categorie_pathologie_id: '',
        pharmacie_id: '',
      },
      errors: {},
    };
  },
  methods: {
    submit() {

      this.errors = {};

      this.$inertia.post(route('produit.store', this.form))
        .then(() => {
          this.router.push({ name: 'produit.index' });

        })
        .catch((error) => {
          if (error.response.data.errors) {
            this.errors = error.response.data.errors;
          }
        });



    }


  },


  
};
</script>
  
 
 
 