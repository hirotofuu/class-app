<template>


    <div class="ml-auto mr-auto sm:w-2/3 w-full">
        <h1 class="mt-20 text-2xl font-bold ml-auto mr-auto text-center max-w-md ">{{tweet.title}}の詳細</h1>
        <div class="sm:max-w-xl w-full rounded-md sm:mt-10 mt-0  ml-auto  mr-0 lg:mr-auto  xl:mr-auto  sm:border-2 md:border-2 lg:border-2 xl:border-2 border-black rounded-md overflow-scroll">
          <div class="grid grid-cols-1 gap-6 p-10">
            <label>
              <span class=" border-b-2 border-blue-400 text-blue-400">講義名</span>
              <h1 class="mt-2">{{tweet.title}}</h1>
              </label>
            <label>
              <span class="border-b-2 border-blue-400 text-blue-400">教師名</span>
              <h1 class="mt-2">{{tweet.teacher}}</h1>
            </label>
            <label>
              <span class="border-b-2 border-blue-400 text-blue-400">投稿日</span>
              <h1 class="mt-2">{{tweet.date}}</h1>
            </label>
            <label>
              <span class="border-b-2 border-blue-400 text-blue-400">評価</span>
              <h1 class="mt-2">{{tweet.hyouka}}</h1>
            </label>
            <label>
              <span class="border-b-2 border-blue-400 text-blue-400">形式</span>
              <h1 class="mt-2">{{tweet.format}}</h1>
            </label>
            <label>
              <span class="border-b-2 border-blue-400 text-blue-400">キャンパス</span>
              <h1 class="mt-2">{{tweet.campus}}</h1>
            </label>
            <label>
              <span class="border-b-2 border-blue-400 text-blue-400">出席, 課題について</span>
              <p class="mt-2 w-full break-normal whitespace-pre">{{tweet.clas}}</p>
            </label>
            <label>
              <span class="border-b-2 border-blue-400 text-blue-400">テストについて</span>
              <p class="mt-2 w-full break-normal whitespace-pre">{{tweet.test}}</p>
            </label>
          </div>
        </div>


    </div>
    <div class="">
        <div class=" grid grid-cols-1 px-1">
          <h1 class="mt-6 border-b-2">コメント欄</h1>
          <div v-for="(komento, index) in comments" :key=index>
              <span class="inline-block border-2   mt-3 p-2  rounded-md border-gray-400 whitespace-pre bg-gray-100">{{index+1}}.&emsp;{{komento.namae}}さん&emsp;{{komento.date}}<br>{{komento.content}}</span>

          </div>
          <input type="text" placeholder="name" class="w-2/3 mb-1 border-2 border-black rounded-md " v-model="comment.namae">
          <textarea name="" id="" cols="30" rows="10" placeholder="コメント入力" class="h-20 mb-1 w-2/3 border-2 border-black rounded-md " v-model="comment.content"></textarea>
          <button class="p-1 bg-gray-400 rounded-md text-white hover:text-gray-400 hover:bg-white ml-1 " v-on:click="snedComment">投稿</button>
        </div>
    </div>






</template>
<script>
import SideBarss from './sides.vue';
export default {
    props:{
        tweetId: String
    },
    data(){
        return{
            tweet:{},
            comments:[],
            comment:{
                namae:'名無し',
                content:'',
                date:'',
                tweet_id:this.tweetId,
            }
        };

    },
    components:{
        SideBarss
    },
    methods:{
        getTweet(){
            axios.get('/api/tweets/'+ this.tweetId).then((res)=>{
                this.tweet=res.data;
            });
        },
        getComments(){
            axios.get('/api/tweets/comment/'+ this.tweetId).then((res)=>{
                this.comments=res.data;
            });
        },
        snedComment(){
            this.comment.date=new Date().toLocaleString();
            axios.post('/api/tweets/comment/store/', this.comment).then((res)=>{
                console.log('saved');
                this.getComments();
            });
            this.comment.content="";
        }
    },
    mounted(){
        this.getTweet();
        this.getComments()
    }
}
</script>

