<?php

namespace app\models;

class ProductRating extends \yii\db\ActiveRecord
{    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'product_rating';
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
            'id' => 'Id',
            'product_id' => 'Product Id',
            'rating' => 'Rating',            
            'rating_by' => 'Rating By',
            'rating_on' => 'Rating On',
        ];
    }
}
