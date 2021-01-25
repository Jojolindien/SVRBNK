import React from "react";
import { render } from "react-dom";
import axios from "axios";

class Connexion extends React.Component {

    state = {
        username: '',
        password: '',
        redirectToReferrer: false
        };

    handleConnexion= () => {
        // this.setState({loading:true});
        const connexion = {
            login: this.state.login,
            password: this.state.password
        }
        axios.post("hhttp://localhost/SERVEURBANK/back/login.json",connexion)
            .then(reponse => {
                console.log(reponse)
                // this.setState({loading:false});
                this.handleReinitialisationConnexion();
            })
            .catch(error => {
                console.log(error)
                this.setState({loading:false});
                this.handleReinitialisationConnexion();
            })
        
    }

    handleReinitialisationConnexion= () => {
        this.setState({
            username : "",
            password : ""
        })
    }

     PostData = (type, userData) => {
        let BaseURL = 'https://api.thewallscript.com/restful/';
        //let BaseURL = 'http://localhost/PHP-Slim-Restful/api/';
        return new Promise((resolve, reject) =>{
        fetch(BaseURL+type, {
       method: 'POST',
       body: JSON.stringify(userData)
       })
       .then((response) => response.json())
       .then((res) => {
        resolve(res);
       })
       .catch((error) => {
        reject(error);
       });
       });
       }

    
    onChange(e){
        this.setState({[e.target.name]:e.target.value});    
        console.log(this.state)  
    }
    

    render(){
        return (
            <>
                {/* <form method="POST" action="<?= URL ?>back/connexion" className="container mt-5" > */}
                    <div className="mb-3">
                        <label>Username</label>
                        <input type="text" name="username" onChange={e=>this.onChange(e)}/>
                    </div>
                    <div className="mb-3">
                        <label>Password</label>
                        <input type="password" name="password" onChange={e=>this.onChange(e)}/>
                        {/* <input type="password" name="password" onChange={event=>this.setState({password:event.target.value})}/> */}
                        
                    </div>
                    <input type="submit" value="Login" onClick={this.login}/>
                 
                    <a href="http://localhost/SERVEURBANK/back/connexion" className="btn btn-success">Signup</a>
                {/* </form> */}
            </>
        );
    }
}

export default Connexion;