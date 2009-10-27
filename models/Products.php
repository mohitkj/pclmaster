<?php

namespace app\models;

class Products extends \yii\db\ActiveRecord
{    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['product_name'], 'unique'],
            [['product_name'], 'string', 'max' => 255],            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'product_id' => 'Product Id',
            'product_name' => 'Product Name',
            'product_category' => 'Product Category',
            'product_description' => 'Product Description',
            'how_to_use' => 'How To Use',
            'price' => 'Price',
            'fron_page_view' => 'Front Page View',
            'created_at' => 'Created At',
        ];
    }
}
