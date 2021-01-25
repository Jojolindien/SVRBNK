import React from "react";
import logo from "../../../assets/images/logo.png"
import {NavLink} from "react-router-dom";

const navbar = (props) => {
return (
    <>
        <nav className="navbar navbar-expand-lg navbar-dark bg-primary">
            <div className="container-fluid">
                <a className="navbar-brand" href="http://localhost:3000/">
                    <img src={logo} alt='logo bankcomment' width='50px' className="mx-3"/>
                </a>
                <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul className="navbar-nav me-auto mb-2 mb-lg-0">
                        <li className="nav-item">
                            <NavLink to="/" exact className="nav-link">Accueil</NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink to="/clients" exact className="nav-link">Clients</NavLink>
                        </li>
                        <li className="nav-item">
                            <NavLink to="/connexion" exact className="nav-link">Connexion</NavLink>
                        </li>
                    </ul> 
                </div>
            </div>
        </nav>
    </>
);
}

export default navbar;