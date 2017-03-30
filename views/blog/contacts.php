<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$placeholderName = Html::encode($form_labels['username_label']);
$placeholderMail = Html::encode($form_labels['email_label']);
$placeholderMess = Html::encode($form_labels['message_placeholder']);
$contacts_title  = Html::encode($form_labels['contacts']);

$this->registerCssFile('@web/css/blog-contacts.css','','blog-contacts');
?>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="well well-sm">
                <!--form class="form-horizontal" method="post" id="contacts"-->
                <?php $form = ActiveForm::begin([
                    'id' => 'contacts',
                    'method'=>'post',
                    //'options' => ['class' => 'form-horizontal']
                ]); ?>
                    <fieldset>
                        <legend class="text-center header"><?= $contacts_title; ?></legend>
                       
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <!--input id="lname" name="name" type="text" placeholder="Name" class="form-control"-->
                                <?= $form->field($model, 'name')->textInput(['autofocus' => false,'class' =>'form-control','placeholder'=>$placeholderName]) ?>
                               
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <!--input id="email" name="email" type="text" placeholder="Email Address" class="form-control"-->
                                <?= $form->field($model, 'email')->input('email', ['placeholder' => $placeholderMail]) ?>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <!--textarea class="form-control" id="message" name="message" placeholder="Enter your mеssage for us here. We will get back to you within 2 business days." rows="7"></textarea-->
                                <?= $form->field($model, 'mess')->textarea(['rows' => 7, 'placeholder' => $placeholderMess ]) ?>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <!--button type="submit" class="btn btn-primary btn-lg">Submit</button-->
                                 <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-lg', 'name' => 'contact-button']) ?>
                            </div>
                        </div>                        
                    </fieldset>
                <!--/form-->
                 <?php ActiveForm::end(); ?>                
            </div>
            <div class="text-success"> <?= $success; ?></div>
        </div>
        
        <!-- Address -->
        <!--        
           $our_office = $contact['our_office'];
           $address = $contact['address'];
           $tel = $contact['tel'];
           $self_mail = $contact['self_mail'];
           $question_info = $contact['question_info'];
           $cont_lang_id = $contact['lang_id'];       
        -->
        
        
        <div class="col-md-6">
            <div>
                <div class="panel panel-default">
                    <div class="text-center header"><?= Html::encode($our_office); ?></div>
                    <div class="panel-body text-center">
                        <h4><?= Html::encode($address); ?></h4>
                        <div>
                        <?= Html::encode($street); ?><br />
                        <?= Html::encode($tel); ?><br />
                        <?= $self_mail; ?><br />
                        <?= $question_info; ?><br/>
                        </div>
                        <hr #="hor"/>
                        <div class="map">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1760.8119812014422!2d44.50556586455881!3d40.184715401632594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3ddb3c7640fddd71!2sHayPost+0056!5e0!3m2!1sru!2sru!4v1490337231727" width="100%" height="auto" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!--script type="text/javascript">
    jQuery(function ($) {
        function init_map1() {
            var myLocation = new google.maps.LatLng(38.885516, -77.09327200000001);
            var mapOptions = {
                center: myLocation,
                zoom: 16
            };
            var marker = new google.maps.Marker({
                position: myLocation,
                title: "Property Location"
            });
            var map = new google.maps.Map(document.getElementById("map1"),
                mapOptions);
            marker.setMap(map);
        }
        init_map1();
    });

</script-->


<?php

/*
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                <?php $form = ActiveForm::begin(['id' => 'contacts']); ?>
                    <fieldset>
                        <legend class="text-center header">Contact us</legend>
                       
                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="lname" name="name" type="text" placeholder="Name" class="form-control">
                                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                                <?= $form->field($model, 'email') ?>
                            </div>
                        </div>                        

                        <div class="form-group">
                            <div class="col-md-10 col-md-offset-1">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your mеssage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                                <?= $form->field($model, 'mess')->textarea(['rows' => 7]) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                                 <?= Html::submitButton('Submit', ['class' => 'btn btn-primary btn-lg', 'name' => 'contact-button']) ?>
                            </div>
                        </div>
                    </fieldset>
                </form>
                 <?php ActiveForm::end(); ?>
            </div>
        </div>
 * 
 */

?>



