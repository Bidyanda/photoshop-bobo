<?php

namespace frontend\models;
use common\models\User;
use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $customer_id
 * @property string $name
 * @property string $address
 * @property string $phone_no
 * @property string $email
 * @property int $district
 * @property string $pincode
 * @property string $created_date
 * @property int $user_id
 *
 * @property Order[] $orders
 * @property User $user
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'phone_no', 'email', 'district', 'pincode', 'user_id'], 'required'],
            [['user_id'], 'integer'],
            [['created_date'], 'safe'],
            [['name', 'address', 'email'], 'string', 'max' => 255],
            [['phone_no'], 'string', 'max' => 10],
            [['pincode'], 'string', 'max' => 6],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'name' => 'Name',
            'address' => 'Address',
            'phone_no' => 'Phone No',
            'email' => 'Email',
            'district' => 'District',
            'pincode' => 'Pincode',
            'created_date' => 'Created Date',
            'user_id' => 'User ID',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
