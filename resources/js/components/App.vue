<template>
    <file-pond
        name="image"
        allow-multiple="true"
        max-files="3"
        server="/images"
        accepted-file-types="image/*"
        class="mt-5 cursor-pointer"
        label-idle="Drop Images here or click<span class='filepond--label-action'> here</span> to upload..."
        @processfile="handleProcessed"
        :maxFiles="5"
    />
    <div class="grid grid-cols-3 gap-6" >
      <div v-for="image in images" :key="image"><img :src="`/storage/images/${image}`" class="object-cover w-full h-48"></div>
    </div>
</template>

<script>
import VueFilePond from "vue-filepond";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
import "filepond/dist/filepond.min.css";
import axios from "axios";

const FilePond = VueFilePond(FilePondPluginFileValidateType);

export default {
    components: { FilePond },
    data(){
      return{
        images:[]
      }
    },
    methods: {
        async getImages() {
            const res=await axios.get("/images");
            this.images=res.data
        },
        //after upload one file
        handleProcessed(error,file){
          if(error){
            console.log(error)
          }

          //update on client side
          console.log(file)
          this.images.unshift(file.serverId)
        }
    },
    mounted() {
      this.getImages()
    },
};
</script>

<style></style>
