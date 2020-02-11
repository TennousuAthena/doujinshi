/*
 *  ____             ______
 * | __ )  ___ _ __ |__  (_)
 * |  _ \ / _ \ '_ \  / /| |
 * | |_) |  __/ | | |/ /_| |
 * |____/ \___|_| |_/____|_|
 * 阅本无数
 */
$(document).ready(function() {
    $("#code-submit").click(function () {
        if($("#code").val() === ""){
            $("#msgTitle").text("神秘代码为空");
            $("#msg").text("你好像还没有填写神秘代码");
            $('#Modal').modal('show');
        }else {
            $.ajax({
                url: "api.php?mode=activeCode&code=" + $("#code").val(), async: true, success: function (result) {
                    $("#msgTitle").text("返回消息");
                    $("#msg").text(result.errMsg);
                    $('#Modal').modal('show');
                    console.log(result);
                    if(result.success === 1){
                        $("#button-dismiss").click(function () {
                            window.location.reload();
                        })
                    }
                }, cache: false
            });
        }
    });

    $("#token-submit").click(function () {
        let pk = $("#input-pk").val(),
            sk = $("#input-sk").val(),
            et = $("#input-expire").val();

        if (pk === "" || sk === "" || et === ""){
            $("#msgTitle").text("错误");
            $("#msg").text("信息好像没填全啊");
            $('#Modal').modal('show');
            return false;
        }

        if(!/^[0-9]*$/.test(et)){
            $("#msgTitle").text("错误");
            $("#msg").text("有效时间必须是数字！");
            $('#Modal').modal('show');
            return false;
        }
        let result = {
            "m" : "a",
            "ET": Math.round(new Date() / 1000) + et,
            "PK": pk,
            "SK": sk
        };
        result = btoa(JSON.stringify(result));
        result = result.split('').reverse().join('');
        $("#token-result").text(result);
    })
});