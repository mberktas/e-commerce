<template>
  <div id="app">
    <router-view/>
  </div>
</template>


<script>
export default {
     watch: {
        $route: {
            immediate: true,
            handler(to) {
                document.title = to.meta.title || 'Some Default Title';
            }
        },
    },
}
</script>

