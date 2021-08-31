<?php

namespace frontend\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "gallery".
 *
 * @property int $gallery_id
 * @property string $image
 * @property int $category_id
 * @property string $description
 *
 * @property Category $category
 */
class Gallery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image', 'category_id', 'description','title'], 'required'],
            [['category_id'], 'integer'],
            [['image', 'description','title'], 'string', 'max' => 255],
            [['image'], 'image', 'extensions' => 'jpg jpeg','minSize'=>50, 'maxSize' => 10485760, 'tooBig' => 'Alert! Maximum file size allowed is 10MB'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'gallery_id' => 'Gallery ID',
            'image' => 'Image',
            'category_id' => 'Category ID',
            'description' => 'Description',
            'title'=> 'Title'
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
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
