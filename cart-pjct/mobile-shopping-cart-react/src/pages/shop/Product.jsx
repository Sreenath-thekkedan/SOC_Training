import React, { useContext } from 'react';
import { ShopContext } from '../../context/shopContext';
import { currency } from '../../utils/currencyConverter';

const Product = (props) => {
  const { id, productName, price, productImage } = props.data;

  const money = currency(price);

  const { addToCart, cartItems } = useContext(ShopContext);

  const cartItemCount = cartItems[id];
  return (
    <div className="product">
      <img src={productImage} alt={productName} />
      <div className="description">
        <p>
          <strong>{productName}</strong>
        </p>
        <h4>${money}</h4>
      </div>
      <button className="addToCartBtn" onClick={() => addToCart(id)}>
        Add To Cart
        <span className="itemSize">
          {cartItemCount > 0 && <>{cartItemCount}</>}
        </span>
      </button>
    </div>
  );
};

export default Product;
