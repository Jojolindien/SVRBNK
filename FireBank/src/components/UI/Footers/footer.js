import React from "react";
import facebook from "../../../assets/images/footer/fb.png"
import twitter from "../../../assets/images/footer/twitter.png"
import youtube from "../../../assets/images/footer/youtube.png"
import {NavLink} from "react-router-dom";
import classes from "../Footers/Footer.module.css"

const footer = (props) => {
return (
    <footer className="bg-primary">
        <div className="text-right pt-5 px-4">BankComment - Tous droits réservés ©</div>
        <div className="row no-gutters align-items-center text-center pt-2">
                <div className="col-3">
                    <a href="www.facebook.com" className="d-block" target="_blank">
                        <img src={facebook} alt='facebook' className="imgFB"/>
                    </a>
                </div>
                <div className="col-3">
                    <a href="www.twitter.com" className="d-block" target="_blank">
                        <img src={twitter} alt='twitter' className="imgTwitter"/>
                    </a>
                </div>
                <div className="col-3">
                    <a href="www.youtube.com" className="d-block" target="_blank">
                        <img src={youtube} alt='youtube' className="imgYoutube"/>
                    </a>
                </div>
                <div className="col-3">
                   <NavLink to="/mentionLegales" className={["nav-link", "p-0", "m-0", classes.p_footerLink].join(" ")}>mentions légales</NavLink>
                    <a href="mailto:contact@bankcommnent.com" className={["nav-link", "p-0", "m-0", classes.p_footerLink].join(" ")}>contact@bankcomment.com</a>
                </div>
            </div>
    </footer>
);
}

export default footer;