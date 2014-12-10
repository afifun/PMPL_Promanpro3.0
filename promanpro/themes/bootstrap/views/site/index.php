<!-- Carousel
    ================================================== -->
   <style type="text/css">
    body{
    background: url(../../img/h.jpg);
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.col-md-10{
    margin-left: 220px;
}

#box{
    margin-top: 100px;
}


.rightbox{
    padding-top: 30px;
    padding-left: 40px;
    float: left;
    width: 450px;   
    background-color: rgba(255, 255, 255, 0.8);

}

    .rightbox h3{
        text-align: center;

    }

    .login{
        margin-top: 40px;
    }

        .login li{
            margin-left: 75px;
            float: left;
        }

    .rightbox h4{
        margin-top: 30px;
    }

    .form-buat-akun input[type="text"]{
        margin-bottom: 5px;
        width: 90%;
        height: 33px;
        padding: 2px 5px;
        background: #959595;
        border: none;
        display: inline-block;
    }

    .button{
        
    }

    #box input[type="submit"]{   
        padding-bottom: 30px;
        margin-bottom: 10px;
        margin-top: 7px;
        margin-left: 120px;
        width: 99px;
        height: 38px;
        background-color: #1ABC9C;
        display: block;   
        border-radius: 5px;
        color: #fff
    }

    .button a:hover{
        text-decoration: none;
    }

    

.clearfix{
    clear: both;
}

@media all and (max-width: 480px){
      .box{
        margin-top: 0px;
      }

      .col-md-10{
        margin-left: 0px;
      }

      .searchbox{
        padding-bottom: 30px;
      }
    }      

</style>




   <div class="container">
            <div class="wrapper">
                <div class="col-md-10">
                    <div id="box" >                        
                        <div class="rightbox">
                            <h1>Promanpro</h1>
                            <h2>Manage your project easily, collaboratively</h2>
                            <form action="" method="post">
                                <div class="form-buat-akun">
                                    <p><input type = "text" name="nama" id ="nama" value= "" placeholder="Your name"
                                    /></p>
                                    <p><input type = "text" name="email" id ="email" value= "" placeholder="Your username (Alphanumerics with no space)"
                                     /></p>
                                    <p><input type = "text" name="hp" id ="hp" value= "" placeholder="Your password (6-20 characters)"
                                     /></p>
                                     <p><input type = "text" name="email" id ="email" value= "" placeholder="Retype your password (6-20 characters)"
                                     /></p>
                                    <p><input type = "text" name="hp" id ="hp" value= "" placeholder="Your email"
                                     /></p>
                                </div>
                            </form> 
                            <div class="button">
                                <input type="submit" name="submit" value="Submit">
                            </div>  
                            <p>Have an account? <a href="">Login here</a></p>                       
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            
        </div>
   
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
