<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "package_item".
 *
 * @property int $package_item_id
 * @property int $package_id
 * @property int $item_id
 *
 * @property Item $item
 * @property Package $package
 */
class PackageItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'package_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['package_id', 'item_id'], 'required'],
            [['package_id', 'item_id'], 'integer'],
            [['package_id'], 'exist', 'skipOnError' => true, 'targetClass' => Package::className(), 'targetAttribute' => ['package_id' => 'package_id']],
            [['item_id'], 'exist', 'skipOnError' => true, 'targetClass' => Item::className(), 'targetAttribute' => ['item_id' => 'item_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'package_item_id' => 'Package Item ID',
            'package_id' => 'Package ID',
            'item_id' => 'Item ID',
        ];
    }

    /**
     * Gets query for [[Item]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getItem()
    {
        return $this->hasOne(Item::className(), ['item_id' => 'item_id']);
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
