<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipociclo".
 *
 * @property int $ID
 * @property string $nombre
 * @property int $mes
 *
 * @property Cicloescolar[] $cicloescolars
 */
class Tipociclo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tipociclo';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'mes'], 'required'],
            [['mes'], 'integer'],
            [['nombre'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'nombre' => 'Nombre',
            'mes' => 'Mes',
        ];
    }

    /**
     * Gets query for [[Cicloescolars]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CicloescolarQuery
     */
    public function getCicloescolars()
    {
        return $this->hasMany(Cicloescolar::class, ['fktipociclo' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\TipocicloQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\TipocicloQuery(get_called_class());
    }
}
