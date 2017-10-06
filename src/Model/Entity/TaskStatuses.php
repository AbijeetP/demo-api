<?php

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * TaskStatuses Entity
 *
 * @property int $id
 * @property string $notification_type
 * @property string $country_code
 * @property string $mobile_number
 * @property string $end_point
 * @property string $topic_arn
 * @property string $message
 * @property string $status
 * @property string $status_text
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 * @property string $notification_event
 * @property int $reference_id
 *
 * @property \App\Model\Entity\Reference $reference
 */
class TaskStatuses extends Entity {

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

}
