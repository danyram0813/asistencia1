<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departamento".
 *
 * @property int $ID
 * @property string $nombre
 * @property string $encargado
 *
 * @property Carrera[] $carreras
 */
class Departamento extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'departamento';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'encargado'], 'required'],
            [['nombre', 'encargado'], 'string', 'max' => 50],
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
            'encargado' => 'Encargado',
        ];
    }

    /**
     * Gets query for [[Carreras]].
     *
     * @return \yii\db\ActiveQuery|\app\models\query\CarreraQuery
     */
    public function getCarreras()
    {
        return $this->hasMany(Carrera::class, ['fkdepartamento' => 'ID']);
    }

    /**
     * {@inheritdoc}
     * @return \app\models\query\DepartamentoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\query\DepartamentoQuery(get_called_class());
    }
}
