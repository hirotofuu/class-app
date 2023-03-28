<template>
<h2 class="text-2xl font-bold mr-auto ml-auto mt-24 max-w-md text-center">授業登録フォーム</h2>
<div class="sm:mt-10 mt-0  max-w-xl mr-auto ml-auto p-10 sm:border-2 border-black rounded-md mb-10">
    <div class="grid grid-cols-1 gap-6">
        <form v-on:submit.prevent="submit">
            <label class="block">
                <span class="text-gray-700">講義名<span class="text-red-400">（必須）</span></span>
                <input
                type="text"
                class="
                    mt-1
                    block
                    w-full
                    rounded-md
                    bg-gray-100
                    border-transparent
                    focus:border-gray-500 focus:bg-white focus:ring-0
                "
                placeholder=""
                v-model="tweet.title"
                />
            </label>
            <label class="block mt-7">
                <span class="text-gray-700">教師名<span class="text-red-400">（必須）</span></span>
                <input
                type="text"
                class="
                    mt-1
                    block
                    w-full
                    rounded-md
                    bg-gray-100
                    border-transparent
                    focus:border-gray-500 focus:bg-white focus:ring-0
                "
                placeholder=""
                v-model="tweet.teacher"
                />
            </label>
            <label class="block mt-7">
                <span class="text-gray-700">評価<span class="text-red-400">（必須）</span></span>
                <select
                class="
                    block
                    w-full
                    mt-1
                    rounded-md
                    bg-gray-100
                    border-transparent
                    focus:border-gray-500 focus:bg-white focus:ring-0
                "
                v-model="tweet.hyouka"
                >
                <option>普</option>
                <option>楽</option>
                <option>難</option>
                </select>
            </label>
                <label class="block mt-7">
                <span class="text-gray-700">授業形式<span class="text-red-400">（必須）</span></span>
                <select
                class="
                    block
                    w-full
                    mt-1
                    rounded-md
                    bg-gray-100
                    border-transparent
                    focus:border-gray-500 focus:bg-white focus:ring-0
                "
                v-model="tweet.format"
                >
                <option>対面</option>
                <option>zoom</option>
                <option>オンデマンド</option>
                </select>
            </label>
            <label class="block mt-7">
                <span class="text-gray-700">自分が所属している学部<span class="text-red-400">（必須）</span></span>
                <select
                class="
                    block
                    w-full
                    mt-1
                    rounded-md
                    bg-gray-100
                    border-transparent
                    focus:border-gray-500 focus:bg-white focus:ring-0
                "
                v-model="tweet.gakubu"
                >
                <option>経済学部</option>
                <option>文学部</option>
                <option>法学部</option>
                <option>商学部</option>
                <option>理工学部</option>
                <option>環境経済学部</option>
                <option>総合政策学部</option>
                <option>医学部</option>
                <option>看護学部</option>
                </select>
            </label>
            <label class="block mt-7">
                <span class="text-gray-700">キャンパス<span class="text-red-400">（必須）</span></span>
                <select
                class="
                    block
                    w-full
                    mt-1
                    rounded-md
                    bg-gray-100
                    border-transparent
                    focus:border-gray-500 focus:bg-white focus:ring-0
                "
                v-model="tweet.campus"
                >
                <option>日吉</option>
                <option>三田</option>
                <option>矢上</option>
                <option>湘南藤沢</option>
                <option>芝共立</option>
                <option>信濃町</option>
                </select>
            </label>
            <label class="block mt-7">
                <span class="text-gray-700">授業,課題について<span class="text-red-400">（必須）</span></span>
                <textarea
                class="
                    mt-1
                    block
                    w-2/3
                    rounded-md
                    bg-gray-100
                    border-transparent
                    focus:border-gray-500 focus:bg-white focus:ring-0
                "
                rows="3"
                v-model="tweet.clas"
                ></textarea>
            </label>
                <label class="block mt-7">
                <span class="text-gray-700">テストについて<span class="text-red-400">（必須）</span></span>
                <textarea
                class="
                    mt-1
                    block
                    w-2/3
                    rounded-md
                    bg-gray-100
                    border-transparent
                    focus:border-gray-500 focus:bg-white focus:ring-0
                "
                rows="3"
                v-model="tweet.test"
                ></textarea>
            </label>
            <button type="submit" class="mt-10 ml-auto p-2 rounded-md text-white hover:text-gray-400  bg-gray-400 hover:bg-white" >登録</button>
        </form>
        </div>
      </div>
</template>
<script>
export default {
    data(){
        return{
            tweet:{
                title:'',
                teacher:'',
                hyouka:'',
                date:new Date().toLocaleString(),
                format:'',
                gakubu:'',
                campus:'',
                clas:'',
                test:'',
            }
        };
    },
    methods:{
        submit(){
            axios.post('/api/tweets/store', this.tweet).then(()=>{
                console.log('saved');
                this.$router.push({name: "home-url"});
            });
        }
    },
    created(){

    }
}
</script>
