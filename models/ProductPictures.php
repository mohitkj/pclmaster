<?php

namespace app\models;

class ProductPictures extends \yii\db\ActiveRecord
{    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'product_pictures';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'picture_id' => 'Picture Id',
            'product_id' => 'Product Id',
            'picture_location' => 'Picuture Location',            
            'created_at' => 'Created At',
        ];
    }
}
