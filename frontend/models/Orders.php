<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $order_id
 * @property int $customer_id
 * @property string $order_date
 * @property float $price
 * @property int $package_id
 * @property int $created_date
 * @property bool $order_status
 *
 * @property Customer $customer
 * @property Package $package
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'order_date', 'price', 'package_id'], 'required'],
            [['customer_id', 'package_id', 'created_date'], 'integer'],
            // [['order_date'], 'safe'],
            [['price'], 'number'],
            [['order_status'], 'integer'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'customer_id']],
            [['package_id'], 'exist', 'skipOnError' => true, 'targetClass' => Package::className(), 'targetAttribute' => ['package_id' => 'package_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'order_id' => 'Order ID',
            'customer_id' => 'Customer ID',
            'order_date' => 'Order Date',
            'price' => 'Price',
            'package_id' => 'Package ID',
            'created_date' => 'Created Date',
            'order_status' => 'Order Status',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * Gets query for [[Package]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(Package::className(), ['package_id' => 'package_id']);
    }
}
