<?php

namespace frontend\models;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "package".
 *
 * @property int $package_id
 * @property string $description
 * @property int $category_id
 * @property string $package_name
 * @property string $image
 * @property int $no_of_camera_man
 *
 * @property Category $category
 * @property Order[] $orders
 * @property PackageItem[] $packageItems
 */
class Package extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'package';
    }

    /**
     * {@inheritdoc}
     */
    public $package_item;
    public function rules()
    {
        return [
            [['description', 'category_id', 'package_name','price','image', 'no_of_camera_man','package_item'], 'required'],
            [['category_id', 'no_of_camera_man'], 'integer'],
            ['price','number'],
            [['description', 'package_name', 'image'], 'string', 'max' => 255],
            [['image'], 'image', 'extensions' => 'jpg jpeg','minSize'=>50, 'maxSize' => 3145728, 'tooBig' => 'Alert! Maximum file size allowed is 3MB', 'maxWidth'=>1000, 'maxHeight'=>1000],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'package_id' => 'Package ID',
            'description' => 'Description',
            'category_id' => 'Category ID',
            'package_name' => 'Package Name',
            'package_item' => 'Package Item',
            'image' => 'Image',
            'no_of_camera_man' => 'No Of Camera Man',
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

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['package_id' => 'package_id']);
    }

    /**
     * Gets query for [[PackageItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPackageItems()
    {
        return $this->hasMany(PackageItem::className(), ['package_id' => 'package_id']);
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
