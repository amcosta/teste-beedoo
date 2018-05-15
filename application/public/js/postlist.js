function PostList() {
    this.init = function () {
        this.$dtable = new BeedooDatatable('#table', '/posts/get', {});
        this.$dtable.init();
        console.log(this.$dtable);
    }
}

postList = new PostList();

$(document).ready(function () {
    postList.init();
});