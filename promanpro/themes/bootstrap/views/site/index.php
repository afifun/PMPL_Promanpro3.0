<!-- Carousel
    ================================================== -->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="language" content="en" />
  
    

  <title><?php echo CHtml::encode($this->pageTitle); ?></title>

  <?php Yii::app()->bootstrap->register(); ?>
  <!-- blueprint CSS framework -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
  <!--[if lt IE 8]>
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
  <![endif]-->

  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" /> -->
  <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

<style type="text/css">
    body{
    background: url(../../promanpro/img/h.jpg);
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
}

.container{
  background-image: url(header-bg.jpg);
}

.col-md-10{
    margin-left: 220px;
}

#box{
    margin-top: 100px;
}


.rightbox{
    margin-top: 0;
    padding-top: 0;
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

    .form-buat-akun input[type="password"]{
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
        /*padding-bottom: 30px;*/
        margin-bottom: 10px;
        margin-top: 7px;
        margin-left: 150px;
        width: 99px;
        height: 38px;
        /*background-color: #1ABC9C;*/
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

/*@media all and (max-width: 750px){
  .box{
    margin-left: -123px;
      .searchbox{
        padding-bottom: 100px;
      }
  }
*/

@media all and (max-width: 700px){
      .box{
        margin-top: 0;
        margin-left: -35px;
      }

      .col-md-10{
        margin-left: 0;
      }

      .searchbox{
        padding-bottom: 30px;
      }
}

}     

</style>
</head>

<?php $form=$this->beginWidget('CActiveForm', array(
  'id'=>'user-form',
  'enableAjaxValidation'=>false,
  'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); 
  $actionId = $this->action->id;

?>
   <div class="container">
            <div class="wrapper">
                <div class="col-md-10">
                    <div id="box" >                        
                        <div class="rightbox">
                            <h1>Promanpro</h1>
                            <h2>Manage your project easily, collaboratively</h2>
                             <form action="" method="post">
                                <div class="form-buat-akun" role="form">
                                    <div class="form-group">
                                        <div class="col-sm-5">
                                        <?php echo $form->error($model,'Name'); ?>
                                        <?php echo $form->textField($model,'Name',array('size'=>20,'maxlength'=>20, 'placeholder' =>  'Your Name' )); ?>
                                        </div>
                                    </div>
                                      <div class="form-group">
                                        <div class="col-sm-5">
                                          <?php echo $form->error($model,'Username'); ?>
                                          <?php echo $form->textField($model,'Username',array('size'=>20,'maxlength'=>20,'placeholder'=>'Your username (Alphanumerics with no space)')); ?>
                                          
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-sm-5">
                                          <?php echo $form->error($model,'Password'); ?>
                                          <?php echo $form->passwordField($model, 'Password',array('size'=>20,'maxlength'=>20,'placeholder'=>'Your password (8-20 characters)')); ?>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-sm-5">
                                          <?php echo $form->error($model,'Repassword'); ?>
                                          <?php echo $form->passwordField($model,'Repassword',array('size'=>20,'maxlength'=>20,'placeholder'=>'Retype your password (8-20 characters)')); ?>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-sm-5">
                                          <?php echo $form->error($model,'Email'); ?>
                                          <?php echo $form->textField($model,'Email',array('size'=>40,'maxlength'=>40,'placeholder'=>'Your email')); ?>
                                        </div>
                                      </div>
                                      <?php echo CHtml::submitButton('Create', array('class'=>'btn btn-primary')); ?>
                                </div>
                            </form>                            
                            <p>Have an account? <a href="./index.php/site/login">Login here</a></p>                       
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            
        </div>
   

<?php $this->endWidget(); ?>