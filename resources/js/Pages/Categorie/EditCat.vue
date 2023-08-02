<template>
<div class="modal-fade" id="staticBackdrop" data-backdrop="static" data-board="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

   
   <div class="modal-dialog -lg">

   
        <div class="modal-content">

   
            <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&Time</span>

                    </button>
            </div> 

            <div class="modal-body">
                <form id ="editForm">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-co ntrol" id="" required v-model="form.nom">
                    </div>

                </form>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success" data-dismiss="modal">Undo</button>

            </div>
        </div>
    
   </div>

</div>
</template>
<script setup>
import MainLayout from '@/Layouts/MainLayout.vue';
import { Layout } from 'admin-lte/dist/js/adminlte';
import axios from 'axios';
import { reactive, watch } from 'vue';
/*Layout : MainLayout,

/*defineProps({

    categorieId: {
        type : Number,
        required: true
    },

    show :{
        type: Boolean,
        default: false
    }

    
    

});

const editingCategorie = reactive({
    id : "",
    nom : "",
    nomError : "",
})
openModal = ()=>{
    $("#EditModal").modal("show")
}

closeModal = ()=>{
    $("#EditModal").modal("hide")
}

getCategorieById = ()=>{
    axios.get(route("categorie.edit",{categorie: props.categorieId}))
    .then((response)=>{
       console.log("response:",response.data) 

    }).catch((error)=>{
        console.log(error)
    })
}
watch(
    ()=>props.show,
    (newval,oldval)=>{
        if(newval){
            openModal()
        }else{
           closeModal() 
        }
    }
)



*/
</script>