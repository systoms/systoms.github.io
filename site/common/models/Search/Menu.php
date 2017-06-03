<?php

namespace common\models\Search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Menu as MenuModel;

/**
 * Menu represents the model behind the search form about `common\models\Menu`.
 */
class Menu extends MenuModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['m_id', 'pid', 'level', 'sort', 'is_menu', 's_id', 'p_u_id'], 'integer'],
            [['icon', 'title', 'modules', 'controllers', 'action', 'insert_date', 'update_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = MenuModel::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'm_id' => $this->m_id,
            'pid' => $this->pid,
            'level' => $this->level,
            'sort' => $this->sort,
            'is_menu' => $this->is_menu,
            's_id' => $this->s_id,
            'p_u_id' => $this->p_u_id,
            'insert_date' => $this->insert_date,
            'update_date' => $this->update_date,
        ]);

        $query->andFilterWhere(['like', 'icon', $this->icon])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'modules', $this->modules])
            ->andFilterWhere(['like', 'controllers', $this->controllers])
            ->andFilterWhere(['like', 'action', $this->action]);

        return $dataProvider;
    }
}
