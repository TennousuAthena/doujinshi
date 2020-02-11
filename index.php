<?php
require_once ("libs.php");
require_once ("auth.php");
$mode = @$_GET['mode'];
?>
<!------------------
 ____             ______
| __ )  ___ _ __ |__  (_)
|  _ \ / _ \ '_ \  / /| |
| |_) |  __/ | | |/ /_| |
|____/ \___|_| |_/____|_|
阅本无数
--------------------->
<!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>阅本无数</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta name="theme-color" content="#563d7c">


    <style>

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 5rem;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }
        .starter {
            padding: 3rem 1.5rem;
            text-align: center;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <a class="navbar-brand" href="#">阅本无数</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">首页</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="/?mode=generateToken">Token</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" id="code" required placeholder="输入神秘代码ヾ(•ω•`)o" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" id="code-submit">提交</button>
        </div>
    </div>
</nav>

    <?php switch ($mode){
        case '':{ ?>
    <main role="main" class="container">
            <?php if(!$IS_LOGIN): ?>
                <div class="p-3 mb-2 bg-warning text-white">警告！无法建立信道以连接里世界，请尝试<a href="?mode=generateToken"> 投喂令牌（token）</a></div>
            <?php else: ?>
                <div class="p-3 mb-2 bg-success text-white">连接里世界成功！</div>
            <?php endif; ?>
            <div class="starter">
                <h1>轻松阅本</h1>
                <p class="lead">这是可以在任何地方轻松阅读<b>本子</b>的工具，好孩子千万不要用哦！坏孩子也不行！</p>
    </main><!-- /.container -->
    <?php break; }
        case 'generateToken':{?>
    <main role="main" class="container">
        <div id="form">
            <div class="form-group">
                <label for="input-pk">PK</label>
                <input type="text" class="form-control" id="input-pk" placeholder="">
            </div>
            <div class="form-group">
                <label for="input-sk">SK</label>
                <input type="text" class="form-control" id="input-sk" placeholder="">
            </div>

            <label for="input-expire">有效时间</label>
            <div class="input-group">
                <input id="input-expire" type="text" class="form-control" placeholder="有效期（天）"  aria-describedby="days">
                <div class="input-group-append">
                    <span class="input-group-text" id="days">天</span>
                </div>
            </div>
            <br />
            <button class="btn btn-primary btn-lg btn-block" id="token-submit">提交</button>
            <br />

            <label for="token-result">结果</label>
            <textarea class="form-control" id="token-result" readonly placeholder="生成的神秘代码会在这里哦~"></textarea>
        </div>
    </main>
    <?php }
    }?>


<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="msgTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="msgTitle"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p id="msg"></p>
            </div>
            <div class="modal-footer">
                <button type="button" id="button-dismiss" class="btn btn-primary" data-dismiss="modal">我知道了</button>
            </div>
        </div>
    </div>
</div>

<footer class="footer mt-auto py-3 fixed-bottom">
    <div class="container">
        <span class="text-muted"><a href ="https://github.com/qcminecraft/doujinshi" target="_blank">Github</a> | By <a href="https://nyaruko.love" target="_blank">QCTech</a> | 本站不提供任何图片上传服务，所有内容均来自其他站点所提供的公开引用资源 </span>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="assets/js/benzi.js" type="text/javascript"></script>
</body>
</html>
