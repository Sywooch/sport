<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "geo_country".
 *
 * @property integer $id
 * @property string $continent
 * @property string $name_ru
 * @property string $lat
 * @property string $lon
 * @property string $timezone
 * @property string $iso2
 * @property string $short_name
 * @property string $long_name
 * @property string $iso3
 * @property string $numcode
 * @property string $un_member
 * @property string $calling_code
 * @property string $cctld
 * @property integer $phone_number_digits_code
 * @property string $currency
 * @property integer $system_measure
 *
 * @property User[] $users
 */
class GeoCountry extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'geo_country';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_ru', 'lat', 'lon', 'timezone', 'short_name', 'long_name'], 'required'],
            [['lat', 'lon'], 'number'],
            [['phone_number_digits_code', 'system_measure'], 'integer'],
            [['continent', 'iso2'], 'string', 'max' => 2],
            [['name_ru'], 'string', 'max' => 128],
            [['timezone'], 'string', 'max' => 30],
            [['short_name', 'long_name'], 'string', 'max' => 80],
            [['iso3', 'currency'], 'string', 'max' => 3],
            [['numcode'], 'string', 'max' => 6],
            [['un_member'], 'string', 'max' => 12],
            [['calling_code'], 'string', 'max' => 8],
            [['cctld'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'continent' => Yii::t('app', 'Continent'),
            'name_ru' => Yii::t('app', 'Name Ru'),
            'lat' => Yii::t('app', 'Lat'),
            'lon' => Yii::t('app', 'Lon'),
            'timezone' => Yii::t('app', 'Timezone'),
            'iso2' => Yii::t('app', 'Iso2'),
            'short_name' => Yii::t('app', 'Short Name'),
            'long_name' => Yii::t('app', 'Long Name'),
            'iso3' => Yii::t('app', 'Iso3'),
            'numcode' => Yii::t('app', 'Numcode'),
            'un_member' => Yii::t('app', 'Un Member'),
            'calling_code' => Yii::t('app', 'Calling Code'),
            'cctld' => Yii::t('app', 'Cctld'),
            'phone_number_digits_code' => Yii::t('app', 'Phone Number Digits Code'),
            'currency' => Yii::t('app', 'Currency'),
            'system_measure' => Yii::t('app', 'System Measure'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['country_id' => 'id']);
    }
}
