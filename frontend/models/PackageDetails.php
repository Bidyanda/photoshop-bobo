<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "package_details".
 *
 * @property string|null $package_description
 * @property int|null $category_id
 * @property string|null $package_name
 * @property string|null $image
 * @property int|null $no_of_camera_man
 * @property int $package_item_id
 * @property int $package_id
 * @property int $item_id
 * @property string|null $item_name
 * @property string|null $item_brand
 * @property string|null $lens_type
 * @property string|null $item_image
 * @property string|null $model_no
 * @property string|null $description
 */
class PackageDetails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'package_details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'no_of_camera_man', 'package_item_id', 'package_id', 'item_id'], 'integer'],
            [['package_id', 'item_id'], 'required'],
            [['package_description', 'package_name', 'image', 'item_name', 'lens_type', 'item_image', 'description'], 'string', 'max' => 255],
            [['item_brand', 'model_no'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'package_description' => 'Package Description',
            'category_id' => 'Category ID',
            'package_name' => 'Package Name',
            'image' => 'Image',
            'no_of_camera_man' => 'No Of Camera Man',
            'package_item_id' => 'Package Item ID',
            'package_id' => 'Package ID',
            'item_id' => 'Item ID',
            'item_name' => 'Item Name',
            'item_brand' => 'Item Brand',
            'lens_type' => 'Lens Type',
            'item_image' => 'Item Image',
            'model_no' => 'Model No',
            'description' => 'Description',
        ];
    }
}
