<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\OrderItems;
use Yii;
/**
 * OrderItemsSearch represents the model behind the search form of `backend\models\OrderItems`.
 */
class OrderItemsSearch extends OrderItems
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'order_id', 'product_id'], 'integer'],
            [['name'], 'safe'],
            [['price', 'sum_item'], 'number'],
            [['qty_item'], 'double'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        if(Yii::$app->user->identity->id == 1){
            $query = OrderItems::find();
        }
        else {
            $query = OrderItems::find()->where(['user_id' => Yii::$app->user->identity->id]);
        }
        

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['order_id' => SORT_DESC]]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'price' => $this->price,
            'qty_item' => $this->qty_item,
            'sum_item' => $this->sum_item,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
