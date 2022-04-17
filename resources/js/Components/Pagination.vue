<template>
  <div class="mt-3 mb-5 text-right">
    <template v-for="link of page.links" :key="link.label">
      <Link v-if="link.url" v-html="link.label" :href="link.url" class="mr-3" 
        :class="link.active ? ' underline' : ''"></Link>

      <span v-else v-html="link.label" class="text-gray-400 mr-3"></span>
    </template>
  </div>
</template>

<script>
export default {
    props: ['page']
}
</script>