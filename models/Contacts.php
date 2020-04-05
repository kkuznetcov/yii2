<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "contacts".
 *
 * @property int $id
 * @property string|null $surname
 * @property string|null $name
 * @property string|null $secondname
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $email
 * @property int|null $user_id
 */
class Contacts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contacts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['surname', 'name', 'secondname', 'phone', 'email'], 'string', 'max' => 50],
            [['address'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'surname' => 'Фамилия',
            'name' => 'Имя',
            'secondname' => 'Отчество',
            'phone' => 'Телефон',
            'address' => 'Адрес',
            'email' => 'E-mail',
        ];
    }
}
