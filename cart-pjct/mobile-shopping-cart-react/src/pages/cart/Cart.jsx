import React, { useContext } from 'react';
import { useNavigate } from 'react-router-dom';
import { PRODUCTS } from '../../products';
import { ShopContext } from '../../context/shopContext';
import CartItem from './CartItem';
import { currency } from '../../utils/currencyConverter';

import './Cart.css';

const Cart = () => {
  const { cartItems, getTotalCartAmount, checkout } = useContext(ShopContext);
  const totalAmount = getTotalCartAmount();

  const money = currency(totalAmount);

  const navigate = useNavigate();

  return (
    <div className="cart">
      <div>
        <h1>Your Cart Items</h1>
      </div>
      <div className="cart">
        {PRODUCTS.map((product, index) => {
          if (cartItems[product.id] !== 0) {
            return <CartItem data={product} key={index} />;
          }
        })}
      </div>

      {totalAmount > 0 ? (
        <div className="checkout">
          <h4>Total Amount: ${money}</h4>
          <button onClick={() => navigate('/')}>Continue To Shop</button>
          <button
            onClick={() => {
              checkout();
              navigate('/checkout');
            }}
          >
            Place Order
          </button>
        </div>
      ) : (
        <h1>Your cart is empty</h1>
      )}
    </div>
  );
};

export default Cart;
