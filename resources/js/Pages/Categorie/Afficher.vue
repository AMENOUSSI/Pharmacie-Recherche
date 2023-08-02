<template>
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m" style="text-align: center;">Les différentes catégories</h1>
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

                  <Create />

                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-tools">
                <table class="table  ">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Nom</th>
                      <th>Actions</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="categorie in categories" :key="categorie.id">


                      <td>{{ categorie.id }}</td>
                      <td>{{ categorie.nom }}</td>

                      <td>


                        <button @click.prevent="edit(categorie.id)" class="btn btn-info mr-2  " style="width: 40px;"><i
                            class="fas fa-pen"></i></button>
                        <button @click.prevent="destroy(categorie.id)" class="btn btn-danger mr-2 "
                          style="width: 40px;"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>

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
import { ref } from 'vue';
import MainLayout from '../../Layouts/MainLayout.vue';
import { router } from '@inertiajs/vue3';

const props = defineProps({
  categories: Object,
  errors: Object
})



function edit(id) {
  router.get('/categorie/' + id + '/edit')

}

function destroy(id) {
  if (confirm('Are you sure you want to delete this pharmacy?')) {
    router.delete('/categorie/'+id)

  }



}





</script>

