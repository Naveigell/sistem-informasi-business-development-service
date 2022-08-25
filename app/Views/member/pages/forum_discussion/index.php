<?= $this->extend('layouts/member/member') ?>

<?= $this->section('page-title') ?>
Forum Diskusi
<?= $this->endSection() ?>

<?= $this->section('content-style') ?>
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
<?= $this->endSection() ?>

<?= $this->section('content-banner') ?>

<div class="container-fluid page-header d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5 mb-5">
    <h1 class="display-4 text-white mb-3 mt-0 mt-lg-5">Forum Diskusi</h1>
    <div class="d-inline-flex text-white">
        <p class="m-0"><a class="text-white" href="">Beranda</a></p>
        <p class="m-0 px-2">/</p>
        <p class="m-0">Forum Diskusi</p>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('content-body') ?>
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
                        <?php /** @var array $forums */
                        foreach($forums as $forum): ?>
                            <li class="clearfix">
                                <a href="<?= route_to('member.forums.edit', $forum['id']); ?>">
                                    <img width="45px" height="45px" src="<?= $forum['thumbnail'] ? base_url('/uploads/images/forums/' . $forum['thumbnail']) : 'https://trirama.com/wp-content/uploads/2016/10/orionthemes-placeholder-image.png'; ?>" alt="avatar">
                                    <div class="about">
                                        <div class="name text-dark"><?= ucwords($forum['forum_name']); ?></div>
                                        <div class="status"> <i class="fa fa-circle offline"></i> Aktif </div>
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
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <!--                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">-->
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0">&nbsp;</h6>
                                    <small>&nbsp;</small>
                                </div>
                            </div>
                            <!--                                <div class="col-lg-6 hidden-sm text-right">-->
                            <!--                                    <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>-->
                            <!--                                    <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>-->
                            <!--                                    <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>-->
                            <!--                                    <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>-->
                            <!--                                </div>-->
                        </div>
                    </div>
                    <div class="chat-history">
                        <ul class="m-b-0 auto-scroll" style="height: 500px; padding-right: 10px; padding-left: 10px;">
                            <!--                                <li class="clearfix">-->
                            <!--                                    <div class="message-data text-right">-->
                            <!--                                        <span class="message-data-time">10:10 AM, Today</span>-->
                            <!--                                        <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="avatar">-->
                            <!--                                    </div>-->
                            <!--                                    <div class="message other-message float-right"> Hi Aiden, how are you? How is the project coming along? </div>-->
                            <!--                                </li>-->
                            <!--                                <li class="clearfix">-->
                            <!--                                    <div class="message-data">-->
                            <!--                                        <span class="message-data-time">10:12 AM, Today</span>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="message my-message">Are we meeting today?</div>-->
                            <!--                                </li>-->
                            <!--                                <li class="clearfix">-->
                            <!--                                    <div class="message-data">-->
                            <!--                                        <span class="message-data-time">10:15 AM, Today</span>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="message my-message">Project has been already finished and I have results to show you.</div>-->
                            <!--                                </li>-->
                            <!--                                <li class="clearfix">-->
                            <!--                                    <div class="message-data">-->
                            <!--                                        <span class="message-data-time">10:15 AM, Today</span>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="message my-message">Project has been already finished and I have results to show you.</div>-->
                            <!--                                </li>-->
                            <!--                                <li class="clearfix">-->
                            <!--                                    <div class="message-data">-->
                            <!--                                        <span class="message-data-time">10:15 AM, Today</span>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="message my-message">Project has been already finished and I have results to show you.</div>-->
                            <!--                                </li>-->
                            <!--                                <li class="clearfix">-->
                            <!--                                    <div class="message-data">-->
                            <!--                                        <span class="message-data-time">10:15 AM, Today</span>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="message my-message">Project has been already finished and I have results to show you.</div>-->
                            <!--                                </li>-->
                            <!--                                <li class="clearfix">-->
                            <!--                                    <div class="message-data">-->
                            <!--                                        <span class="message-data-time">10:15 AM, Today</span>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="message my-message">Project has been already finished and I have results to show you.</div>-->
                            <!--                                </li>-->
                            <!--                                <li class="clearfix">-->
                            <!--                                    <div class="message-data">-->
                            <!--                                        <span class="message-data-time">10:15 AM, Today</span>-->
                            <!--                                    </div>-->
                            <!--                                    <div class="message my-message">Project has been already finished and I have results to show you.</div>-->
                            <!--                                </li>-->
                        </ul>
                    </div>
                    <div class="chat-message clearfix">
                        <!--                            <div class="input-group mb-0">-->
                        <!--                                <div class="input-group-prepend">-->
                        <!--                                    <span class="input-group-text"><i class="fa fa-send"></i></span>-->
                        <!--                                </div>-->
                        <!--                                <input type="text" class="form-control" placeholder="Enter text here...">-->
                        <!--                            </div>-->
                    </div>
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
</script>
<?= $this->endSection() ?>
