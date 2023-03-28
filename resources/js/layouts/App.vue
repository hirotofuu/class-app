<template>
    <div class="flex  justify-between fixed w-full top-0 text-lg sm:h-16 h-15 items-center bg-blue-400">
   <router-link v-bind:to="{name:'home-url'}" class="ml-5 sm:ml-14 md:ml-20 lg:ml-40 xl:ml-40 text-2xl">keiシラ</router-link> <div class="sm:block md:block lg:block xl:block ">
    <input placeholder="講義名 or 教師名" type="text" class="h-8 pl-1 rounded-sm" v-model="keyword">
    <button  v-on:click="onclick" class="p-1 rounded-r-md h-8 text-sm hover:text-white">検索</button>
  </div>
  <div class=" md:mr-20 lg:mr-40 xl:mr-40 mr-5  items-center ">

    <router-link v-bind:to="{name:'create-url'}" class=" h-20 hover:text-white sm:text-md text-sm">授業<span class="hidden sm:inline-block md:inline-block lg:inline-block xl:inline-block">登録</span> <div class="sm:hidden md:hidden lg-hidden xl:hidden text-sm">登録</div></router-link> </div>
</div>
    <router-view></router-view>
</template>
<script>
export default {

    data(){
        return{
            keyword:'',
        };
    },
    methods:{
        onclick(){
            if(!this.keyword){
                return ;
            }
            this.$router.push({name:"search-url", params:{searchTitle: this.keyword}})
        },
    }
}
</script>

