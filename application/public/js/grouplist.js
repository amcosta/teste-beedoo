function GroupList() {
    this.init = function () {
        this.$dtable = new BeedooDatatable('#table', '/groups/get', {});
        this.$dtable.init();
        console.log(this.$dtable);
    }
}

groupList = new GroupList();

$(document).ready(function () {
    groupList.init();
});