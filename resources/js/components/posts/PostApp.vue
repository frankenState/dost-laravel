<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 m-auto">
                <h3 class="display-4">Post CRUD using VueJs</h3>
                <div class="input-group mb-3">
                    <input v-model="searchKey" type="text" class="form-control" placeholder="Search" aria-label="Search">
                    <button @click="searchPost" class="btn btn-outline-secondary" type="button">Search</button>
                </div>
                <Create @update-posts="updatePosts" />
                <Read 
                    @update-posts="updatePosts"
                    :posts="posts" 
                />
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import Create from './Create';
import Read from './Read';

export default {
    components: {
        Create,
        Read
    },
    data() {
        return {
            posts: [],
            searchKey: '',
        }
    },
    methods: {
        async searchPost() {
            if (this.searchKey.length == 0){
                this.fetchPosts();
                return;
            }

            try {
                let res = await axios.get(`api/search/${this.searchKey}`);
               // console.log("searchPost()=>", res);
                this.posts = res.data.posts;
            } catch (e){
                console.log('Error=>', e);
            }
        },
        async fetchPosts(){
            try {
                let res = await axios.get('/posts/api');

                this.posts = res.data.posts;

            } catch (e){
                console.log("Error=>", e);
            }
        },
        updatePosts(){
            this.fetchPosts();
        }
    },
    created(){
        this.fetchPosts();
    }
}
</script>
