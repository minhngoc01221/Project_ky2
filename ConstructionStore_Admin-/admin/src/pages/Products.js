import React from 'react';
import '../styles/page.css';

export default function Products(){
  const rows = new Array(8).fill(0).map((_,i)=>({
    id: 'P'+(100+i),
    name: 'Product ' + (i+1),
    sku: 'SKU'+(1000+i),
    price: '$'+(20+i*5),
    stock: i%2===0 ? 'In stock' : 'Low stock',
    updated: '01/09/2025'
  }));
  return (
    <div className="page-wrapper">
      <h2 className="page-title">Products</h2>
      <div className="filter-bar">
        <input placeholder="Search products..." />
        <select><option>All categories</option></select>
        <select><option>All status</option></select>
        <button className="btn">Clear</button>
        <button className="btn primary">Bulk Action</button>
      </div>

      <div className="table card-table">
        <div className="table-row header">
          <div className="cell">#</div>
          <div className="cell">Product</div>
          <div className="cell">Price</div>
          <div className="cell">Stock</div>
          <div className="cell">Updated</div>
          <div className="cell">Actions</div>
        </div>
        {rows.map((r,idx)=>(
          <div className="table-row" key={r.id}>
            <div className="cell">{idx+1}</div>
            <div className="cell">{r.name}</div>
            <div className="cell">{r.price}</div>
            <div className="cell">{r.stock}</div>
            <div className="cell">{r.updated}</div>
            <div className="cell">
              <button className="btn small">View</button>
              <button className="btn small warning">Edit</button>
            </div>
          </div>
        ))}
      </div>
    </div>
  );
}
