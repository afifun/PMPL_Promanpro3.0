<!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/h.jpg">
          <div class="container">
            <div class="carousel-caption">
              <h1>Welcome to Promanpro</h1>
              <p class="lead">Manage your project easily, collaboratively</p>
              <?php $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Sign Up',
                'url'=>array('/site/register'),
                'type'=>'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'size'=>'large', // null, 'large', 'small' or 'mini'
            )); ?>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/i.png">
          <div class="container">
            <div class="carousel-caption">
              <h1>Features</h1>
              <p class="lead">You can create your own projects and invite people to join your project. You can also manage your tasks and schedules with other participants</p>
              <!--<a class="btn btn-large btn-primary" href="#">Learn more</a> -->
              <?php $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'Learn More',
                'url'=>array('/site/register'),
                'type'=>'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'size'=>'large', // null, 'large', 'small' or 'mini'
            )); ?>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/j.png">
          <div class="container">
            <div class="carousel-caption">
              <h1>Need Help?</h1>
              <p class="lead">How do I register? How do I make a project, etc.? Don't worry, we got all the answers here</p>
              <!-- <a class="btn btn-large btn-primary" href="#">View FAQ</a> -->
              <?php $this->widget('bootstrap.widgets.TbButton', array(
                'label'=>'View FAQ',
                'url'=>array('/site/register'),
                'type'=>'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                'size'=>'large', // null, 'large', 'small' or 'mini'
            )); ?>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
    </div><!-- /.carousel -->    

<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<!-- 
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit',array(
    'heading'=>'Welcome to '.CHtml::encode(Yii::app()->name),
)); ?>

<p>Congratulations! You have successfully created your Yii application.</p>

<?php $this->endWidget(); ?>
-->

<br></br>
<!--
<?php $this->beginWidget('bootstrap.widgets.TbHeroUnit', array(
    'heading' => 'Welcome to '.CHtml::encode(Yii::app()->name),
    
)); ?>
<p>Manage Your Project
Easily, Collaboratively</p> 
<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Sign Up',
    'url'=>array('/site/register'),
    'type'=>'warning', // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>'large', // null, 'large', 'small' or 'mini'
)); ?>
<?php $this->endWidget(); ?> -->

<!--
<p>You may change the content of this page by modifying the following two files:</p>

<ul>
    <li>View file: <code><?php echo __FILE__; ?></code></li>
    <li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
    the <a href="http://www.yiiframework.com/doc/">documentation</a>.
    Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
    should you have any questions.</p>
-->
