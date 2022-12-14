<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Product;
use backend\models\Order;
use backend\models\OrderItems;
use frontend\models\Cart;

class CartController extends Controller 
{
	public function actionAdd()
	{
		$id = Yii::$app->request->get('id');
		$qty = (int)Yii::$app->request->get('qty');
		$qty = !$qty ? 1 : $qty;
		$product = Product::findOne($id);
		if (empty($product)) return false; 
		$session = Yii::$app->session;
		$session->open();
		$cart = new Cart();
		$cart->addToCart($product, $qty);
		if (!Yii::$app->request->isAjax) {
			return $this->redirect(Yii::$app->request->referrer);
		}
		$this->layout = false;
		return $this->render('cart-modal', compact('session'));
	}

	public function actionClear() 
	{
		$session = Yii::$app->session;
		$session->open();
		$session->remove('cart');
		$session->remove('cart.qty');
		$session->remove('cart.sum');
		$this->layout = false;
		return $this->render('cart-modal', compact('session'));
	}

	public function actionDelItem()
	{
		$id = Yii::$app->request->get('id');
		$session = Yii::$app->session;
		$session->open();
		$cart = new Cart();
		$cart->recalc($id);
		$this->layout = false;
		return $this->render('cart-modal', compact('session'));
	}

	public function actionShow()
	{
		$session = Yii::$app->session;
		$session->open();
		$this->layout = false;
		return $this->render('cart-modal', compact('session'));
	}

	public function actionView()
	{
		$session = Yii::$app->session;
		$session->open();
		// $this->setMeta('Savat');
		$order = new Order();
		if ($order->load(Yii::$app->request->post())) {
			$order->qty = $session['cart.qty'];
			$order->sum = $session['cart.sum'];
			if ($order->save()) {
				$this->saveOrderItems($session['cart'], $order->id);
				Yii::$app->session->setFlash('success', 'Buyurtma uchun rahmat! Tez orada menedjer siz bilan bog`lanadi. Buyurtma raqamingiz - '.$order->id);
				$session->remove('cart');
				$session->remove('cart.qty');
				$session->remove('cart.sum');
				return $this->refresh();
			} else {
				Yii::$app->session->setFlash('error', 'Buyurtma berishda xatolik!');
			}
		}
		return $this->render('view', compact('session', 'order'));
	}

	protected function saveOrderItems($items, $order_id) 
	{
		foreach ($items as $id => $item) {
			$order_items = new OrderItems();
			$order_items->order_id = $order_id;
			$order_items->product_id = $id;
			$order_items->name = $item['name'];
			$order_items->user_id = $item['user_id'];
			$order_items->date = date('Y-m-d H:i:s');
			$order_items->price = $item['price'];
			$order_items->qty_item = $item['qty'];
			$order_items->sum_item = $item['qty'] * $item['price'];
			$order_items->save();
		}
	}
}