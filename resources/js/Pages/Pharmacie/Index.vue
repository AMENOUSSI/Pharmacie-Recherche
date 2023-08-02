<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m" style="text-align: center;">La liste des pharmacies</h1>
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



                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-tools">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Nom</th>
                      <th>Région</th>
                      <th>Préfecture</th>
                      <th>Téléphone</th>
                      <th>Actions</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="pharmacie in pharmacies" :key="pharmacie.id">


                      <td>{{ pharmacie.id }}</td>
                      <td>{{ pharmacie.nom }}</td>
                      <td>{{ pharmacie.region }}</td>
                      <td>{{ pharmacie.prefecture }}</td>
                      <td>{{ pharmacie.telephone }}</td>

                      <td>


                        <Link @click.prevent="edit(pharmacie.id)" class="btn btn-info mr-2" style="width: 40px;">
                          <i class="fas fa-pen"></i>
                        </Link>
                        <Link @click.prevent="destroy(pharmacie.id)" class="btn btn-danger mr-2" style="width: 40px;">
                          <i class="fas fa-trash"></i>
                        </Link>
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
 
<script setup>
import { router } from '@inertiajs/vue3';
import { Layout } from 'admin-lte/dist/js/adminlte';
import MainLayout from '../../Layouts/MainLayout.vue';


  const props = defineProps({
    pharmacies: Object
  })


  function edit(id){
    router.get('/pharmacie/'+id+'/edit')
    
  };

  function destroy(id){
    if (confirm('Are you sure you want to delete this pharmacy?')) {
      router.delete('/pharmacie/'+id)

    }

  }

  




</script>

 
 