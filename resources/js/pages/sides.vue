<template>
    <div class=" fixed w-60 hidden sm:hidden md:hidden lg:block xl:block p-2 ml-7 mt-24 rounded-lg bg-gray-200">
          <h1 class="pl-2 border-b-2 border-gray-400">このサイトについて</h1>
          <span class="">サイトは慶應大学の履修に関する情報サイトです。気軽に授業を投稿や検索し学友と楽しい大学生活を過ごしましょう。</span>
        </div>
        <div class=" fixed w-60 idden sm:hidden md:hidden lg:block xl:block p-2 ml-7 mt-60 rounded-lg bg-gray-200">
          <h1 class="pl-2 border-b-2 border-gray-400">カテゴリー</h1>
          <ul v-for="(category, index) in categories" :key=index class="">
            <li class="pl-2 mt-2"> <router-link v-bind:to="{name:'category-url', params:{categoryTitle: category}}" class="hover:text-blue-400"> {{category}}</router-link></li>
          </ul>
        </div>
        <div class="w-72 hidden sm:block"></div>
    </template>
    <script>
    export default {
        name:'SideBarss',
        data(){
            return{
                categories:["経済学部","文学部","法学部","商学部","理工学部","医学部","看護学部","SFC"],
            };
        },
    }
    </script>
