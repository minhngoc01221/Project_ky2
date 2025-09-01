import logo from './logo.svg';
import './App.css';
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import 'bootstrap/dist/css/bootstrap.min.css';
import Footer from './components/Footer';
import Header from './components/Header';
import Home from './pages/Home';
import Scrolltotop from './components/Scrolltotop';
import CartPage from './pages/CartPage';
import ReviewSectionPage from './pages/ReviewSectionPage';
import ProductPage from './pages/ProductPage';
function App() {
  return (
    <div>
      <Router>
        <Scrolltotop />
        <Header />
      </Router>
    </div>
  );
}

export default App;
