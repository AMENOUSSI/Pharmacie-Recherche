<!-- resources/js/Pages/Pharmacies/Create.vue -->

<template>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Mis à jour d'une categorie de Pathologie</h3>
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
     
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { router } from '@inertiajs/vue3';
import { ref, onMounted } from "vue";
import { useForm } from '@inertiajs/vue3';


const props = defineProps({
    errors: Object,
    categorie: Object

})

const form = useForm({
    nom: props.categorie.nom,
    
    
});

function submitForm(id) {
    form.put(route('categorie.update', { categorie: id }))
    .then(() => {
            // Handle the success response if needed
            router.push({ name: 'categorie.index' });
        })
        .catch((error) => {
            // Handle the error response if needed
            console.error(error);
        });

}




</script>
     