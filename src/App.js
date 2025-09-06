// src/App.js
import React, { useState, useEffect } from "react";
import "./App.css";
import { BrowserRouter as Router, Routes, Route, Navigate } from "react-router-dom";
import "bootstrap/dist/css/bootstrap.min.css";

// Pages
import HomePage from "./pages/HomePage";
import ProductsPage from "./pages/ProductsPage";
import LoginPage from "./pages/LoginPage";
import RegisterPage from "./pages/RegisterPage";
import AboutUs from "./pages/AboutUsPage";


// Layout
import Navbar from "./components/Navbar";
import Footer from "./components/Footer";

const ADMIN_URL = process.env.REACT_APP_ADMIN_URL || "http://localhost:3001";

function App() {
  // 'guest' | 'customer'
  const [role, setRole] = useState(() => localStorage.getItem("role") || "guest");

  useEffect(() => {
    localStorage.setItem("role", role);
  }, [role]);

  const handleLogout = () => {
    setRole("guest");
    localStorage.removeItem("role");
  };

  return (
    <Router>
      <div className="app-shell">
        <Navbar adminUrl={ADMIN_URL} role={role} onLogout={handleLogout} />

        <main className="app-main">
          <Routes>
            <Route path="/" element={<HomePage />} />
            <Route path="/products" element={<ProductsPage />} />
            <Route path="/about" element={<AboutUs />} />
            {/* Truyền setRole để LoginPage báo đã đăng nhập customer */}
            <Route path="/login" element={<LoginPage setRole={setRole} />} />
            <Route path="/register" element={<RegisterPage />} />
            <Route path="*" element={<Navigate to="/" replace />} />
          </Routes>
        </main>

        <Footer />
      </div>
    </Router>
  );
}

export default App;
