<template>
<div class="flex mr-auto ml-auto w-full ">
  <div class="ml-auto sm:w-1/2 w-2/3">
    <div class="border-b-2 border-black mt-24 mb-7 flex">
      <h1 class="">「{{searchTitle}}」 検索{{searchs.length}}件</h1>
   </div>
    <div class="grid gap-2 grid-cols-1   pb-3 " v-for="(search, index) in searchs" :key=index>
    <router-link v-bind:to="{name:'show-url', params:{tweetId: search.id}}" class="  p-3  border-2 rounded-md border-black">  <span class="ml-3">{{search.title}}</span> <p class="border-t-2 "> <span class="ml-3">{{search.teacher}} </span> <span class="ml-14">評価：{{search.hyouka}}</span> <span class="ml-10 hidden lg:inline xl:inline">投稿：{{search.date}}</span></p> </router-link>


    </div>
  </div>
  <div class="mr-auto">
      <SideBar></SideBar>
  </div>

</div>


</template>
<script>
import SideBar from './side.vue';
export default {
    props: {
        searchTitle: String,
    },
    data(){
        return{
            searchs:[],
            comment:'',
                };
    },
    components:{
        SideBar
    },
    methods:{
        getSearch(){
            axios.get('/api/tweets/search/' + this.searchTitle).then((res)=>{
                this.searchs=res.data.reverse();
            });
        },
    },
    watch:{
        searchTitle(newValue, oldValue){
            this.getSearch();
        }
    },
    mounted(){
        this.getSearch();
    },

}
</script>
