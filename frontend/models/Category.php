<?php

namespace frontend\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $category_id
 * @property string $category_name
 * @property string $category_image
 *
 * @property Gallery[] $galleries
 * @property Package[] $packages
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_name', 'category_image'], 'required'],
            [['category_name', 'category_image'], 'string', 'max' => 255],
            [['category_image'], 'image', 'extensions' => 'jpg jpeg','minSize'=>50, 'maxSize' => 3145728, 'tooBig' => 'Alert! Maximum file size allowed is 500KB', 'maxWidth'=>600, 'maxHeight'=>600],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => 'Category ID',
            'category_name' => 'Category Name',
            'category_image' => 'Category Image',
        ];
    }

    /**
     * Gets query for [[Galleries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGalleries()
    {
        return $this->hasMany(Gallery::className(), ['category_id' => 'category_id']);
    }

    /**
     * Gets query for [[Packages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPackages()
    {
        return $this->hasMany(Package::className(), ['category_id' => 'category_id']);
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
