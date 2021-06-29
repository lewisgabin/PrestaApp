<template>
 
</template>

<script>
export default {
 mounted(){
   
this.logout();
 },
 methods: {
   
  logout() {
      let me = this;
      axios
        .get("/C-logout")
        .then((response) => {
       
        location.reload();
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
