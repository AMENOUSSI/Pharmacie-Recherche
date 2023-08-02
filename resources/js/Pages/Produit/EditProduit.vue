<template>
    <!-- Your template code here -->

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
              <form @submit.prevent="submit(produit.id)">
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
                  
                  <div v-if="errors.categorie_pathologie_id" class="invalid-feedback">{{ errors.categorie_pathologie_id[0]
                  }}</div>
                </div>

                <div class="form-group">
                  <label for="pharmacie">Pharmacie:</label>
                 
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
  
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { router, useForm } from '@inertiajs/vue3';
import { reactive } from 'vue';


const props = defineProps({
    produit: Object,
    errors: Object,
})

const form = useForm({
    nom: props.produit.nom,
    prix: props.produit.prix
    ,
    
});


function submit(id){
    /* form.put('produit.update', { produit: id })
        .then(() => {
            // Handle the success response if needed
            router.push({ name: 'produit.affiche' });
        })
        .catch((error) => {
            // Handle the error response if needed
            console.error(error);
        });         */
        


      

}







</script>
  