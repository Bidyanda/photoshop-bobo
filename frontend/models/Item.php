<?php

namespace frontend\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "item".
 *
 * @property int $item_id
 * @property string $item_name
 * @property string $item_brand
 * @property string $lens_type
 * @property string $item_image
 * @property string $model_no
 * @property string $description
 *
 * @property PackageItem[] $packageItems
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['item_name', 'item_brand', 'lens_type', 'item_image', 'model_no', 'description'], 'required'],
            [['item_name', 'lens_type', 'item_image', 'description'], 'string', 'max' => 255],
            [['item_brand', 'model_no'], 'string', 'max' => 100],
            [['item_image'], 'image', 'extensions' => 'jpg jpeg','minSize'=>50, 'maxSize' => 3145728, 'tooBig' => 'Alert! Maximum file size allowed is 500KB', 'maxWidth'=>600, 'maxHeight'=>600],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'item_id' => 'Item ID',
            'item_name' => 'Item Name',
            'item_brand' => 'Item Brand',
            'lens_type' => 'Lens Type',
            'item_image' => 'Item Image',
            'model_no' => 'Model No',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[PackageItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPackageItems()
    {
        return $this->hasMany(PackageItem::className(), ['item_id' => 'item_id']);
    }

    public function upload($attr) {
        if($this->$attr = UploadedFile::getInstance($this, $attr)) {
            $filename = 'uploads/'.Yii::$app->security->generateRandomString(8)."_".strtotime(date('Y-m-d')).'.'.$this->$attr->extension;
            $this->$attr->saveAs($filename);
            $this->$attr = $filename;
            return true;
        }
        return false;
    }
}
