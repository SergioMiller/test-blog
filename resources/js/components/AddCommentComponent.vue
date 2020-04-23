<template>
    <div class="add-comment">
        <div v-if="submitResult === true" class="alert alert-success">
            {{ this.submitMessage }}
        </div>
        <div v-if="submitResult === false" class="alert alert-danger">
            {{ this.submitMessage }}
        </div>

        <div class="comment-form">

            <div v-if="preloader" class="overlay"></div>
            <div v-if="preloader" class="spinner-border text-primary"></div>

            <div class="card">
                <div class="card-body">
                    <h4>Add comment</h4>
                    <p v-for="(error, field) in submitErrors" class="text-danger"><strong>{{ field }}:</strong> {{ error[0] }} </p>
                    <form action="#">
                        <div class="form-group">
                            <label for="comment-author">Author</label>
                            <input type="text" id="comment-author" class="form-control" v-model="author" required>
                        </div>
                        <div class="form-group">
                            <label for="comment-content">Content</label>
                            <textarea v-model="content" id="comment-content" class="form-control" required></textarea>
                        </div>
                        <button class="btn btn-success" v-on:click.prevent="addComment">Save</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="comment-list">
            <div class="mb-3 p-3 bg-white rounded shadow-sm">
                <div v-if="comments.length">
                <h6 class="border-bottom border-gray pb-2 mb-0">Comments</h6>
                    <div v-for="comment in comments" class="media text-muted pt-3">
                        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <strong class="d-block text-gray-dark">{{ comment.author }}</strong>
                            {{ comment.content }}
                        </p>
                    </div>
                </div>
                <div v-else>Comments not found</div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                submitResult: null,
                submitMessage: '',
                submitErrors: [],
                preloader: false,
                author: '',
                content: '',
            }
        },
        props: [
            'comments',
            'post_id',
        ],
        methods: {
            addComment: async function () {
                this.preloader = true;
                this.submitErrors = [];
                await axios.post('/api/v1/comment', {
                    post_id: this.post_id,
                    author: this.author,
                    content: this.content,
                }).then((response) => {
                    this.submitResult = true;
                    this.submitMessage = 'Success';
                    this.comments.unshift(response.data.data);
                    this.author = '';
                    this.content = '';
                }).catch((error) => {
                    console.log(error.response.data.errors)
                    this.submitMessage = error.response.data.message;
                    this.submitErrors = error.response.data.errors;
                    this.submitResult = false;
                });
                this.messageTimer()
                this.preloader = false;
            },
            messageTimer: function () {
                setTimeout(() => {
                    this.submitResult = null;
                }, 3000)
            }
        }
    }
</script>

<style scoped>

</style>
