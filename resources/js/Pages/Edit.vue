<!-- resources/js/Pages/Pharmacies/Edit.vue
<template>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m" style="text-align: center;">Edit Pharmacy</h1>
          </div>
        </div>
      </div>
  
       Main content 
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <form @submit.prevent="updatePharmacy">
                    <div class="form-group">
                      <label for="nom">Nom:</label>
                      <input type="text" class="form-control" id="nom" v-model="form.nom" />
                    </div>
                    <div class="form-group">
                      <label for="region">Région:</label>
                      <input type="text" class="form-control" id="region" v-model="form.region" />
                    </div>
                    <div class="form-group">
                      <label for="prefecture">Préfecture:</label>
                      <input type="text" class="form-control" id="prefecture" v-model="form.prefecture" />
                    </div>
                    <div class="form-group">
                      <label for="telephone">Téléphone:</label>
                      <input type="number" class="form-control" id="telephone" v-model="form.telephone" />
                    </div>
                    <div class="card-footer clearfix">
                      <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </template>
  
  <script>
  import MainLayout from '@/Layouts/MainLayout.vue';
  import { reactive, ref, onMounted } from 'vue';
  import { useRoute, useForm } from '@inertiajs/vue3';
  
  
    export default {
    layout: MainLayout,
    props: {
      pharmacie: {
        type: Object,
        required: true,
      },
    },
    setup(props) {
      const route = useRoute();
      const { data, setData, put } = useForm({
        nom: props.pharmacie.nom,
        region: props.pharmacie.region,
        prefecture: props.pharmacie.prefecture,
        telephone: props.pharmacie.telephone,
      });
  
      const updatePharmacy = () => {
        put(route('pharmacie.update', { pharmacie: this.pharmacie.id }), data);
      };
  
      return {
        form: data,
        updatePharmacy,
      };
    },
  };
  </script>   -->



  
  