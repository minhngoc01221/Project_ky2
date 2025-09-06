import React from "react";
import { Link } from "react-router-dom";
import "../css/Navbar.css";

const Navbar = ({ adminUrl, role = "guest", onLogout }) => {
  const isLoggedIn = role !== "guest";

  return (
    <header className="navbar">
      <div className="logo">
        <Link to="/" className="logo-link">
          <span className="logo-highlight">DMN</span> Store
        </Link>
      </div>

      <nav>
        <ul>
          <li><Link to="/">Home</Link></li>
          <li><Link to="/products">Products</Link></li>
          <li><Link to="/about">About Us</Link></li>

          {/* Chỉ hiện khi đã đăng nhập */}
          {isLoggedIn && (
            <>
              <li><Link to="/cart">Cart</Link></li>
              <li><Link to="/reviews">Review</Link></li>
            </>
          )}

          {/* Auth buttons */}
          {!isLoggedIn ? (
            <>
              <li><Link to="/login" className="auth-link login">Login</Link></li>
              <li><Link to="/register" className="auth-link register">Register</Link></li>
            </>
          ) : (
            <li>
              <Link to="/" onClick={onLogout} className="btn-logout">
                Logout
              </Link>
            </li>
          )}

          {/* Nút Admin (tùy chọn, nếu có ENV) */}
          {adminUrl && (
            <li>
              <a href={adminUrl} className="admin-link" rel="noopener noreferrer">
                Admin
              </a>
            </li>
          )}
        </ul>
      </nav>
    </header>
  );
};

export default Navbar;