<?php

namespace app\models;

class Testimonials extends \yii\db\ActiveRecord
{    
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'product_testimonials';
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
            'testimonial_id' => 'Testimonial Id',
            'testimonial_content' => 'Testimonial Content',
            'testimonial_by' => 'Testimonial By',
            'product_id' => 'Product Id',
            'front_page_view' => 'Front Page View',
            'approved' => 'Approved',
            'testimonial_date' => 'Testimonial Date',            
        ];
    }
}
