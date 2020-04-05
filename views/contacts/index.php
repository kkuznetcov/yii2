<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Телефонный справочник';
$this->params['breadcrumbs'][] = $this->title;

if (Yii::$app->user->isGuest) {?>
    <p><?= Html::a('Для просмотра контактов необходимо авторизоваться!', ['site/login'], ['class' => 'btn btn-link']) ?></p>
<?php }else{?>
    <div class="contacts-index">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a('Добавить контакт', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?php Pjax::begin(['id' => 'pjax-id']) ?>
        <?= GridView::widget([
            'id' => 'grid-id',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'surname',
                'name',
                'secondname',
                'phone',
                'address',
                'email:email',
                ['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
<?php }?>