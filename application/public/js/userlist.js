function UserList() {
    this.init = function () {
        this.$dtable = new BeedooDatatable('#table', '/users/get', {});
        this.$dtable.init();
        console.log(this.$dtable);
    }
}

userList = new UserList();

$(document).ready(function () {
    userList.init();
});