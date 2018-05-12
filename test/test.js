function F() {

}
F.prototype={
    constructor:F,
    init:function () {
        console.log("init");
    }
};
