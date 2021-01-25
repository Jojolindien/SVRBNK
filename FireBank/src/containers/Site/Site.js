import React from "react";
import { render } from "react-dom";
import Navbar from "../../components/UI/Navbar/Navbar";
import {Switch, Route} from "react-router-dom";
import Accueil from "./Accueil";
import Error from "../../components/Error/Error";
import Footer from "../../components/UI/Footers/footer";
import Clients from './Clients/clients';
import Connexion from "./Connexion/Connexion";


class Site extends React.Component {
    render(){
        return (
           <>
                <div className="site">
                    <Navbar/>
                    <Switch>
                        <Route path="/clients" exact render={()=><Clients/>}/>
                        <Route path="/connexion" exact render={()=><Connexion/>}/>
                        <Route path="/" exact render={()=><Accueil/>}/>
                        <Route render={()=><Error typeError="404">La page n'existe pas</Error>}/>
                    </Switch>
                    <div className="minSite"></div>
                </div>
                <Footer/>
           </> 
        );
    }
}

export default Site;