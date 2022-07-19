<?= $this->extend('layouts/member/member') ?>

<?= $this->section('content-banner') ?>

<div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
    <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Chat</h1>
    <div class="d-inline-flex text-white">
        <p class="m-0"><a class="text-white" href="">Beranda</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Chat</p>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
<style>
    .chat-app .people-list {
        width: 280px;
        position: absolute;
        left: 0;
        top: 0;
        padding: 20px;
        z-index: 7
    }

    .chat-app .chat {
        margin-left: 280px;
        border-left: 1px solid #eaeaea
    }

    .people-list {
        -moz-transition: .5s;
        -o-transition: .5s;
        -webkit-transition: .5s;
        transition: .5s
    }

    .people-list .chat-list li {
        padding: 10px 15px;
        list-style: none;
        border-radius: 3px
    }

    .people-list .chat-list li:hover {
        background: #efefef;
        cursor: pointer
    }

    .people-list .chat-list li.active {
        background: #efefef
    }

    .people-list .chat-list li .name {
        font-size: 15px
    }

    .people-list .chat-list img {
        width: 45px;
        border-radius: 50%
    }

    .people-list img {
        float: left;
        border-radius: 50%
    }

    .people-list .about {
        float: left;
        padding-left: 8px
    }

    .people-list .status {
        color: #999;
        font-size: 13px
    }

    .chat .chat-header {
        padding: 15px 20px;
        border-bottom: 2px solid #f4f7f6
    }

    .chat .chat-header img {
        float: left;
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-header .chat-about {
        float: left;
        padding-left: 10px
    }

    .chat .chat-history {
        padding: 20px;
        border-bottom: 2px solid #fff
    }

    .chat .chat-history ul {
        padding: 0
    }

    .chat .chat-history ul li {
        list-style: none;
        margin-bottom: 30px
    }

    .chat .chat-history ul li:last-child {
        margin-bottom: 0px
    }

    .chat .chat-history .message-data {
        margin-bottom: 15px
    }

    .chat .chat-history .message-data img {
        border-radius: 40px;
        width: 40px
    }

    .chat .chat-history .message-data-time {
        color: #434651;
        padding-left: 6px
    }

    .chat .chat-history .message {
        color: #444;
        padding: 18px 20px;
        line-height: 26px;
        font-size: 16px;
        border-radius: 7px;
        display: inline-block;
        position: relative
    }

    .chat .chat-history .message:after {
        bottom: 100%;
        left: 7%;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #fff;
        border-width: 10px;
        margin-left: -10px
    }

    .chat .chat-history .my-message {
        background: #efefef
    }

    .chat .chat-history .my-message:after {
        bottom: 100%;
        left: 30px;
        border: solid transparent;
        content: " ";
        height: 0;
        width: 0;
        position: absolute;
        pointer-events: none;
        border-bottom-color: #efefef;
        border-width: 10px;
        margin-left: -10px
    }

    .chat .chat-history .other-message {
        background: #e8f1f3;
        text-align: right
    }

    .chat .chat-history .other-message:after {
        border-bottom-color: #e8f1f3;
        left: 93%
    }

    .chat .chat-message {
        padding: 20px
    }

    .online,
    .offline,
    .me {
        margin-right: 2px;
        font-size: 8px;
        vertical-align: middle
    }

    .online {
        color: #86c541
    }

    .offline {
        color: #e47297
    }

    .me {
        color: #1d8ecd
    }

    .float-right {
        float: right
    }

    .clearfix:after {
        visibility: hidden;
        display: block;
        font-size: 0;
        content: " ";
        clear: both;
        height: 0
    }

    @media only screen and (max-width: 767px) {
        .chat-app .people-list {
            height: 465px;
            width: 100%;
            overflow-x: auto;
            background: #fff;
            left: -400px;
            display: none
        }
        .chat-app .people-list.open {
            left: 0
        }
        .chat-app .chat {
            margin: 0
        }
        .chat-app .chat .chat-header {
            border-radius: 0.55rem 0.55rem 0 0
        }
        .chat-app .chat-history {
            height: 300px;
            overflow-x: auto
        }
    }

    @media only screen and (min-width: 768px) and (max-width: 992px) {
        .chat-app .chat-list {
            height: 650px;
            overflow-x: auto
        }
        .chat-app .chat-history {
            height: 600px;
            overflow-x: auto
        }
    }

    @media only screen and (min-device-width: 768px) and (max-device-width: 1024px) and (orientation: landscape) and (-webkit-min-device-pixel-ratio: 1) {
        .chat-app .chat-list {
            height: 480px;
            overflow-x: auto
        }
        .chat-app .chat-history {
            height: calc(100vh - 350px);
            overflow-x: auto
        }
    }
</style>

<div class="container py-5">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0 auto-scroll" style="height: 600px; padding-right: 10px; padding-left: 10px;">
                        <?php /** @var array $users */
                        foreach($users as $data): ?>
                            <li class="clearfix">
                                <a href="<?= route_to('member.chats.edit', $data['id']); ?>">
                                    <img width="45px" height="45px" src="<?= $data['avatar'] ? base_url('/uploads/images/users/' . $data['avatar']) : 'https://trirama.com/wp-content/uploads/2016/10/orionthemes-placeholder-image.png'; ?>" alt="avatar">
                                    <div class="about">
                                        <div class="name text-dark"><?= ucwords($data['name']); ?></div>
                                        <div class="status"> <i class="fa fa-circle offline"></i> Level : <?= ucwords($data['role']); ?> </div>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="chat">
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <?php
                                /**
                                 * @var array $receiver
                                 */
                                ?>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img width="40px" height="40px" src="<?= $receiver['avatar'] ? base_url('/uploads/images/users/' . $receiver['avatar']) : 'https://trirama.com/wp-content/uploads/2016/10/orionthemes-placeholder-image.png'; ?>" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0"><?= ucwords($receiver['name']); ?></h6>
                                    <small>Level : <?= ucwords($receiver['role']); ?></small>
                                </div>
                            </div>
<!--                            <div class="col-lg-6 hidden-sm text-right">-->
<!--                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>-->
<!--                                <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>-->
<!--                                <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>-->
<!--                                <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>-->
<!--                            </div>-->
                        </div>
                    </div>
                    <div class="chat-history">
                        <ul class="m-b-0 auto-scroll" style="height: 500px; padding-right: 10px; padding-left: 10px;" id="chat-container">
                            <?php /** @var array $chats */
                            foreach($chats as $chat): ?>
                                <?php if($chat['sender_id'] == session()->get('user')->id): ?>
                                    <li class="clearfix">
                                        <div class="message-data text-right">
                                            <span class="message-data-time"><?= date('d F Y - H:i', strtotime($chat['created_at'])); ?></span>
                                        </div>
                                        <div class="message other-message float-right"><?= $chat['content']; ?></div>
                                    </li>
                                <?php else: ?>
                                    <li class="clearfix">
                                        <div class="message-data">
                                            <span class="message-data-time"><?= date('d F Y - H:i', strtotime($chat['created_at'])); ?></span>
                                        </div>
                                        <div class="message my-message"><?= $chat['content']; ?></div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <form class="chat-message clearfix" onsubmit="sendMessage(this); return false;" method="post" action="<?= route_to('member.chats.store', $receiver['id']); ?>">
                        <?= csrf_field(); ?>
                        <?php if ($errors = session()->getFlashdata('errors')): ?>
                            <div class="alert-danger alert text-left">
                                <ul>
                                    <?php foreach ($errors as $error): ?>
                                        <li><?= $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <div class="input-group mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-paper-plane"></i></span>
                            </div>
                            <input name="content" id="content" type="text" class="form-control" placeholder="Enter text here...">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('content-script') ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js" integrity="sha512-zMfrMAZYAlNClPKjN+JMuslK/B6sPM09BGvrWlW+cymmPmsUT1xJF3P4kxI3lOh9zypakSgWaTpY6vDJY/3Dig==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.auto-scroll').niceScroll();

    $('.auto-scroll').get(1).scrollTop = $('.auto-scroll').get(1).scrollHeight;
</script>
<script>
    function sendMessage(evt) {
        $.ajax({
            url: "<?= route_to('member.chats.store', $receiver['id']) ?>",
            method: "POST",
            data: {
                content: $('#content').val(),
            },
            success: function (response) {
                $('#content').val('');

                retrieveMessage();
            }
        })
    }

    function retrieveMessage() {
        $.ajax({
            url: "<?= route_to('member.api.v1.chats.show', $receiver['id']) ?>",
            success: function (response) {
                var html  = "";
                var chats = JSON.parse(response);

                for (var chat of chats) {
                    if (chat.sender_id === '<?= session()->get('user')->id; ?>') {
                        html += `<li class="clearfix">
                                        <div class="message-data text-right">
                                            <span class="message-data-time">${chat.created_at_formatted}</span>
                                        </div>
                                        <div class="message other-message float-right">${chat.content}</div>
                                    </li>`;
                    } else {
                        html += `<li class="clearfix">
                                        <div class="message-data">
                                            <span class="message-data-time">${chat.created_at_formatted}</span>
                                        </div>
                                        <div class="message my-message">${chat.content}</div>
                                    </li>`;
                    }
                }

                $('#chat-container').html(html);

                $('.auto-scroll').get(1).scrollTop = $('.auto-scroll').get(1).scrollHeight;
            }
        });
    }

    setInterval(function () {
        retrieveMessage();
    }, 1500);
</script>
<?= $this->endSection() ?>
