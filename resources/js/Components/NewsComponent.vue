<script setup>
import {onMounted, ref} from "vue";

const news = ref({});
const comment = ref([]);

const getNews = async () => {
    await axios.get('/news/get-news').then( response => {
        news.value = response.data
    })
}

const sendMessage = async (content, news_id, user_id) => {
    await axios.post('/news/comments', {content: content, news_id: news_id, user_id: user_id})
        .then( response => {
            news.value[news_id - 1].comments.push(response.data)
            comment.value[news_id] = ''
        })
}

onMounted(getNews)

</script>

<template>
    <div class="container py-3 d-flex flex-column gap-3">
        <div class="card p-3" v-for="news_item in news" :key="news_item.id">
            <h1>{{ news_item.title }}</h1>
            <p>{{ news_item.content }}</p>
            <p>Автор: {{ news_item.user.name }}, {{ news_item.created_at }}</p>
            <div class="card-body border-top pt-3 p-0">
                <div class="input-group">
                    <input v-model="comment[news_item.id]" @keyup.enter="sendMessage(comment[news_item.id], news_item.id, news_item.user.id)" type="text" class="form-control" placeholder="Ваш комментарий..." aria-label="Ваш комментарий..." aria-describedby="basic-addon2">
                    <button @click.prevent="sendMessage(comment[news_item.id], news_item.id, news_item.user.id)" class="input-group-text bg-primary text-white" id="basic-addon2">Отправить</button>
                </div>
                <div v-if="news_item.comments" v-for="comment in news_item.comments" :key="comment.id">
                    <div class="d-flex justify-content-between mt-3">
                        <div class="">
                            <div class="d-flex gap-3">
                                <img height="50" width="50" class="rounded-circle" alt="" :src="'storage/images/avatars/' + comment.user.pfp">
                                <div class="d-flex flex-column">
                                    <p class="m-0">{{ comment.user.name }}</p>
                                    <p class="m-0">{{ comment.content }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="m-0 align-self-end">{{ comment.created_at }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>
