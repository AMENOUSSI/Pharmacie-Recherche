<template>
    <!-- Your template code here -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                Edition
                            </h3>
                        </div>
                        <div class="card-body">
                            <form @submit.prevent="soumettre(pharmacie.id)">
                                <div class="form-group">
                                    <label for="nom">Nom:</label>
                                    <input type="text" class="form-control" id="nom" v-model="form.nom" />
                                </div>
                                <div class="form-group">
                                    <label for="region">Région:</label>
                                    <input type="text" class="form-control" id="adresse" v-model="form.region" />
                                </div>
                                <div class="form-group">
                                    <label for="prefecture">Préfecture:</label>
                                    <input type="text" class="form-control" id="telephone" v-model="form.prefecture" />
                                </div>
                                <div class="form-group">
                                    <label for="telephone">Téléphone</label>
                                    <input type="number" class="form-control" id="email" v-model="form.telephone" />
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Soumettre</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { router, useForm } from '@inertiajs/vue3';
import { reactive } from 'vue';
 

const props = defineProps({
    pharmacie: Object,
    errors:Object
})

const form = useForm({
    nom: props.pharmacie.nom,
    region: props.pharmacie.region,
    prefecture: props.pharmacie.prefecture,
    telephone: props.pharmacie.telephone
});


function soumettre(id){
    form.put(route('pharmacie.update', { pharmacie: id }))
        .then(() => {
            // Handle the success response if needed
            router.push({ name: 'pharmacie.index' });
        })
        .catch((error) => {
            // Handle the error response if needed
            console.error(error);
        });
}

</script>
  