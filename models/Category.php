<?php

namespace app\models;

class Category extends \yii\db\ActiveRecord
{    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'product_category';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['category_name'], 'unique'],
            [['category_name'], 'string', 'max' => 255],            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'category_id' => 'Category Id',
            'category_name' => 'Category Name',
            'created_at' => 'Created At',
        ];
    }
}
