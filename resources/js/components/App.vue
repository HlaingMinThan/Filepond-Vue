<template>
  <file-pond
    name="image"
    allow-multiple="true"
    max-files="3"
    server="/images"
    accepted-file-types="image/*"
    class="mt-5 cursor-pointer"
    label-idle="Drop Images here or click<span class='filepond--label-action'> here</span> to upload..."
  />
</template>

<script>
import VueFilePond from "vue-filepond";
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";

import "filepond/dist/filepond.min.css";

const FilePond = VueFilePond(FilePondPluginFileValidateType);
export default {
  components: { FilePond },
};
</script>

<style>
</style>