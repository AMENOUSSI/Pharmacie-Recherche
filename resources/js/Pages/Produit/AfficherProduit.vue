<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m" style="text-align: center;">La liste des produits</h1>
        </div>
      </div>
    </div>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="card-title">

                  <button class="btn btn-primary">
                    <i class="fa fa-plus"></i>Nouveau

                  </button>
                  <select  v-model="per_page" class="form-control mt-3">
                    <option value="">par page</option>
                    <option value="">10</option>
                    <option value="">20</option>
                  </select>

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-tools">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th></th>
                      <th>
                        <p>Nom du produit:</p>
                        <input v-model="searchProduit" type="text" class="form-control">
                      </th>

                      <!-- <th>
                        <p>catégoriePathologie:</p>
                        <input v-model="searchProduit" type="text" class="form-control">


                      </th>
                      
                      <th>Pharmacie</th>
                      <th>Prix</th> -->
                      
                      <th>Actions</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="produit in produits" :key="produit.id">


                      <td>{{ produit.id }}</td>
                      <td>{{ produit.nom }}</td>
                     <!--  <td>{{  }}</td>
                      <td>{{  }}</td> -->
                      <td>{{ produit.prix }}</td>

                      <td>


                        <button @click="edit(produit.id)" class="btn btn-info mr-2  " style="width: 40px;"><i class="fas fa-pen"></i></button>
                        <button @click="destroy(produit.id)" class="btn btn-danger mr-2 " style="width: 40px;"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


  </div>
</template>
 
<script setup >
import { router } from '@inertiajs/vue3';
import { ref } from 'vue';
import MainLayout from '../../Layouts/MainLayout.vue';
import Create from './Create.vue';



  const  props= defineProps({
    produits:Object,
    pharmacie:Object
  }) 
 

  function edit(id){
    router.get('/produit/'+id+'/edit')
    
  };

  function destroy(id){
    if (confirm('Vous êtes sur le point de supprimer cet élément,voulez-vous continuez?')) {
      router.delete('/produit/'+id)

    }

  }

  
  









</script>
 
 