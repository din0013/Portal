/**
 * Created by aki on 2017/04/04.
 */

//$(function () {
//    var message = $("#flash").data("value");
//
//    Materialize.toast(message, 4000)
//})
$(document).ready(function() {
    //メッセージが設定されていた場合表示
    var message = $("#flash").data("value");

    if (message !== ""){
        Materialize.toast(message, 4000)
    }
});

