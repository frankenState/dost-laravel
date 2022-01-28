<template>
<!-- Modal -->
<div class="modal fade" id="editPost" tabindex="-1" aria-labelledby="editPostLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPostLabel">Edit Post</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form @submit.prevent="updatePost">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input v-model="post.title" placeholder="Post Title" type="text" class="form-control" id="title" />
            </div>
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea v-model="post.body" placeholder="Post Body" class="form-control" id="body" rows="3"></textarea>
            </div>
            <div class="btn-group">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="mt-2">
    <div 
    v-for="post in posts" 
    :key="post.id" 
    class="card mb-2"
>
        <div class="card-body">
            <h3 class="card-title">{{ post.title }}</h3>
            <p class="lead">{{ post.body }}</p>
            <hr/>
            <small>Posted by {{`${post.user.first_name} ${post.user.last_name}`}} on {{ post.created_at }}</small>
        </div>
        <div v-if="user.id == post.user_id" class="card-footer">
            <div class="btn-group">
                <button @click="editPost(post.id)" data-bs-toggle="modal" data-bs-target="#editPost" class="btn btn-sm btn-outline-dark">Edit</button>
                <button @click="deletePost(post.id)" class="btn btn-sm btn-outline-dark">Delete</button>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    props: {
        posts: Array
    },
    data() {
        return {
            user:{
                id:''
            },
            post: {
                id: '',
                title: '',
                body: '',
            }
        }
    },
    methods: {
        async deletePost(id){
            if (!confirm('Are you sure?')) return;

            try {
                let res = await axios.delete(`api/delete/${id}`);
                console.log("deletePost()=>", res);
                this.$.emit('update-posts');
            } catch (e){    
                console.log("Error=>", e);
            }
        },
        async editPost(id) {
            try {
                let res = await axios.get(`api/show/${id}`);
               // console.log("editPost()=>", res);
                this.post = res.data.post;

            } catch (e){
                console.log("Error=>", e);
            }
        },
        async updatePost(){

            const updatedPost = {
                id: this.post.id,
                title: this.post.title,
                body: this.post.body,
            };

            try {
                let res = await axios.put(`api/update`, updatedPost);
                // console.log("updatePost()=>", res);
                this.$.emit('update-posts');
            } catch (e){
                console.log("Error=>", e);
            }
        },
        async getCurrentAuthUser(){
            try {
                let res = await axios.get('http://localhost:8000/users/api/auth');
             //   console.log("getCurrentAuthUser()", res, this.posts)
                this.user = res.data.user;
            } catch (e){
                console.log("Error=>", e);
            }
        }
    },
    created(){
        this.getCurrentAuthUser().then(() => {});
    },
    emits: ['update-posts']
}
</script>
