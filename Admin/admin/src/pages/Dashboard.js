import React from 'react';
import '../styles/page.css';

export default function Dashboard(){
  return (
    <div className="page-wrapper">
      <h2 className="page-title">Dashboard</h2>
      <div className="dashboard-grid">
        <div className="widget">Welcome widget</div>
        <div className="widget">Stats widget</div>
        <div className="widget">Tasks widget</div>
        <div className="widget">Quick links</div>
      </div>
    </div>
  );
}
