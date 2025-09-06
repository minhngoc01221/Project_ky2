import React from "react";

const ProductsPage = () => {
  const products = [
    { id: 1, name: "Cement", price: "100.000 đ" },
    { id: 2, name: "Steel Rod", price: "200.000 đ" },
    { id: 3, name: "Bricks", price: "50.000 đ" },
    { id: 4, name: "Sand", price: "30.000 đ" },
  ];

  return (
    <div className="products-page">
      <h1>Our Products</h1>
      <div className="products-list">
        {products.map((product) => (
          <div key={product.id} className="product-card">
            <h3>{product.name}</h3>
            <p>Price: {product.price}</p>
          </div>
        ))}
      </div>
    </div>
  );
};

export default ProductsPage;