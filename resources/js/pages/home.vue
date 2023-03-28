<template>
<div class="flex mr-auto ml-auto w-full ">
  <div class="ml-auto sm:w-1/2 w-2/3">
    <div class="border-b-2 border-black mt-24 mb-7 flex">
      <h1 class="">{{this.$store.state.siborikomi}}の楽単一覧 「{{tweets.length}}」件</h1>
      <div class="flex">
        <select name="" id="" class="block
                  ml-10
                  mb-1
                  mt-1
                  rounded-md
                  bg-gray-200
                  border-transparent
                  focus:border-gray-500 focus:bg-white focus:ring-0"
                  v-model="kariSiborikomi">
                <option>すべて</option>
                <option>日吉</option>
                <option>三田</option>
                <option>矢上</option>
                <option>湘南藤沢</option>
                <option>芝共立</option>
                <option>信濃町</option>
          </select>
          <button class="px-1  rounded-md text-white text-sm hover:text-gray-400  bg-gray-400 hover:bg-white" v-on:click="siborikomiClick">絞り込む</button>
      </div>
    </div>
    <div class="grid gap-2 grid-cols-1   pb-3 " v-for="(tweet, index) in tweets" :key=index>
    <router-link v-bind:to="{name:'show-url', params:{tweetId: tweet.id}}" class="  p-3  border-2 rounded-md border-black">  <span class="ml-3">{{tweet.title}}</span> <p class="border-t-2 "> <span class="ml-3">{{tweet.teacher}} </span> <span class="ml-14">評価：{{tweet.hyouka}}</span> <span class="ml-14 hidden lg:inline xl:inline">投稿：{{tweet.date}}</span></p> </router-link>


    </div>
    <ul v-for="(page, index) in Pages" :key=index class="mt-5" v-if="tweets.length > 22">
        <li v-on:click="pageClick(page)" class="float-left ml-2 p-1 border-1 border-black cursor-pointer ">{{page}}</li>
    </ul>
  </div>
  <div class="mr-auto">
    <SideBar></SideBar>
  </div>
</div>
</template>
<script>
import axios from 'axios'
import SideBar from './side.vue';
export default {
    data(){
        return {
            tweets:[],
            last_page:'',
            range:22,
            kariSiborikomi:this.$store.state.siborikomi,
        };
    },
    components:{
        SideBar
    },

    computed:{
        Pages(){
            return this.calRange(1, this.last_page);
        }
    },

    methods:{
        async getTweets(){
            const result = await axios.get(`/api/tweets?page=${this.current_page}`);
            const tweets=result.data;
            this.last_page=tweets.last_page;
            this.$store.state.current_page=tweets.current_page;
            this.tweets=tweets.data.reverse();
        },

        async siborikomiTweets(){
            const result = await axios.get("/api/tweets/siborikomi/" + `${this.$store.state.siborikomi}?page=${this.current_page}`);
            const tweets=result.data;
            this.last_page=tweets.last_page;
            this.$store.state.current_page=tweets.current_page;
            this.tweets=tweets.data.reverse();
        },

        siborikomiClick(){
            if(this.kariSiborikomi===this.$store.state.siborikomi){
                return;
            }
            this.$store.state.siborikomi=this.kariSiborikomi;
            this.$store.state.current_page=1;
            if(this.$store.state.siborikomi==="すべて"){
                this.getTweets();
            }
            else{
                this.siborikomiTweets();
            }
        },

        calRange(start, end){
            const range=[];
            for(let i=start; i<=end ;i ++){
                range.push(i);
            }
            return range;
        },
        pageClick(page){
            this.$store.state.current_page=page;
            if(this.$store.state.siborikomi==="すべて"){
                this.getTweets();
            }
            else{
                this.siborikomiTweets();
            }
        }
    },

    mounted(){
        if(this.$store.state.siborikomi==="すべて"){
            this.getTweets();
        }
        else{
            this.siborikomiTweets()
        }
    }
}
</script>
