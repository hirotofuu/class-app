<template>
<div class="flex mr-auto ml-auto w-full ">
  <div class="ml-auto mr-auto sm:w-1/2 w-2/3">
    <div class="border-b-2 border-black mt-24 mb-7">
      <h1 class="">{{categoryTitle}}生による投稿一覧 「{{tweets.length}}」件</h1>

    </div>
    <div v-for="(tweet, index) in tweets" :key=index class="grid gap-4 grid-cols-1 pb-3 " >
    <router-link v-bind:to="{name:'show-url', params:{tweetId: tweet.id}}" class="  p-3  border-2 rounded-md border-black">  <span class="ml-3">{{tweet.title}}</span> <p class="border-t-2 "> <span class="ml-3">{{tweet.teacher}} </span> <span class="ml-14">評価：{{tweet.hyouka}}</span> <span class="ml-14 hidden lg:inline xl:inline">投稿：{{tweet.date}}</span></p> </router-link>
    </div>

  </div>


</div>
</template>
<script>
export default {
    props:{
        categoryTitle: String
    },
    data(){
        return {
            tweets:[],
        };
    },
    methods:{
        categoryTweet(){
            axios.get('/api/tweets/category/'+ this.categoryTitle).then((res)=>{
                this.tweets=res.data.reverse();
            });
        }
    },
    mounted(){
        this.categoryTweet();
    }
}
</script>
