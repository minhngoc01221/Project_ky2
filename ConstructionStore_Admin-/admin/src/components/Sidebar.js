import React from 'react';
import { NavLink } from 'react-router-dom';
import '../styles/sidebar.css';

export default function Sidebar(){
  return (
    <aside className="sidebar">
      <div className="brand">
        <div className="logo-circle">A</div>
        <div>
          <h3>Admin Panel</h3>
          <p>Company Ltd.</p>
        </div>
      </div>
      <nav className="menu">
        <NavLink to="/reports" className={({isActive})=> isActive? 'active': ''}>📊 Reports</NavLink>
        <NavLink to="/dashboard" className={({isActive})=> isActive? 'active': ''}>📋 Dashboard</NavLink>
        <NavLink to="/products" className={({isActive})=> isActive? 'active': ''}>📦 Products</NavLink>
        <NavLink to="/orders" className={({isActive})=> isActive? 'active': ''}>🧾 Orders</NavLink>
        <NavLink to="/admin" className={({isActive})=> isActive? 'active': ''}>👤 Admin</NavLink>
        <NavLink to="/settings" className={({isActive})=> isActive? 'active': ''}>⚙️ Settings</NavLink>
      </nav>
      <div className="sidebar-footer">
        <button className="logout">Đăng xuất</button>
      </div>
    </aside>
  );
}
