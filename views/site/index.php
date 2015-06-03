<?php
/* @var $this yii\web\View */
$this->title = 'Jose\'s Yii App';
$this->registerJs("new WOW().init();", 'POS_READY', 'wow_animation');
?>
<div class="site-index">

    <div class="jumbotron span3 wow bounceInUp center animated" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInUp;">
        <h1>Hello World!</h1>

        <p class="lead">Just a Simple Application </p>

        <p class="wow pulse animated" data-wow-duration="2s" data-wow-iteration="infinite" data-wow-delay="300ms" style="visibility: visible; animation-duration: 2s; animation-delay: 300ms; animation-iteration-count: infinite; animation-name: pulse;" ><a class="btn btn-lg btn-success" href="/index.php/user/login">Let's Get Started!</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 span3 wow rollIn animated" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: rollIn;">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4 span3 wow bounceInDown center animated" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: bounceInDown;">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4 span3 wow lightSpeedIn animated" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: lightSpeedIn;">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p class="wow bounceInUp" data-wow-delay="5s"><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>